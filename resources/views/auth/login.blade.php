<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Sagon</title>
    <link rel="icon" type="image/png" href="{{ asset('images/tab-logo.png') }}">
    <style>
        :root {
            --bg: #f6f7fb;
            --card: #ffffff;
            --text: #1b2430;
            --muted: #5e6b7a;
            --accent: #3a6df0;
            --accent-strong: #2b56ca;
            --border: #e4e8ef;
        }

        [data-theme="dark"] {
            --bg: #11151c;
            --card: #1a202c;
            --text: #f1f5fb;
            --muted: #b4c0d0;
            --accent: #6d93ff;
            --accent-strong: #87a6ff;
            --border: #2c3442;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            font-family: Inter, Segoe UI, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            transition: background .2s ease, color .2s ease;
        }

        .container {
            width: min(1120px, 92%);
            margin-inline: auto;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 50;
            border-bottom: 1px solid var(--border);
            background: color-mix(in srgb, var(--bg) 86%, transparent);
            backdrop-filter: blur(8px);
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 68px;
            gap: 16px;
        }

        .brand {
            font-weight: 700;
            letter-spacing: .3px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .brand-logo {
            width: 28px;
            height: 28px;
            object-fit: cover;
            border-radius: 999px;
            border: 1px solid var(--border);
        }
        .menu { display: flex; gap: 18px; align-items: center; }
        .menu a {
            color: var(--text);
            text-decoration: none;
            font-weight: 500;
            padding: 8px 10px;
            border-radius: 8px;
            transition: background-color .2s ease, color .2s ease;
        }
        .menu a:hover {
            background: color-mix(in srgb, var(--accent) 14%, transparent);
        }
        .menu a.active {
            background: color-mix(in srgb, var(--accent) 22%, transparent);
            color: var(--accent-strong);
        }

        .btn {
            border: 1px solid var(--border);
            background: var(--card);
            color: var(--text);
            padding: 10px 14px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn.primary {
            border-color: var(--accent);
            background: var(--accent);
            color: #fff;
        }

        .btn.primary:hover { background: var(--accent-strong); }

        section { padding: 52px 0; }
        #home { padding-bottom: 20px; }
        #projects { padding-top: 26px; }

        .hero-grid {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 24px;
            align-items: center;
        }

        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 999px;
            object-fit: cover;
            object-position: center 38%;
            border: 4px solid var(--card);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .12);
        }

        .bio {
            color: var(--muted);
            max-width: 720px;
            line-height: 1.7;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            margin-top: 20px;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            --hover-bg: #eef4ff;
            --hover-border: #9eb8ff;
            --hover-shadow: rgba(58, 109, 240, .22);
            transition: transform .2s ease, box-shadow .2s ease, background-color .25s ease, border-color .25s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 24px var(--hover-shadow);
            background: var(--hover-bg);
            border-color: var(--hover-border);
        }
        .card .contact-icon,
        .card .chip {
            transition: background-color .25s ease, border-color .25s ease;
        }
        .card:hover .contact-icon {
            background: color-mix(in srgb, var(--hover-border) 35%, #ffffff);
        }
        .card:hover .chip {
            border-color: color-mix(in srgb, var(--hover-border) 55%, var(--border));
        }

        .cards .card:nth-child(1) {
            --hover-bg: #edf7ff;
            --hover-border: #7cb9ff;
            --hover-shadow: rgba(124, 185, 255, .32);
        }
        .cards .card:nth-child(2) {
            --hover-bg: #f3efff;
            --hover-border: #b09cff;
            --hover-shadow: rgba(176, 156, 255, .32);
        }

        [data-theme="dark"] .cards .card:nth-child(1) {
            --hover-bg: #1b2a3d;
            --hover-border: #4f89cf;
            --hover-shadow: rgba(79, 137, 207, .34);
        }
        [data-theme="dark"] .cards .card:nth-child(2) {
            --hover-bg: #2a2442;
            --hover-border: #8470cf;
            --hover-shadow: rgba(132, 112, 207, .34);
        }

        .thumb {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
        }

        .card-body { padding: 16px; }
        .muted { color: var(--muted); }
        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 10px 0;
        }
        .contact-icon {
            width: 22px;
            height: 22px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #dfe4ec;
            color: #3f4a5b;
            font-size: 12px;
            flex-shrink: 0;
        }
        .contact-item a {
            color: var(--text);
            text-decoration: none;
        }
        .contact-item a:hover {
            text-decoration: underline;
        }
        .contact-icon-img {
            width: 14px;
            height: 14px;
            object-fit: contain;
            display: block;
        }
        .chips { display: flex; flex-wrap: wrap; gap: 8px; margin: 12px 0; }
        .chip {
            font-size: .82rem;
            border: 1px solid var(--border);
            background: transparent;
            padding: 5px 10px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .chip-logo {
            width: 14px;
            height: 14px;
            object-fit: contain;
            border-radius: 2px;
        }

        form {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 22px;
            max-width: 960px;
            margin-inline: auto;
        }
        #contact .container {
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .contact-header {
            max-width: 760px;
            margin: 0 auto 20px;
            text-align: center;
        }
        .contact-subtitle {
            margin-top: 8px;
        }
        .contact-layout {
            max-width: 980px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 18px;
            align-items: start;
        }
        .contact-info-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 18px;
        }
        .contact-info-title {
            margin: 0 0 8px;
        }
        .contact-info-list {
            display: grid;
            gap: 10px;
            margin: 14px 0 0;
        }
        .contact-line {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--muted);
        }
        .contact-line a {
            color: var(--text);
            text-decoration: none;
            word-break: break-all;
        }
        .contact-line a:hover {
            text-decoration: underline;
        }
        #contact form {
            text-align: left;
            width: 100%;
            max-width: none;
            margin: 0;
            padding: 22px;
            box-shadow: 0 10px 26px rgba(0, 0, 0, .06);
        }
        .form-title {
            margin: 0 0 14px;
            font-size: 1.02rem;
            letter-spacing: .2px;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .field { margin-bottom: 12px; }
        label { display: block; margin-bottom: 6px; font-weight: 600; }
        input, textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: var(--bg);
            color: var(--text);
            transition: border-color .2s ease, box-shadow .2s ease, background-color .2s ease;
        }
        input:focus, textarea:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px color-mix(in srgb, var(--accent) 22%, transparent);
        }
        textarea { min-height: 160px; resize: vertical; }
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 999;
        }
        .modal-overlay.show {
            display: flex;
        }
        .modal-box {
            width: min(420px, 92%);
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 10px 24px rgba(0, 0, 0, .18);
        }
        .modal-box h3 {
            margin: 0 0 8px;
        }
        .modal-box p {
            margin: 0 0 14px;
            color: var(--muted);
        }

        .reveal {
            opacity: 0;
            transform: translateY(14px);
            transition: all .45s ease;
        }
        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }

        footer {
            border-top: 1px solid var(--border);
            padding: 22px 0 34px;
            color: var(--muted);
        }

        @media (max-width: 800px) {
            .hero-grid { grid-template-columns: 1fr; text-align: center; }
            .avatar { margin: 0 auto; }
            .cards { grid-template-columns: 1fr; }
            .grid-2 { grid-template-columns: 1fr; }
            .contact-layout { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="container nav">
            <div class="brand">
                <img class="brand-logo" src="{{ asset('images/brand-logo.png') }}" alt="Brand logo">
                <span>Sagon Portfolio</span>
            </div>
            <nav class="menu">
                <a href="#home" data-section-link="home">Home</a>
                <a href="#projects" data-section-link="projects">Projects</a>
                <a href="#contact" data-section-link="contact">Contact</a>
                <button id="themeToggle" class="btn" type="button">Dark Mode</button>
            </nav>
        </div>
    </header>

    <main>
        <section id="home" class="reveal">
            <div class="container">
                <div class="hero-grid">
                    <img class="avatar" src="{{ asset('images/profile.png') }}" alt="Profile photo">
                    <div>
                        <h1>Julian Andrei Sagon</h1>
                        <p class="bio">
                            IT major specializing in web and mobile application development with hands-on experience using PHP, Laravel, and Ionic Framework for mobile applications.
                            Skilled in building clean, responsive, and functional applications with a focus on usability and maintainable code.
                            </p>
                            <p class="bio">
                            Open and eager to expand my skills by learning programming languages and tools beyond my comfort zone, as I value continuous growth. 
                            Can work well in team environments, communicate effectively, and contribute actively to group goals.
                           
                        </p>
                    </div>
                </div>

                <div class="cards">
                    <article class="card reveal">
                        <div class="card-body">
                            <h3>Contact</h3>
                            <p class="muted contact-item"><span class="contact-icon">📞</span>09937723267</p>
                            <p class="muted contact-item"><span class="contact-icon">✉</span>sagonjulian@gmail.com</p>
                            <p class="muted contact-item"><span class="contact-icon">📍</span>Cebu City, Philippines</p>
                            <p class="contact-item"><span class="contact-icon"><img class="contact-icon-img" src="{{ asset('images/github-logo.png') }}" alt="GitHub logo"></span><a href="https://github.com/julianandrei11" target="_blank">https://github.com/julianandrei11</a></p>
                        </div>
                    </article>
                    <article class="card reveal">
                        <div class="card-body">
                            <h3>Technical Skills</h3>
                            <div class="chips">
                                <span class="chip"><img class="chip-logo" src="{{ asset('images/php-logo.png') }}" alt="PHP logo">PHP</span>
                                <span class="chip"><img class="chip-logo" src="{{ asset('images/laravel-logo.png') }}" alt="Laravel logo">Laravel</span>
                                <span class="chip"><img class="chip-logo" src="{{ asset('images/html-logo.png') }}" alt="HTML logo">HTML5</span>
                                <span class="chip">CSS3</span>
                                <span class="chip"><img class="chip-logo" src="{{ asset('images/livewire-logo.png') }}" alt="Livewire logo">Livewire</span>
                                <span class="chip"><img class="chip-logo" src="{{ asset('images/javascript-logo.png') }}" alt="JavaScript logo">JavaScript</span>
                                <span class="chip">REST APIs</span>
                                <span class="chip">MVC Architecture</span>
                                <span class="chip"><img class="chip-logo" src="{{ asset('images/mysql-logo.png') }}" alt="MySQL logo">MySQL</span>
                                <span class="chip">Database Design</span>
                                <span class="chip">CRUD Operations</span>
                                <span class="chip">GitHub</span>
                                <span class="chip">VS Code</span>
                                <span class="chip">Postman</span>
                                <span class="chip">Data analysis</span>
                                <span class="chip">Software development</span>
                                <span class="chip">Project management</span>
                                <span class="chip">Database management</span>
                                <span class="chip">Team collaboration</span>
                                <span class="chip">Mobile App development</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section id="projects" class="reveal">
            <div class="container">
                <h2>Projects</h2>
         

                <div class="cards">
                    <article class="card reveal">
                        <img class="thumb" src="{{ asset('images/livewire-bg.png') }}" alt="Livewire logo background">
                        <div class="card-body">
                            <h3>Web-Based Management Systems</h3>
                            <p class="muted">Built a CRUD-based web systems using PHP with Laravel framework and MySQL, applying MVC architecture principles.</p>
                            <div class="chips">
                                <span class="chip">Laravel</span>
                                <span class="chip">PHP</span>
                                <span class="chip">MySQL</span>
                            </div>
                            <ul class="muted">
                                <li>Implemented secure user authentication, authorization, and role-based access.</li>
                                <li>Developed a responsive and performance-optimized UI for improved user experience.</li>

                                <li>
                                    Samples:
                                    <ul id="sampleRepoList">
                                        <li>Loading sample repositories...</li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </article>

                    <article class="card reveal">
                        <img class="thumb" src="{{ asset('images/alala-bg.png') }}" alt="ALALA project background">
                        <div class="card-body">
                            <h3>Mobile Applications (Ionic Framework)</h3>
                            <p class="muted">Major Project: Our app is an Assistive Learning App for loved ones with Alzheimer’s that helps patients recall people, places, and daily routines. Using flashcards, cognitive activities, memory playback, and progress tracking, the app supports memory improvement, family engagement, and cognitive care.</p>
                            <div class="chips">
                                <span class="chip">Ionic Framework</span>
                                <span class="chip">Angular</span>
                                <span class="chip">REST APIs</span>
                            </div>
                            <p><a href="https://www.canva.com/design/DAG3USwpQ-4/Px23gwCrUVMJQBypMs7KBA/edit?fbclid=IwY2xjawQokQFleHRuA2FlbQIxMABicmlkETFhbEt0VjBxcEF0TDdkV3llc3J0YwZhcHBfaWQQMjIyMDM5MTc4ODIwMDg5MgABHmBHR0nGLqiRzzpjZxKEvRDzW5-vzJolcPhSmQ8nXfRX2DFSapPjajypW8Hv_aem_jIo6q0XrwOnN2vFI7a6tJw" target="_blank" rel="noopener noreferrer">View Summary</a></p>
                            <ul class="muted">
                                <li>Reached Top 10 in the Philippine Startup Challenge X (PSC X) Regional Pitching Competition</li>
                              
                                <li>Optimized mobile performance and UI consistency for elderly users.</li>
                            </ul>
                        </div>
                    </article>
                </div>

              
                </div>
            </div>
        </section>

        <section id="contact" class="reveal">
            <div class="container">
                <div class="contact-header reveal">
                    <h2>Contact</h2>
                    <p class="muted contact-subtitle">For inquiries, please use the form below or send a message.</p>
                </div>
                <div class="contact-layout">
                    <form id="contactForm" class="reveal" novalidate>
                        <h3 class="form-title">Send a Message</h3>
                        <div class="grid-2">
                            <div class="field">
                                <label for="name">Full Name</label>
                                <input id="name" name="name" type="text" placeholder="Enter your full name">
                            </div>
                            <div class="field">
                                <label for="email">Email Address</label>
                                <input id="email" name="email" type="email" placeholder="Enter your email address">
                            </div>
                        </div>
                        <div class="field">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" placeholder="Write your message here"></textarea>
                        </div>
                        <button class="btn primary" type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <div class="modal-overlay" id="successModal">
        <div class="modal-box">
            <h3>Message Sent</h3>
            <p>Your message has been submitted successfully.</p>
            <button class="btn primary" type="button" id="closeSuccessModal">OK</button>
        </div>
    </div>

    <footer>
        <div class="container">© <span id="year"></span> </div>
    </footer>

    <script>
        const root = document.documentElement;
        const toggle = document.getElementById("themeToggle");
        const savedTheme = localStorage.getItem("portfolio-theme");
        const sectionLinks = document.querySelectorAll("[data-section-link]");
        const sectionTitleMap = {
            home: "Home | Sagon",
            projects: "Projects | Sagon",
            contact: "Contact | Sagon"
        };

        function setActiveSection(sectionId) {
            sectionLinks.forEach((link) => {
                const isActive = link.dataset.sectionLink === sectionId;
                link.classList.toggle("active", isActive);
            });
            document.title = sectionTitleMap[sectionId] || "Portfolio | Sagon";
        }

        sectionLinks.forEach((link) => {
            link.addEventListener("click", () => {
                const sectionId = link.dataset.sectionLink;
                setActiveSection(sectionId);
            });
        });

        function updateActiveSectionOnScroll() {
            const sections = ["home", "projects", "contact"]
                .map((id) => document.getElementById(id))
                .filter(Boolean);
            const triggerPoint = window.scrollY + (window.innerHeight * 0.35);
            let activeSectionId = "home";

            sections.forEach((section) => {
                if (section.offsetTop <= triggerPoint) {
                    activeSectionId = section.id;
                }
            });

            setActiveSection(activeSectionId);
        }

        if (savedTheme === "dark") {
            root.setAttribute("data-theme", "dark");
            toggle.textContent = "Light Mode";
        }

        toggle.addEventListener("click", () => {
            const dark = root.getAttribute("data-theme") === "dark";
            if (dark) {
                root.removeAttribute("data-theme");
                localStorage.setItem("portfolio-theme", "light");
                toggle.textContent = "Dark Mode";
            } else {
                root.setAttribute("data-theme", "dark");
                localStorage.setItem("portfolio-theme", "dark");
                toggle.textContent = "Light Mode";
            }
        });

        const contactForm = document.getElementById("contactForm");
        const successModal = document.getElementById("successModal");
        const closeSuccessModal = document.getElementById("closeSuccessModal");

        contactForm.addEventListener("submit", (e) => {
            e.preventDefault();
            successModal.classList.add("show");
            contactForm.reset();
        });

        closeSuccessModal.addEventListener("click", () => {
            successModal.classList.remove("show");
        });

        async function loadSampleRepos() {
            const sampleRepoList = document.getElementById("sampleRepoList");
            if (!sampleRepoList) return;

            try {
                const response = await fetch("https://api.github.com/users/julianandrei11/repos?per_page=100");
                if (!response.ok) throw new Error("Failed to fetch repositories");

                const repos = await response.json();
                const wantedRepos = ["livewirenew", "laravelcrud", "libretto"];
                const repoMap = new Map(repos.map((repo) => [repo.name.toLowerCase(), repo]));
                const matched = wantedRepos
                    .map((name) => repoMap.get(name))
                    .filter(Boolean);

                if (matched.length === 0) {
                    sampleRepoList.innerHTML = "<li>No sample repositories found.</li>";
                    return;
                }

                sampleRepoList.innerHTML = matched.map((repo) => {
                    return `<li><a href="${repo.html_url}" target="_blank" rel="noopener noreferrer">${repo.html_url}</a></li>`;
                }).join("");
            } catch (error) {
                sampleRepoList.innerHTML = "<li>Could not load sample repositories right now.</li>";
            }
        }

        loadSampleRepos();

        document.getElementById("year").textContent = new Date().getFullYear();
        updateActiveSectionOnScroll();
        window.addEventListener("scroll", updateActiveSectionOnScroll, { passive: true });

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        }, { threshold: 0.12 });

        document.querySelectorAll(".reveal").forEach((el) => observer.observe(el));
    </script>
</body>
</html>
