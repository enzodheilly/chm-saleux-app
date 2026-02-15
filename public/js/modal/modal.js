// ============================================================
//  MODAL REGISTER — VERSION OPTIMISÉE COMPLÈTE (refactor propre)
//  ✅ 1 seul contrôleur modal + 1 seul showStep()
//  ✅ click outside pour fermer + ESC + focus trap
//  ✅ tes fetch/turnstile conservés + transitions step améliorées
// ============================================================

(() => {
  // ---------------------------
  // Helpers
  // ---------------------------
  const $ = (sel, root = document) => root.querySelector(sel);
  const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));

  const lockScroll = () => (document.documentElement.style.overflow = "hidden");
  const unlockScroll = () => (document.documentElement.style.overflow = "");

  // ---------------------------
  // REGISTER MODAL
  // ---------------------------
  const modal = document.getElementById("registerModal");
  if (!modal) return;

  const card = $(".modal-card", modal);
  const closeBtn = document.getElementById("closeRegisterModal");
  const openBtns = $$(".js-open-register-modal");

  const stepIds = [
    "modal-step-social",
    "modal-step-email",
    "modal-step-verify",
    "modal-step-login",
    "modal-step-reset-email",
    "modal-step-reset-new",
  ];

  const getStep = (id) => document.getElementById(id);

  const showStep = (id) => {
    stepIds.forEach((sid) => {
      const el = getStep(sid);
      if (!el) return;

      const active = sid === id;

      // ✅ Si tu as modifié ton HTML en <div class="modal-step" hidden>, ça marche direct
      // ✅ Sinon, ça marche aussi car on force display via hidden
      el.hidden = !active;
      el.setAttribute("aria-hidden", String(!active));

      // fallback si tu n'as pas encore mis "hidden" dans le HTML
      el.style.display = active ? "block" : "none";
    });
  };

  let lastFocus = null;

  const openModal = (e) => {
    if (e) e.preventDefault();
    lastFocus = document.activeElement;

    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
    lockScroll();

    // si aucune step visible, on met social
    const anyVisible = stepIds.some((id) => {
      const el = getStep(id);
      if (!el) return false;
      const isHidden = el.hidden || el.style.display === "none";
      return !isHidden;
    });
    if (!anyVisible) showStep("modal-step-social");

    closeBtn?.focus();
  };

  const closeModal = () => {
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    unlockScroll();
    lastFocus?.focus?.();
  };

  // expose global (pratique pour tes callbacks fetch)
  window.__authModal = { openModal, closeModal, showStep };

  // open buttons
  openBtns.forEach((b) => b.addEventListener("click", openModal));

  // close button
  closeBtn?.addEventListener("click", closeModal);

  // click outside closes (UX ++)
  modal.addEventListener("click", (e) => {
    if (!card) return;
    if (!card.contains(e.target)) closeModal();
  });

  // ESC closes
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && modal.classList.contains("is-open")) {
      e.preventDefault();
      closeModal();
    }
  });

  // Focus trap (Tab reste dans la modale)
  document.addEventListener("keydown", (e) => {
    if (e.key !== "Tab") return;
    if (!modal.classList.contains("is-open")) return;
    if (!card) return;

    const focusables = card.querySelectorAll(
      'a[href], button:not([disabled]), input:not([disabled]), textarea:not([disabled]), select:not([disabled]), [tabindex]:not([tabindex="-1"])'
    );
    if (!focusables.length) return;

    const first = focusables[0];
    const last = focusables[focusables.length - 1];

    if (e.shiftKey && document.activeElement === first) {
      e.preventDefault();
      last.focus();
    } else if (!e.shiftKey && document.activeElement === last) {
      e.preventDefault();
      first.focus();
    }
  });

  // ---------------------------
  // Navigation steps (IDs existants)
  // ---------------------------
  document.addEventListener("DOMContentLoaded", () => {
    const onClick = (id, fn) => document.getElementById(id)?.addEventListener("click", fn);

    onClick("js-switch-to-email", (e) => {
      e.preventDefault();
      showStep("modal-step-email");
      sessionStorage.removeItem("registerStep");
    });

    onClick("js-back-to-social", (e) => {
      e.preventDefault();
      showStep("modal-step-social");
      sessionStorage.removeItem("registerStep");
    });

    onClick("js-back-to-email", (e) => {
      e.preventDefault();
      showStep("modal-step-email");
      sessionStorage.removeItem("registerStep");
    });

    // passage vers login
    $$(".js-open-login-modal").forEach((l) =>
      l.addEventListener("click", (e) => {
        e.preventDefault();
        showStep("modal-step-login");
      })
    );

    onClick("js-back-to-social-login", (e) => {
      e.preventDefault();
      showStep("modal-step-social");
    });

    // forgot password
    onClick("js-forgot-password", (e) => {
      e.preventDefault();
      showStep("modal-step-reset-email");
      openModal(); // au cas où (si click depuis ailleurs)
    });

    onClick("js-back-to-login", (e) => {
      e.preventDefault();
      showStep("modal-step-login");
    });

    onClick("js-back-to-login-from-reset", (e) => {
      e.preventDefault();
      showStep("modal-step-login");
    });

    // restauration auto étape "verify"
    if (sessionStorage.getItem("registerStep") === "verify") {
      openModal();
      showStep("modal-step-verify");
    }
  });

  // ============================================================
  //  FORMULAIRE D’INSCRIPTION — VALIDATIONS + AJAX + TURNSTILE
  // ============================================================
  document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("emailRegisterForm");
    if (!form) return;

    const errorBox = document.getElementById("form-error-message");
    const submitButton = form.querySelector(".btn-register");
    const btnText = submitButton?.querySelector(".btn-text");
    const btnSpinner = submitButton?.querySelector(".btn-spinner");

    const showFormError = (msg) => {
      if (!errorBox) return;
      errorBox.innerHTML = msg;
      errorBox.style.display = "block";
      errorBox.classList.add("shake");
      setTimeout(() => errorBox.classList.remove("shake"), 600);
    };

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      const terms = form.querySelector('input[name="registration_form[acceptedTerms]"]');
      if (!terms?.checked) {
        showFormError("⚠️ Vous devez accepter les conditions générales.");
        terms.focus();
        return;
      }

      // ✅ mieux : chercher le turnstile dans le form (s'il existe)
      const captcha =
        form.querySelector('input[name="cf-turnstile-response"]')?.value ||
        document.querySelector('input[name="cf-turnstile-response"]')?.value;

      if (!captcha) {
        showFormError("⚠️ Veuillez passer la vérification anti-robot.");
        if (typeof turnstile !== "undefined") turnstile.reset();
        return;
      }

      // UI loading
      if (submitButton) submitButton.disabled = true;
      if (btnText) btnText.style.display = "none";
      if (btnSpinner) btnSpinner.style.display = "inline-flex";

      const formData = new FormData(form);

      try {
        const res = await fetch(form.action, { method: "POST", body: formData });
        const json = await res.json();

        if (json.success) {
          // move to verification step
          showStep("modal-step-verify");
          sessionStorage.setItem("registerStep", "verify");

          if (typeof turnstile !== "undefined") turnstile.reset();
        } else {
          const errors = json.errors || [json.message || "Erreur inconnue"];
          showFormError("<ul>" + errors.map((m) => `<li>${m}</li>`).join("") + "</ul>");
          if (typeof turnstile !== "undefined") turnstile.reset();
        }
      } catch {
        showFormError("⚠️ Erreur serveur. Réessayez plus tard.");
      }

      // reset button
      if (submitButton) submitButton.disabled = false;
      if (btnText) btnText.style.display = "inline";
      if (btnSpinner) btnSpinner.style.display = "none";
    });
  });

  // ============================================================
  //  SYSTÈME DE VÉRIFICATION DU CODE À 6 CHIFFRES
  // ============================================================
  document.addEventListener("DOMContentLoaded", () => {
    const formVerify = document.getElementById("verify-form");
    if (!formVerify) return;

    const submitBtn = document.getElementById("verifyButton");
    const btnText = submitBtn?.querySelector(".btn-text");
    const btnSpinner = submitBtn?.querySelector(".btn-spinner");
    const messageBox = document.getElementById("verifyMessage");

    const codeInputs = $$(".code-input");
    const hiddenInput = document.getElementById("verify-full-code");

    if (!codeInputs.length || !hiddenInput) return;

    const updateHidden = () => {
      hiddenInput.value = codeInputs.map((i) => i.value).join("");
    };

    codeInputs.forEach((input, index) => {
      input.addEventListener("input", (e) => {
        e.target.value = e.target.value.replace(/\D/g, "");
        if (e.target.value.length === 1 && index < 5) codeInputs[index + 1].focus();
        updateHidden();
      });

      input.addEventListener("keydown", (e) => {
        if (e.key === "Backspace" && !e.target.value && index > 0) codeInputs[index - 1].focus();
      });

      input.addEventListener("paste", (e) => {
        e.preventDefault();
        const code = (e.clipboardData.getData("text") || "").replace(/\D/g, "");
        if (code.length === 6) {
          codeInputs.forEach((el, i) => (el.value = code[i] || ""));
          updateHidden();
          codeInputs[5].focus();
        }
      });
    });

    const showVerifyMsg = (msg, type = "") => {
      if (!messageBox) return;
      if (!msg) {
        messageBox.style.display = "none";
        return;
      }
      messageBox.textContent = msg;
      messageBox.className = "verify-message " + type;
      messageBox.style.display = "block";
    };

    formVerify.addEventListener("submit", async (e) => {
      e.preventDefault();

      const code = hiddenInput.value.trim();
      if (code.length !== 6) {
        showVerifyMsg("Veuillez entrer un code à 6 chiffres.", "error");
        return;
      }

      if (btnText) btnText.style.display = "none";
      if (btnSpinner) btnSpinner.style.display = "inline-flex";
      if (submitBtn) submitBtn.disabled = true;

      const formData = new FormData(formVerify);

      try {
        const res = await fetch(formVerify.action, {
          method: "POST",
          body: formData,
          headers: { Accept: "application/json" },
        });
        const data = await res.json();

        if (data.success) {
          showVerifyMsg("", "");
          sessionStorage.removeItem("registerStep");

          // étape verify -> login (simple + stable)
          showStep("modal-step-login");

          if (btnText) btnText.style.display = "inline";
          if (btnSpinner) btnSpinner.style.display = "none";
          if (submitBtn) submitBtn.disabled = false;
        } else {
          showVerifyMsg(data.message || "Code invalide.", "error");
          if (btnText) btnText.style.display = "inline";
          if (btnSpinner) btnSpinner.style.display = "none";
          if (submitBtn) submitBtn.disabled = false;
        }
      } catch {
        showVerifyMsg("⚠️ Erreur serveur. Réessayez plus tard.", "error");
        if (btnText) btnText.style.display = "inline";
        if (btnSpinner) btnSpinner.style.display = "none";
        if (submitBtn) submitBtn.disabled = false;
      }
    });
  });

  // ============================================================
  //  FORMULAIRE LOGIN (avec CAPTCHA TURNSTILE)
  // ============================================================
  document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("login-form");
    const btn = document.getElementById("loginButton");
    const errorBox = document.getElementById("loginError");
    if (!form || !btn) return;

    const btnText = btn.querySelector(".btn-text");
    const btnSpinner = btn.querySelector(".btn-spinner");

    const showError = (msg) => {
      if (!errorBox) return;
      errorBox.textContent = msg || "";
      errorBox.style.display = msg ? "block" : "none";
      if (msg) {
        errorBox.classList.add("shake");
        setTimeout(() => errorBox.classList.remove("shake"), 600);
      }
    };

    const resetBtn = () => {
      if (btnText) btnText.style.display = "inline";
      if (btnSpinner) btnSpinner.style.display = "none";
      btn.disabled = false;
    };

    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      showError("");

      if (btnText) btnText.style.display = "none";
      if (btnSpinner) btnSpinner.style.display = "inline-flex";
      btn.disabled = true;

      const captcha =
        form.querySelector('input[name="cf-turnstile-response"]')?.value ||
        document.querySelector('input[name="cf-turnstile-response"]')?.value;

      if (!captcha) {
        showError("⚠️ Veuillez valider le CAPTCHA.");
        resetBtn();
        return;
      }

      try {
        const res = await fetch(form.action, {
          method: "POST",
          body: new FormData(form),
          headers: { Accept: "application/json" },
        });
        const data = await res.json();

        if (data.success) {
          window.location.replace(data.redirect || "/");
          return;
        }

        showError(data.message || "Identifiants incorrects.");
        resetBtn();
      } catch {
        showError("⚠️ Erreur serveur.");
        resetBtn();
      }
    });
  });

  // ============================================================
  //  MOT DE PASSE OUBLIÉ — Étape 1 : demande d'email
  //  ✅ changement : on n'efface plus le HTML du step (plus propre)
  // ============================================================
  document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("resetRequestForm");
    if (!form) return;

    const btn = document.getElementById("resetRequestBtn");
    const errorBox = document.getElementById("resetError");
    const resetEmailInput = document.getElementById("resetEmail");

    const btnText = btn?.querySelector(".btn-text");
    const spinner = btn?.querySelector(".btn-spinner");

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      if (btnText) btnText.style.display = "none";
      if (spinner) spinner.style.display = "inline-flex";
      if (btn) btn.disabled = true;

      if (errorBox) {
        errorBox.style.display = "none";
        errorBox.classList.remove("success", "error");
      }

      try {
        const email = resetEmailInput?.value?.trim() || "";
        const res = await fetch(form.action, {
          method: "POST",
          headers: { "Content-Type": "application/json", Accept: "application/json" },
          body: JSON.stringify({ email }),
        });
        const data = await res.json();

        if (data.success) {
          if (errorBox) {
            errorBox.textContent = data.message || "✅ Email envoyé.";
            errorBox.className = "verify-message success";
            errorBox.style.display = "block";
          }
        } else {
          if (errorBox) {
            errorBox.textContent = data.message || "⚠️ Erreur serveur.";
            errorBox.className = "verify-message error";
            errorBox.style.display = "block";
          }
        }
      } catch {
        if (errorBox) {
          errorBox.textContent = "⚠️ Erreur serveur.";
          errorBox.className = "verify-message error";
          errorBox.style.display = "block";
        }
      }

      if (btnText) btnText.style.display = "inline";
      if (spinner) spinner.style.display = "none";
      if (btn) btn.disabled = false;
    });
  });

  // ============================================================
  //  RESET PASSWORD — Étape 2 : nouveau mot de passe
  // ============================================================
  document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("resetNewForm");
    if (!form) return;

    const btn = document.getElementById("resetNewBtn");
    const errorBox = document.getElementById("resetNewError");

    const btnText = btn?.querySelector(".btn-text");
    const spinner = btn?.querySelector(".btn-spinner");

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      const pass1 = document.getElementById("newPassword")?.value || "";
      const pass2 = document.getElementById("confirmPassword")?.value || "";
      const token = document.getElementById("resetToken")?.value || "";

      const showResetError = (msg) => {
        if (!errorBox) return;
        errorBox.textContent = msg;
        errorBox.className = "verify-message error";
        errorBox.style.display = "block";
      };

      if (pass1 !== pass2) return showResetError("Les mots de passe ne correspondent pas.");
      if (pass1.length < 12) return showResetError("Minimum 12 caractères.");

      if (btnText) btnText.style.display = "none";
      if (spinner) spinner.style.display = "inline-flex";
      if (btn) btn.disabled = true;
      if (errorBox) errorBox.style.display = "none";

      try {
        const res = await fetch(form.action, {
          method: "POST",
          headers: { "Content-Type": "application/json", Accept: "application/json" },
          body: JSON.stringify({ token, password: pass1 }),
        });
        const data = await res.json();

        if (data.success) {
          showStep("modal-step-login");
        } else {
          showResetError(data.message || "Erreur.");
        }
      } catch {
        showResetError("⚠️ Erreur serveur.");
      }

      if (btnText) btnText.style.display = "inline";
      if (spinner) spinner.style.display = "none";
      if (btn) btn.disabled = false;
    });
  });

  // ============================================================
  //  AUTO-OUVERTURE DU MODAL SI resetToken PRÉSENT DANS L’URL
  // ============================================================
  document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const token = urlParams.get("resetToken");
    if (!token) return;

    const tokenInput = document.getElementById("resetToken");
    if (tokenInput) tokenInput.value = token;

    openModal();
    showStep("modal-step-reset-new");
  });

  // ============================================================
  //  PANNEAU RÈGLES MOT DE PASSE + VALIDATION TEMPS RÉEL
  // ============================================================
  document.addEventListener("DOMContentLoaded", () => {
    const openBtn = document.getElementById("openPasswordRules");
    const closeBtn = document.getElementById("closePasswordRules");
    const rulesModal = document.getElementById("passwordRulesModal");
    const passwordInput = document.getElementById("register-password");

    if (!openBtn || !closeBtn || !rulesModal || !passwordInput) return;

    openBtn.addEventListener("click", (e) => {
      e.preventDefault();
      rulesModal.classList.add("is-visible");
    });

    closeBtn.addEventListener("click", (e) => {
      e.preventDefault();
      rulesModal.classList.remove("is-visible");
    });

    const rules = {
      length: document.getElementById("rule-length"),
      uppercase: document.getElementById("rule-uppercase"),
      lowercase: document.getElementById("rule-lowercase"),
      number: document.getElementById("rule-number"),
      special: document.getElementById("rule-special"),
    };

    passwordInput.addEventListener("input", (e) => {
      const v = e.target.value || "";
      rules.length?.classList.toggle("valid", v.length >= 12);
      rules.uppercase?.classList.toggle("valid", /[A-Z]/.test(v));
      rules.lowercase?.classList.toggle("valid", /[a-z]/.test(v));
      rules.number?.classList.toggle("valid", /[0-9]/.test(v));
      rules.special?.classList.toggle("valid", /[^A-Za-z0-9]/.test(v));
    });
  });

  // ============================================================
  //  TOGGLE PASSWORD (tous les champs)
  // ============================================================
  document.addEventListener("DOMContentLoaded", () => {
    const toggles = $$(".toggle-password");

    toggles.forEach((toggle) => {
      toggle.addEventListener("click", () => {
        const targetId = toggle.getAttribute("data-target");
        const input = document.getElementById(targetId);
        if (!input) return;

        const eyeOpen = $(".eye-open", toggle);
        const eyeClosed = $(".eye-closed", toggle);

        const isPassword = input.type === "password";
        input.type = isPassword ? "text" : "password";

        // icônes
        eyeOpen?.classList.toggle("hide", isPassword);
        eyeClosed?.classList.toggle("hide", !isPassword);
      });
    });
  });

  // ============================================================
  //  SET PASSWORD MODAL (si présent)
  // ============================================================
  document.addEventListener("DOMContentLoaded", () => {
    const spModal = document.getElementById("setPasswordModal");
    if (!spModal) return;

    spModal.classList.add("is-open");
    lockScroll();

    const closeBtn = spModal.querySelector(".js-close-set-password");
    if (closeBtn) {
      closeBtn.addEventListener("click", () => {
        spModal.classList.remove("is-open");
        unlockScroll();
      });
    }

    // Afficher les messages flash si besoin
    spModal.querySelectorAll(".form-error-message").forEach((msg) => (msg.style.display = "block"));
    spModal.querySelectorAll(".form-success-message").forEach((msg) => (msg.style.display = "block"));
  });
})();
