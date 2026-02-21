// ============================================================
//  MODAL AUTH — VERSION COMPLETE (REGISTER/LOGIN/VERIFY/RESET)
//  ✅ 1 seul contrôleur modal + 1 seul showStep()
//  ✅ click outside + ESC + focus trap
//  ✅ Turnstile multi-widgets (render explicit + reset ciblé) — sans doublons
//  ✅ Login NOT_VERIFIED -> ouvre étape verify
//  ✅ Resend code en AJAX (plus de page noire) + cooldown anti-spam
//  ✅ VERIFY success -> AUTO redirect (home) (si backend renvoie redirect)
//  ✅ fetch() garde la session (credentials)
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
  // TURNSTILE (EXPLICIT MODE)
  // ---------------------------
  const TURNSTILE_SELECTOR = ".cf-turnstile";
  const turnstileWidgets = new WeakMap();

  const isTurnstileReady = () =>
    typeof window.turnstile !== "undefined" && typeof window.turnstile.render === "function";

  const getTurnstileSiteKey = (el) => el?.getAttribute("data-sitekey") || "";

  const hasAnyTurnstileMarkup = (container) => {
    return !!container.querySelector("iframe, input[name='cf-turnstile-response'], .cf-turnstile");
  };

  const isVisible = (el) => {
    if (!el) return false;
    const style = window.getComputedStyle(el);
    return style.display !== "none" && style.visibility !== "hidden";
  };

  const renderTurnstileFor = (container) => {
    if (!container) return;
    if (!isTurnstileReady()) return;
    if (turnstileWidgets.has(container)) return;

    if (hasAnyTurnstileMarkup(container)) {
      container.dataset.turnstileRendered = "1";
      return;
    }

    const sitekey = getTurnstileSiteKey(container);
    if (!sitekey) return;
    if (!isVisible(container)) return;

    try {
      const widgetId = window.turnstile.render(container, {
        sitekey,
        theme: container.getAttribute("data-theme") || "light",
        size: container.getAttribute("data-size") || "normal",
      });

      turnstileWidgets.set(container, widgetId);
      container.dataset.turnstileRendered = "1";
    } catch (_) {}
  };

  const renderTurnstileIn = (rootEl) => {
    if (!rootEl) return;
    $$(TURNSTILE_SELECTOR, rootEl).forEach((el) => renderTurnstileFor(el));
  };

  const resetTurnstileInForm = (form) => {
    if (!form || !isTurnstileReady()) return;
    const container = $(TURNSTILE_SELECTOR, form);
    if (!container) return;

    const widgetId = turnstileWidgets.get(container);

    try {
      if (typeof widgetId !== "undefined") window.turnstile.reset(widgetId);
      else window.turnstile.reset(container);
    } catch (_) {
      try {
        window.turnstile.reset();
      } catch (_) {}
    }
  };

  const getTurnstileTokenFromForm = (form) => {
    return form?.querySelector('input[name="cf-turnstile-response"]')?.value?.trim() || "";
  };

  document.addEventListener("turnstile:ready", () => {
    renderTurnstileIn(document);
  });

  // ---------------------------
  // MODAL
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
      el.hidden = !active;
      el.setAttribute("aria-hidden", String(!active));
      el.style.display = active ? "block" : "none";
    });

    const activeEl = getStep(id);
    if (activeEl) requestAnimationFrame(() => renderTurnstileIn(activeEl));
  };

  let lastFocus = null;

  const openModal = (e) => {
    if (e) e.preventDefault();
    lastFocus = document.activeElement;

    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
    lockScroll();

    const anyVisible = stepIds.some((id) => {
      const el = getStep(id);
      if (!el) return false;
      const isHidden = el.hidden || el.style.display === "none";
      return !isHidden;
    });
    if (!anyVisible) showStep("modal-step-social");

    requestAnimationFrame(() => renderTurnstileIn(modal));
    closeBtn?.focus();
  };

  const closeModal = () => {
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    unlockScroll();
    lastFocus?.focus?.();
  };

  window.__authModal = { openModal, closeModal, showStep };

  openBtns.forEach((b) => b.addEventListener("click", openModal));
  closeBtn?.addEventListener("click", closeModal);

  modal.addEventListener("click", (e) => {
    if (!card) return;
    if (!card.contains(e.target)) closeModal();
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && modal.classList.contains("is-open")) {
      e.preventDefault();
      closeModal();
    }
  });

  // Focus trap
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
  // NAVIGATION STEPS
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

    $$(".js-open-login-modal").forEach((l) =>
      l.addEventListener("click", (e) => {
        e.preventDefault();
        showStep("modal-step-login");
        requestAnimationFrame(() => renderTurnstileIn(getStep("modal-step-login")));
      })
    );

    onClick("js-back-to-social-login", (e) => {
      e.preventDefault();
      showStep("modal-step-social");
    });

    onClick("js-forgot-password", (e) => {
      e.preventDefault();
      showStep("modal-step-reset-email");
      openModal();
    });

    onClick("js-back-to-login", (e) => {
      e.preventDefault();
      showStep("modal-step-login");
    });

    onClick("js-back-to-login-from-reset", (e) => {
      e.preventDefault();
      showStep("modal-step-login");
    });

    if (sessionStorage.getItem("registerStep") === "verify") {
      openModal();
      showStep("modal-step-verify");
    }

    if (isTurnstileReady()) renderTurnstileIn(document);
  });

  // ============================================================
  // REGISTER — AJAX + TURNSTILE
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

      const captcha = getTurnstileTokenFromForm(form);
      if (!captcha) {
        showFormError("⚠️ Veuillez passer la vérification anti-robot.");
        resetTurnstileInForm(form);
        return;
      }

      if (submitButton) submitButton.disabled = true;
      if (btnText) btnText.style.display = "none";
      if (btnSpinner) btnSpinner.style.display = "inline-flex";

      try {
        const res = await fetch(form.action, {
          method: "POST",
          body: new FormData(form),
          credentials: "same-origin", // ✅ IMPORTANT (session)
        });
        const json = await res.json();

        if (json.success) {
          showStep("modal-step-verify");
          sessionStorage.setItem("registerStep", "verify");
        } else {
          const errors = json.errors || [json.message || "Erreur inconnue"];
          showFormError("<ul>" + errors.map((m) => `<li>${m}</li>`).join("") + "</ul>");
        }
      } catch {
        showFormError("⚠️ Erreur serveur. Réessayez plus tard.");
      } finally {
        resetTurnstileInForm(form);
        if (submitButton) submitButton.disabled = false;
        if (btnText) btnText.style.display = "inline";
        if (btnSpinner) btnSpinner.style.display = "none";
      }
    });
  });

  // ============================================================
  // VERIFY CODE — AJAX
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

      try {
        const res = await fetch(formVerify.action, {
          method: "POST",
          body: new FormData(formVerify),
          headers: { Accept: "application/json" },
          credentials: "same-origin", // ✅ IMPORTANT (session)
        });

        const data = await res.json();

        if (data.success) {
          showVerifyMsg("", "");
          sessionStorage.removeItem("registerStep");

          // ✅ Redirection directe (HOME) si backend renvoie redirect
          window.location.replace(data.redirect || "/");
          return;
        } else {
          showVerifyMsg(data.message || "Code invalide.", "error");
        }
      } catch {
        showVerifyMsg("⚠️ Erreur serveur. Réessayez plus tard.", "error");
      } finally {
        if (btnText) btnText.style.display = "inline";
        if (btnSpinner) btnSpinner.style.display = "none";
        if (submitBtn) submitBtn.disabled = false;
      }
    });
  });

  // ============================================================
  // RESEND CODE — interception globale (évite la page noire JSON)
  // ============================================================
  document.addEventListener(
    "submit",
    async (e) => {
      const form = e.target;
      if (!(form instanceof HTMLFormElement)) return;
      if (form.id !== "resendCodeForm") return;

      e.preventDefault();

      const btn = document.getElementById("resendCodeBtn") || form.querySelector("button[type='submit']");
      const messageBox = document.getElementById("verifyMessage");

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

      const COOLDOWN_MS = 15000;
      const KEY = "resendCodeCooldownUntil";
      const now = Date.now();
      const until = parseInt(sessionStorage.getItem(KEY) || "0", 10);
      if (until > now) {
        const left = Math.ceil((until - now) / 1000);
        showVerifyMsg(`Patiente ${left}s avant de renvoyer.`, "error");
        return;
      }

      if (btn) btn.disabled = true;
      showVerifyMsg("", "");

      try {
        const res = await fetch(form.action, {
          method: "POST",
          body: new FormData(form),
          headers: { Accept: "application/json" },
          credentials: "same-origin", // ✅ IMPORTANT (session)
        });

        const data = await res.json();

        if (data.success) {
          showVerifyMsg(data.message || "✅ Nouveau code envoyé.", "success");
        } else {
          showVerifyMsg(data.message || "❌ Impossible de renvoyer le code.", "error");
        }
      } catch {
        showVerifyMsg("⚠️ Erreur serveur. Réessayez plus tard.", "error");
      } finally {
        sessionStorage.setItem(KEY, String(Date.now() + COOLDOWN_MS));
        if (btn) btn.disabled = false;
      }
    },
    true
  );

  // ============================================================
  // LOGIN — AJAX + TURNSTILE + NOT_VERIFIED -> step verify
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

      const captcha = getTurnstileTokenFromForm(form);
      if (!captcha) {
        showError("⚠️ Veuillez valider le CAPTCHA.");
        resetBtn();
        resetTurnstileInForm(form);
        return;
      }

      try {
        const res = await fetch(form.action, {
          method: "POST",
          body: new FormData(form),
          headers: { Accept: "application/json" },
          credentials: "same-origin", // ✅ IMPORTANT (session)
        });

        const data = await res.json();

        if (data.success) {
          window.location.replace(data.redirect || "/");
          return;
        }

        if (data.code === "NOT_VERIFIED") {
          openModal();
          showStep("modal-step-verify");
          sessionStorage.setItem("registerStep", "verify");
          showError("");
          return;
        }

        showError(data.message || "Identifiants incorrects.");
      } catch {
        showError("⚠️ Erreur serveur.");
      } finally {
        resetBtn();
        resetTurnstileInForm(form);
      }
    });
  });

  // ============================================================
  // RESET REQUEST — demande email (avec Turnstile)
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

      const captcha = getTurnstileTokenFromForm(form);
      if (!captcha) {
        if (errorBox) {
          errorBox.textContent = "⚠️ Veuillez valider le CAPTCHA.";
          errorBox.className = "verify-message error";
          errorBox.style.display = "block";
        }
        if (btnText) btnText.style.display = "inline";
        if (spinner) spinner.style.display = "none";
        if (btn) btn.disabled = false;
        resetTurnstileInForm(form);
        return;
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
      } finally {
        resetTurnstileInForm(form);
        if (btnText) btnText.style.display = "inline";
        if (spinner) spinner.style.display = "none";
        if (btn) btn.disabled = false;
      }
    });
  });

  // ============================================================
  // RESET FINAL — nouveau mot de passe
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
      } finally {
        if (btnText) btnText.style.display = "inline";
        if (spinner) spinner.style.display = "none";
        if (btn) btn.disabled = false;
      }
    });
  });

  // ============================================================
  // AUTO-OPEN RESET TOKEN
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
  // PASSWORD RULES PANEL + LIVE VALIDATION
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
  // TOGGLE PASSWORD
  // ============================================================
  document.addEventListener("DOMContentLoaded", () => {
    $$(".toggle-password").forEach((toggle) => {
      toggle.addEventListener("click", () => {
        const targetId = toggle.getAttribute("data-target");
        const input = document.getElementById(targetId);
        if (!input) return;

        const eyeOpen = $(".eye-open", toggle);
        const eyeClosed = $(".eye-closed", toggle);

        const isPassword = input.type === "password";
        input.type = isPassword ? "text" : "password";

        eyeOpen?.classList.toggle("hide", isPassword);
        eyeClosed?.classList.toggle("hide", !isPassword);
      });
    });
  });

  // ============================================================
  // SET PASSWORD MODAL (si présent)
  // ============================================================
  document.addEventListener("DOMContentLoaded", () => {
    const spModal = document.getElementById("setPasswordModal");
    if (!spModal) return;

    spModal.classList.add("is-open");
    lockScroll();

    const close = spModal.querySelector(".js-close-set-password");
    close?.addEventListener("click", () => {
      spModal.classList.remove("is-open");
      unlockScroll();
    });

    spModal.querySelectorAll(".form-error-message").forEach((msg) => (msg.style.display = "block"));
    spModal.querySelectorAll(".form-success-message").forEach((msg) => (msg.style.display = "block"));
  });
})();