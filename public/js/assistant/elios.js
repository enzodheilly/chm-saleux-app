class EliosWidget {
    constructor() {
        this.nodes = {
            navBtn: document.getElementById('assistantWidgetOpen'),
            closeBtn: document.getElementById('eliosCloseBtn'),
            panel: document.getElementById('eliosPanel'),
            body: document.getElementById('eliosChatBody'),
            input: document.getElementById('eliosInput'),
            sendBtn: document.getElementById('eliosSendBtn')
        };
        this.storageKey = 'elios_chat_history';
        this.isTypingText = false; 
        this.abortController = null; 
        this.licenseFlow = { active: false, step: null, data: { name: '', email: '', token: '' } };
        
        // Initialisation de la base de connaissances vide
        this.localKnowledge = {};
        
        if (this.nodes.navBtn) this.init();
    }

    async init() {
        // CHARGEMENT DU CERVEAU LOCAL (Fichier externe)
        try {
            const response = await fetch('/data/elios_base.json'); // Ajuste le chemin selon ton projet
            if (response.ok) {
                this.localKnowledge = await response.json();
            }
        } catch (e) {
            console.error("Erreur de chargement du dictionnaire local:", e);
        }

        this.nodes.navBtn.addEventListener('click', (e) => { e.preventDefault(); this.toggle(); });
        this.nodes.closeBtn.addEventListener('click', () => this.toggle(false));
        this.nodes.sendBtn.addEventListener('click', () => this.handleSend());
        this.nodes.input.addEventListener('keypress', (e) => { if (e.key === 'Enter') this.handleSend(); });
        
        this.loadHistory();
        this.addHistorySeparator();
        this.welcome();
    }

    // ... (Gardez les fonctions toggle, addHistorySeparator, loadHistory, typewrite, append, showTyping, hideTyping identiques) ...

    toggle(force = null) {
        const active = force !== null ? force : !this.nodes.panel.classList.contains('active');
        this.nodes.panel.classList.toggle('active', active);
        if (active) {
            this.scrollToBottom();
            setTimeout(() => this.nodes.input.focus(), 400);
        }
    }

    addHistorySeparator() {
        const history = JSON.parse(localStorage.getItem(this.storageKey)) || [];
        if (history.length > 0) {
            const sep = document.createElement('div');
            sep.style.cssText = "text-align:center; font-size:10px; color:#555; margin:25px 0; border-bottom:1px solid #333; line-height:0.1em; width:100%;";
            sep.innerHTML = `<span style='background:var(--elios-dark-bg); padding:0 15px;'>Précédemment</span>`;
            this.nodes.body.appendChild(sep);
        }
    }

    loadHistory() {
        this.nodes.body.innerHTML = "";
        const history = JSON.parse(localStorage.getItem(this.storageKey)) || [];
        history.forEach(msg => this.append(msg.text, msg.role, false, false));
    }

    async typewrite(html, role = 'bot', shouldSave = true) {
        this.isTypingText = true;
        const row = document.createElement('div');
        row.className = `chat-row ${role === 'bot' ? 'assistant-row' : 'user-row'}`;
        if (role === 'bot') {
            const img = document.createElement('img');
            img.src = "/images/ia.png";
            img.className = "elios-chat-avatar";
            row.appendChild(img);
        }
        const contentArea = document.createElement('div');
        contentArea.className = role === 'bot' ? 'bot-content-plain' : 'bubble';
        let dot = null;
        if (role === 'bot') {
            dot = document.createElement('span');
            dot.className = 'chat-dot';
            contentArea.appendChild(dot);
        }
        row.appendChild(contentArea);
        this.nodes.body.appendChild(row);
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;
        const nodes = Array.from(tempDiv.childNodes);
        const getDelay = (char) => {
            if (/[.!?]/.test(char)) return 120;
            if (/,/.test(char)) return 50;
            return 8;
        };
        return new Promise(async (resolve) => {
            for (let node of nodes) {
                if (!this.isTypingText) break;
                if (node.nodeType === Node.TEXT_NODE) {
                    const text = node.textContent;
                    for (let i = 0; i < text.length; i++) {
                        if (!this.isTypingText) break; 
                        const char = text.charAt(i);
                        if(role === 'bot' && dot) {
                            contentArea.insertBefore(document.createTextNode(char), dot);
                        } else {
                            contentArea.appendChild(document.createTextNode(char));
                        }
                        if (i % 5 === 0) this.scrollToBottom();
                        await new Promise(r => setTimeout(r, getDelay(char)));
                    }
                } else {
                    const clone = node.cloneNode(true);
                    if(role === 'bot' && dot) {
                        contentArea.insertBefore(clone, dot);
                    } else {
                        contentArea.appendChild(clone);
                    }
                    this.scrollToBottom();
                }
            }
            if(dot) dot.remove();
            this.isTypingText = false;
            if (shouldSave) this.saveMessage(html, role);
            this.scrollToBottom();
            resolve();
        });
    }

    append(text, role = 'bot', shouldSave = true, autoScroll = true) {
        const row = document.createElement('div');
        row.className = `chat-row ${role === 'bot' ? 'assistant-row' : 'user-row'}`;
        if (role === 'bot') {
            const img = document.createElement('img');
            img.src = "/images/ia.png";
            img.className = "elios-chat-avatar";
            row.appendChild(img);
        }
        const contentArea = document.createElement('div');
        contentArea.className = role === 'bot' ? 'bot-content-plain' : 'bubble';
        contentArea.innerHTML = text;
        row.appendChild(contentArea);
        this.nodes.body.appendChild(row);
        if (autoScroll) this.scrollToBottom();
        if (shouldSave) this.saveMessage(text, role);
    }

    showTyping() {
        if (document.getElementById('eliosTyping')) return;
        const loader = document.createElement('div');
        loader.id = 'eliosTyping';
        loader.className = 'chat-row assistant-row';
        loader.innerHTML = `<img src="/images/ia.png" class="elios-chat-avatar"><div class="typing-bubble"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div>`;
        this.nodes.body.appendChild(loader);
        this.scrollToBottom();
    }

    hideTyping() {
        const loader = document.getElementById('eliosTyping');
        if (loader) loader.remove();
    }

    async welcome() {
        this.showTyping();
        setTimeout(async () => {
            this.hideTyping();
            await this.typewrite("Bonjour, je suis Elios, votre assistant CHM. Comment puis-je vous aider ?", 'bot', false);
            this.renderCategories();
        }, 800);
    }

    renderCategories() {
        const categories = [
            { label: "Ma Licence", value: "FLOW_LICENSE" },
            { label: "Horaires", value: "Quels sont les horaires du club ?" },
            { label: "Tarifs", value: "Quels sont les tarifs du club ?" },
            { label: "Adresse", value: "Où se situe le club ?" },
            { label: "Contact", value: "Comment vous contacter ?" }
        ];
        const container = document.createElement('div');
        container.className = 'quick-replies-container';
        categories.forEach(cat => {
            const btn = document.createElement('button');
            btn.className = 'quick-btn';
            btn.textContent = cat.label;
            btn.onclick = () => { container.remove(); this.handleSend(cat.value); };
            container.appendChild(btn);
        });
        this.nodes.body.appendChild(container);
        this.scrollToBottom();
    }

    updateSendButton(status) {
        const btn = this.nodes.sendBtn;
        btn.innerHTML = status === 'loading' ? '<i class="fas fa-stop"></i>' : '<i class="fas fa-paper-plane"></i>';
    }

    async handleSend(overrideMsg = null) {
        if (this.abortController || this.isTypingText) {
            if (this.abortController) this.abortController.abort();
            this.isTypingText = false;
            this.hideTyping();
            this.updateSendButton('idle');
            return;
        }

        const msg = overrideMsg ? overrideMsg : this.nodes.input.value.trim();
        if (!msg) return;

        this.append(msg, 'user');
        if (!overrideMsg) this.nodes.input.value = "";

        // --- FILTRE 1 : SCAN DU CERVEAU LOCAL (JSON) ---
        const cleanMsg = msg.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, ""); 
        
        for (let key in this.localKnowledge) {
            if (cleanMsg.includes(key)) {
                this.showTyping();
                setTimeout(async () => {
                    this.hideTyping();
                    await this.typewrite(this.localKnowledge[key], 'bot');
                    this.showOptionTrigger();
                }, 600);
                return; // On stoppe ici : Gemini n'est pas appelé
            }
        }

        // --- FILTRE 2 : FLUX LICENCE ---
        if (msg === "FLOW_LICENSE") { this.startLicenseFlow(); return; }
        if (this.licenseFlow.active) { this.handleLicenseSteps(msg); return; }

        // --- FILTRE 3 : APPEL IA (GEMINI) ---
        this.showTyping();
        this.updateSendButton('loading');
        this.abortController = new AbortController();

        try {
            const response = await fetch('/assistant/chat', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ message: msg }),
                signal: this.abortController.signal
            });

            if (response.status === 429) {
                this.hideTyping();
                await this.typewrite("Désolé, j'ai reçu trop de questions ! Mon quota est épuisé. Réessayez dans quelques minutes.", 'bot');
                return;
            }

            const d = await response.json();
            this.hideTyping();
            
            if (d.reply === "QUOTA_EXCEEDED" || (d.reply && d.reply.includes("429"))) {
                await this.typewrite("Mon cerveau surchauffe ! Le quota de messages est atteint. Un peu de patience, je reviens vite.", 'bot');
            } else {
                await this.typewrite(d.reply || "Désolé, je ne parviens pas à répondre.", 'bot');
                this.showOptionTrigger();
            }

        } catch (error) {
            this.hideTyping();
            if (error.name !== 'AbortError') this.append("Erreur de connexion.", 'bot');
        } finally {
            this.abortController = null;
            this.updateSendButton('idle');
        }
    }

    // ... (Gardez le reste des fonctions startLicenseFlow, askToRecover, renderChoices, etc. identiques) ...

    async startLicenseFlow() {
        this.licenseFlow.active = true;
        await this.typewrite("Connaissez-vous déjà votre numéro de licence ?");
        this.renderChoices([{ label: "Oui", action: () => this.endFlow("Je vous laisse continuer.") }, { label: "Non", action: () => this.askToRecover() }]);
    }

    async askToRecover() {
        await this.typewrite("Souhaitez-vous que je le récupère pour vous ?");
        this.renderChoices([{ label: "Oui", action: () => { this.licenseFlow.step = 'WAITING_NAME'; this.typewrite("Quel est votre Nom et Prénom ?"); }}, { label: "Non", action: () => this.endFlow() }]);
    }

    renderChoices(choices) {
        const container = document.createElement('div');
        container.className = 'quick-replies-container';
        container.style.display = "flex"; container.style.gap = "8px";
        choices.forEach(c => {
            const btn = document.createElement('button');
            btn.className = 'quick-btn';
            btn.textContent = c.label;
            btn.style.width = "auto";
            btn.onclick = () => { container.remove(); c.action(); };
            container.appendChild(btn);
        });
        this.nodes.body.appendChild(container);
        this.scrollToBottom();
    }

    async handleLicenseSteps(msg) {
        if (this.licenseFlow.step === 'WAITING_NAME') {
            this.licenseFlow.data.name = msg;
            this.licenseFlow.step = 'WAITING_EMAIL';
            await this.typewrite("Merci. Quelle est l'adresse mail utilisée pour votre inscription ?");
        } else if (this.licenseFlow.step === 'WAITING_EMAIL') {
            this.licenseFlow.data.email = msg;
            this.requestLicenseCode();
        } else if (this.licenseFlow.step === 'WAITING_CODE') {
            this.verifyLicenseCode(msg);
        }
    }

    async requestLicenseCode() {
        this.showTyping();
        try {
            const res = await fetch('/assistant/licence/request', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(this.licenseFlow.data)
            });
            const d = await res.json();
            this.hideTyping();
            if (res.ok && d.status === 'success') {
                this.licenseFlow.data.token = d.token;
                this.licenseFlow.step = 'WAITING_CODE';
                await this.typewrite("Un code de vérification vient d'être envoyé sur votre mail. Pouvez-vous me le transmettre ?");
            } else {
                await this.typewrite("Désolé, aucune licence trouvée.");
                this.endFlow();
            }
        } catch(e) { this.hideTyping(); this.endFlow("Erreur de connexion."); }
    }

    async verifyLicenseCode(code) {
        this.showTyping();
        try {
            const res = await fetch('/assistant/licence/verify', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ token: this.licenseFlow.data.token, code: code })
            });
            const d = await res.json();
            this.hideTyping();
            if (res.ok && d.status === 'success') {
                await this.typewrite(`Code validé ! Votre numéro de licence est : ${d.licenseNumber}`);
                this.endFlow();
            } else { await this.typewrite("Code incorrect."); }
        } catch(e) { this.hideTyping(); }
    }

    endFlow(msg = "Puis-je vous aider pour autre chose ?") {
        this.licenseFlow = { active: false, step: null, data: { name:'', email:'', token:'' }};
        if (msg) this.typewrite(msg).then(() => this.showOptionTrigger());
    }

    showOptionTrigger() {
        const row = document.createElement('div');
        row.className = 'chat-row assistant-row';
        const img = document.createElement('img');
        img.src = "/images/ia.png";
        img.className = "elios-chat-avatar";
        row.appendChild(img);
        const btn = document.createElement('button');
        btn.className = 'quick-btn';
        btn.innerHTML = "Choisir un autre sujet";
        btn.style.width = "auto";
        btn.style.color = "var(--elios-purple)";
        btn.style.borderColor = "var(--elios-purple)";
        btn.onclick = () => { row.remove(); this.renderCategories(); };
        row.appendChild(btn);
        this.nodes.body.appendChild(row);
        this.scrollToBottom();
    }

    saveMessage(text, role) {
        const history = JSON.parse(localStorage.getItem(this.storageKey)) || [];
        history.push({ text, role });
        if (history.length > 50) history.shift(); 
        localStorage.setItem(this.storageKey, JSON.stringify(history));
    }

    scrollToBottom() { this.nodes.body.scrollTop = this.nodes.body.scrollHeight; }
}

document.addEventListener('DOMContentLoaded', () => {
    // On stocke l'instance dans window pour y accéder de n'importe où
    window.eliosInstance = new EliosWidget();
});