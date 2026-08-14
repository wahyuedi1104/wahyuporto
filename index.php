<!DOCTYPE html>
<html lang="id" class="scroll-smooth" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wahyu Edi Suryanto | IT Operations & Technical Support</title>
    
    <link class="rounded-circle" rel="icon" type="image/png" href="images/favicon-wahyu.png">

    <!-- Preconnect -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>

    <!-- Bootstrap 5 CSS + Font Awesome + AOS CSS (MURNI BOOTSTRAP, TANPA TAILWIND) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;800&family=Fira+Code:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        /* === SCROLL PROGRESS BAR === */
        #scroll-progress {
            position: fixed; top: 0; left: 0; width: 0%; height: 3px;
            background: linear-gradient(90deg, #0ea5e9, #6366f1);
            z-index: 100000; transition: width 0.1s ease-out;
        }

        /* === BASE & BACKGROUND (OPTIMASI PERFORMA: ANIMASI & BLUR DIHILANGKAN) === */
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f8fafc; color: #0f172a; 
            overflow-x: hidden; transition: background-color 0.4s ease, color 0.4s ease;
        }
        
        body::before {
            content: ''; position: fixed; top: -10%; left: -10%; width: 50vw; height: 50vw;
            background: radial-gradient(circle, rgba(14,165,233,0.1) 0%, rgba(255,255,255,0) 70%);
            z-index: -1; 
        }
        body::after {
            content: ''; position: fixed; bottom: -10%; right: -10%; width: 40vw; height: 40vw;
            background: radial-gradient(circle, rgba(99,102,241,0.08) 0%, rgba(255,255,255,0) 70%);
            z-index: -1; 
        }

        /* === LOADING SCREEN === */
        #loading-screen {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background-color: #ffffff; display: flex; flex-direction: column;
            justify-content: center; align-items: center; z-index: 10000;
            transition: transform 0.6s cubic-bezier(0.77, 0, 0.175, 1), opacity 0.6s ease;
        }
        #loading-screen.loader-hidden { transform: translateY(-100%); opacity: 0; pointer-events: none; }
        .spinner-ring {
            width: 110px; height: 110px; border: 4px solid rgba(0, 0, 0, 0.05);
            border-top: 4px solid #0ea5e9; border-right: 4px solid #6366f1; 
            border-radius: 50%; animation: spin-clockwise 1s linear infinite; position: absolute;
        }
        .loader-avatar { width: 80px; height: 80px; border-radius: 50%; object-fit: cover; object-position: center 20%; z-index: 2; border: 2px solid #ffffff; }
        @keyframes spin-clockwise { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

        /* === TYPOGRAPHY === */
        .text-cyan { color: #0284c7 !important; } 
        .text-gradient { background: linear-gradient(135deg, #0ea5e9, #6366f1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .code-font { font-family: 'Fira Code', monospace; }

        /* === NAVBAR (DIKEMBALIKAN KE BOOTSTRAP ASLI & DIOPTIMASI) === */
        .navbar {
            background: rgba(255, 255, 255, 0.98); 
            border-bottom: 1px solid rgba(0,0,0,0.05); transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        }
        .navbar-brand img { width: 40px; height: 40px; border-radius: 50%; border: 2px solid #0ea5e9; object-fit: cover; object-position: center 20%; }
        .nav-link { color: #475569; font-weight: 600; font-size: 0.95rem; margin: 0 10px; transition: 0.3s; }
        .nav-link:hover, .nav-link.active { color: #0ea5e9; transform: translateY(-2px); }

        /* === HERO SECTION === */
        .hero-section {
            background-color: #f8fafc;
            background: linear-gradient(rgba(248, 250, 252, 0.95), rgba(248, 250, 252, 0.85)), url('images/hero-bg.jpg') center/cover no-repeat; 
            min-height: 100vh; display: flex; align-items: center; padding-top: 80px; transition: background 0.4s ease;
        }
        .profile-pic-hero { 
            width: 260px; height: 260px; object-fit: cover; object-position: center 20%; border-radius: 50%; 
            border: 4px solid rgba(14, 165, 233, 0.2); box-shadow: 0 10px 30px rgba(14, 165, 233, 0.15); 
            margin-bottom: 20px; transition: transform 0.5s ease;
        }
        .profile-pic-hero:hover { transform: scale(1.05) rotate(2deg); border-color: #0ea5e9; }

        /* === BUTTONS & TOGGLES === */
        .btn-glow {
            background: linear-gradient(135deg, #0ea5e9, #6366f1); border: none; color: white;
            font-weight: 600; padding: 12px 25px; border-radius: 8px; transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(14, 165, 233, 0.3); font-size: 0.95rem; cursor: pointer;
        }
        .btn-glow:hover { box-shadow: 0 8px 25px rgba(14, 165, 233, 0.5); transform: translateY(-3px); color: white; }
        
        .btn-outline-glow {
            background: transparent; border: 2px solid #0ea5e9; color: #0ea5e9;
            font-weight: 600; padding: 12px 25px; border-radius: 8px; transition: all 0.3s; font-size: 0.95rem;
        }
        .btn-outline-glow:hover { background: rgba(14, 165, 233, 0.05); box-shadow: 0 4px 15px rgba(14, 165, 233, 0.2); color: #0284c7; transform: translateY(-3px); }

        #theme-toggle, #theme-toggle-desktop {
            background: rgba(14, 165, 233, 0.1); color: #0ea5e9; border: none;
            width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;
            transition: all 0.3s ease; cursor: pointer; font-size: 1.2rem; padding: 0;
        }
        #theme-toggle:hover, #theme-toggle-desktop:hover { background: #0ea5e9; color: white; transform: rotate(15deg); }

        #btn-back-to-top {
            position: fixed; bottom: 30px; left: 30px; z-index: 99; width: 45px; height: 45px;
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            opacity: 0; visibility: hidden; transition: opacity 0.3s, transform 0.3s; transform: translateY(20px); padding: 0;
        }
        #btn-back-to-top.show { opacity: 1; visibility: visible; transform: translateY(0); }

        /* === CARDS & TIMELINE (OPTIMASI: BACKDROP-FILTER BLUR DIHAPUS) === */
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(0,0,0,0.05); border-radius: 16px; transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(0,0,0,0.03); overflow: hidden;
        }
        .glass-card:hover { transform: translateY(-5px); border-color: rgba(14, 165, 233, 0.3); box-shadow: 0 15px 35px rgba(14, 165, 233, 0.15); }
        .roadmap-logo { max-height: 85px; max-width: 140px; object-fit: contain; transition: 0.4s; filter: grayscale(20%); }
        .glass-card:hover .roadmap-logo { transform: scale(1.1); filter: grayscale(0%); }

        .timeline { position: relative; padding-left: 30px; border-left: 2px solid #cbd5e1; }
        .timeline-item { position: relative; margin-bottom: 2.5rem; }
        .timeline-item::before {
            content: ''; position: absolute; left: -37px; top: 0; width: 14px; height: 14px; 
            border-radius: 50%; background: #0ea5e9; border: 3px solid #fff; box-shadow: 0 0 10px rgba(14, 165, 233, 0.5); transition: all 0.3s ease;
        }
        .timeline-item:hover::before { transform: scale(1.3); background: #6366f1; }

        /* === SKILL TAGS DESIGN === */
        .skill-tag {
            display: inline-block; padding: 6px 14px; margin: 4px 2px;
            font-size: 0.85rem; font-weight: 500; font-family: 'Outfit', sans-serif;
            background: rgba(255, 255, 255, 0.8); border: 1px solid rgba(14, 165, 233, 0.2);
            border-radius: 20px; color: #334155; transition: all 0.3s;
        }
        .skill-tag:hover { background: #0ea5e9; color: #fff; border-color: #0ea5e9; transform: translateY(-2px); box-shadow: 0 4px 10px rgba(14, 165, 233, 0.2); }

        /* === RESPONSIVE & LAYOUT === */
        section { padding: 80px 0; overflow: hidden; }
        .section-title { font-weight: 800; font-size: 2.2rem; margin-bottom: 2rem; color: #0f172a; position: relative; display: inline-block; }
        .section-title::after { content: ''; position: absolute; left: 0; bottom: -10px; width: 50%; height: 4px; background: linear-gradient(90deg, #0ea5e9, transparent); border-radius: 2px; }
        @media (min-width: 768px) { section { padding: 100px 0; } .section-title { font-size: 2.8rem; margin-bottom: 3rem; } }

        /* === DARK MODE CSS === */
        [data-bs-theme="dark"] body { background-color: #0f172a; color: #e2e8f0; }
        [data-bs-theme="dark"] body::before { background: radial-gradient(circle, rgba(14,165,233,0.08) 0%, rgba(15,23,42,0) 70%); }
        [data-bs-theme="dark"] body::after { background: radial-gradient(circle, rgba(99,102,241,0.08) 0%, rgba(15,23,42,0) 70%); }
        [data-bs-theme="dark"] #loading-screen { background-color: #0f172a; }
        [data-bs-theme="dark"] .loader-avatar { border-color: #0f172a; }
        
        [data-bs-theme="dark"] .navbar { background: rgba(15, 23, 42, 0.98); border-bottom-color: rgba(255,255,255,0.05); }
        [data-bs-theme="dark"] .navbar-brand { color: #f8fafc !important; }
        [data-bs-theme="dark"] .nav-link { color: #94a3b8; }
        [data-bs-theme="dark"] .nav-link:hover, [data-bs-theme="dark"] .nav-link.active { color: #38bdf8; }
        [data-bs-theme="dark"] .navbar-toggler i { color: #38bdf8 !important; }
        
        [data-bs-theme="dark"] .hero-section { background: linear-gradient(rgba(15, 23, 42, 0.92), rgba(15, 23, 42, 0.95)), url('images/hero-bg.jpg') center/cover no-repeat; }
        [data-bs-theme="dark"] .text-dark { color: #f8fafc !important; }
        [data-bs-theme="dark"] .text-secondary { color: #94a3b8 !important; }
        [data-bs-theme="dark"] .section-title { color: #f8fafc; }
        
        [data-bs-theme="dark"] .glass-card { background: rgba(30, 41, 59, 0.95); border-color: rgba(255,255,255,0.05); box-shadow: 0 8px 25px rgba(0,0,0,0.2); }
        [data-bs-theme="dark"] .glass-card:hover { border-color: rgba(56, 189, 248, 0.3); background: rgba(30, 41, 59, 0.98); }
        
        [data-bs-theme="dark"] section[style*="background-color"] { background-color: rgba(30, 41, 59, 0.4) !important; }
        
        [data-bs-theme="dark"] .timeline { border-left-color: #334155; }
        [data-bs-theme="dark"] .timeline-item::before { border-color: #1e293b; background: #38bdf8; }
        
        [data-bs-theme="dark"] .skill-tag { background: rgba(15, 23, 42, 0.5); border-color: rgba(255,255,255,0.1); color: #cbd5e1; }
        [data-bs-theme="dark"] .skill-tag:hover { background: #38bdf8; color: #0f172a; border-color: #38bdf8; }
        
        [data-bs-theme="dark"] .bg-white { background-color: #1e293b !important; }
        [data-bs-theme="dark"] .bg-light { background-color: #0f172a !important; border-color: rgba(255,255,255,0.05) !important; color: #f8fafc !important; }
        [data-bs-theme="dark"] .border-bottom { border-bottom-color: rgba(255,255,255,0.05) !important; }
        [data-bs-theme="dark"] .border-top { border-top-color: rgba(255,255,255,0.05) !important; }
        [data-bs-theme="dark"] .form-control { background-color: #0f172a !important; border-color: rgba(255,255,255,0.1) !important; color: #f8fafc !important; }
        [data-bs-theme="dark"] .form-control::placeholder { color: #64748b; }
        [data-bs-theme="dark"] .form-control:focus { border-color: #38bdf8 !important; box-shadow: 0 0 0 0.25rem rgba(56, 189, 248, 0.25); }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbarNav">

    <!-- Progress Bar & Loaders -->
    <div id="scroll-progress"></div>
    <div id="loading-screen">
        <div class="position-relative d-flex justify-content-center align-items-center mb-3">
            <div class="spinner-ring"></div>
            <img src="images/foto-wahyu.jpg" alt="Wahyu" class="loader-avatar">
        </div>
        <div class="text-cyan fw-bold tracking-widest" style="letter-spacing: 3px;">INITIALIZING SYSTEM...</div>
    </div>

    <!-- Floating Buttons (WA & Back to Top) -->
    <button id="btn-back-to-top" class="btn-glow" aria-label="Kembali ke atas"><i class="fas fa-arrow-up"></i></button>
    <a href="https://wa.me/6281319598016" target="_blank" aria-label="WhatsApp Kami" class="position-fixed d-flex align-items-center justify-content-center text-white bg-success rounded-circle shadow-lg" style="width: 55px; height: 55px; bottom: 30px; right: 30px; z-index: 100; text-decoration: none; font-size: 1.8rem; transition: transform 0.2s;">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top py-3" id="navbarNav">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center text-dark text-decoration-none fw-bold" href="#">
                <img src="images/foto-wahyu.jpg" alt="Wahyu Edi Suryanto" class="me-2 shadow-sm">
                <span>W<span class="text-cyan">E</span>S.</span>
            </a>
            
            <div class="d-flex align-items-center gap-2">
                <button id="theme-toggle" aria-label="Toggle Dark Mode" class="d-lg-none"><i class="fas fa-moon"></i></button>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <i class="fas fa-bars fs-2 text-cyan"></i>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item px-1"><a class="nav-link" href="#about">Tentang</a></li>
                    <li class="nav-item px-1"><a class="nav-link" href="#experience">Pengalaman</a></li>
                    <li class="nav-item px-1"><a class="nav-link" href="#education">Edukasi</a></li>
                    <li class="nav-item px-1"><a class="nav-link" href="#skills">Keahlian</a></li>
                    <li class="nav-item px-1"><a class="nav-link" href="#projects">Karya</a></li>
                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0 d-flex align-items-center gap-3">
                        <button id="theme-toggle-desktop" aria-label="Toggle Dark Mode" class="d-none d-lg-flex"><i class="fas fa-moon"></i></button>
                        <a class="btn-glow text-decoration-none d-inline-block px-4 py-2" href="#contact"><i class="fas fa-paper-plane me-2"></i>Sapa Saya</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center g-4 g-md-5">
                <div class="col-md-4 text-center order-1 order-md-2" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="images/foto-wahyu.jpg" alt="Wahyu Edi Suryanto" class="profile-pic-hero" loading="eager">
                </div>
                <div class="col-md-8 order-2 order-md-1 text-center text-md-start" data-aos="fade-right" data-aos-duration="1000">
                    <div class="code-font text-cyan mb-2 fs-6 fw-bold">&gt; Hello World...</div>
                    <h1 class="display-4 fw-bold mb-2 text-dark">Wahyu Edi <span class="text-gradient">Suryanto.</span></h1>
                    
                    <!-- TYPING ANIMATION CONTAINER -->
                    <h3 class="fw-bold text-secondary mb-3 fs-4" style="min-height: 35px;">
                        <span id="typed-text" class="text-cyan"></span>
                    </h3>
                    
                    <p class="text-secondary mb-4 lh-lg" style="max-width: 650px; font-size: 1.05rem;" data-aos="fade-up" data-aos-delay="200">
                        Helpdesk Provisioning dengan pengalaman 8+ tahun di lingkungan Telkom Group, berfokus pada <strong>FTTH/GPON provisioning, OLT-to-ONT configuration, NMS monitoring,</strong> dan network troubleshooting. Berpengalaman dalam pengolahan data operasional, SLA/KPI monitoring, dan memanfaatkan AI-assisted development untuk membangun solusi operasional.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-3" data-aos="fade-up" data-aos-delay="400">
                        <a href="#projects" class="btn-glow text-decoration-none"><i class="fas fa-rocket me-2"></i>Lihat Portofolio</a>
                        <a href="images/wahyu-cv.pdf" class="btn-outline-glow text-decoration-none" download="Wahyu_Edi_Suryanto_CV.pdf"><i class="fas fa-download me-2"></i>Unduh CV</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <h6 class="text-cyan fw-bold mb-2 tracking-widest" style="letter-spacing: 2px; font-size: 0.8rem;" data-aos="fade-right">IDENTITAS & PRINSIP</h6>
            <h2 class="section-title" data-aos="fade-right" data-aos-delay="100">Tentang Saya</h2>
            
            <div class="glass-card p-4 p-md-5 border-start border-4 border-info" data-aos="fade-up" data-aos-delay="200">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <h4 class="fw-bold text-cyan mb-3">Operasional Andal, Data-Driven, & Adaptif</h4>
                        <p class="text-secondary lh-lg mb-3">
                            Selama lebih dari 8 tahun berkarir di bidang <strong>Helpdesk Provisioning & Technical Support</strong>, saya memiliki pengalaman ekstensif dalam manajemen layanan FTTH/GPON, mulai dari aktivasi (service activation), konfigurasi OLT ke ONT, hingga troubleshooting jaringan.
                        </p>
                        <p class="text-secondary lh-lg mb-0">
                            Kekuatan utama saya ada di kombinasi antara disiplin standar operasional, kemampuan analitis dalam mengolah data menggunakan Microsoft Excel untuk monitoring SLA/KPI, dan keahlian lintas tim. Saya juga aktif beradaptasi memanfaatkan <strong>AI-assisted development</strong> untuk membangun dashboard monitoring serta solusi pengolahan data demi meningkatkan efisiensi operasional harian.
                        </p>
                    </div>
                    <div class="col-lg-4 text-center d-none d-lg-block">
                        <i class="fas fa-shield-alt text-cyan opacity-25" style="font-size: 8rem; filter: drop-shadow(0 0 20px rgba(14,165,233,0.3));"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" style="background-color: rgba(241, 245, 249, 0.5);">
        <div class="container">
            <h6 class="text-cyan fw-bold mb-2" style="letter-spacing: 2px; font-size: 0.8rem;" data-aos="fade-right">REKAM JEJAK</h6>
            <h2 class="section-title" data-aos="fade-right" data-aos-delay="100">Pengalaman Bekerja</h2>
            
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="timeline mt-3">
                        
                        <!-- Experience 1 -->
                        <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                            <span class="badge bg-primary text-white fw-bold mb-3 px-3 py-2 shadow-sm">April 2018 - Sekarang</span>
                            <div class="glass-card p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-9 order-2 order-md-1">
                                        <h5 class="fw-bold text-dark mb-1">Helpdesk Provisioning</h5>
                                        <h6 class="fw-bold text-cyan mb-3">PT. Telkom Akses (Regional 2, Jakarta Pusat)</h6>
                                        <ul class="text-secondary small ps-3 mb-0 lh-lg">
                                            <li>Melakukan provisioning, aktivasi, dan monitoring layanan FTTH/GPON melalui Network Management System (NMS), termasuk konfigurasi provisioning dari OLT ke ONT.</li>
                                            <li>Menangani provisioning dan pengecekan ONT berbagai vendor, termasuk ZTE, FiberHome, Huawei, dan Nokia, serta melakukan verifikasi status layanan setelah aktivasi.</li>
                                            <li>Memantau order, progres pekerjaan, dan status layanan untuk memastikan proses provisioning berjalan sesuai SLA dan target operasional.</li>
                                            <li>Melakukan troubleshooting awal terhadap kendala provisioning dan layanan serta berkoordinasi dengan teknisi lapangan dan tim internal dalam penyelesaian gangguan.</li>
                                            <li>Menyusun Incident Report, Root Cause Analysis (RCA), dan dokumentasi teknis sebagai bagian dari evaluasi dan peningkatan proses operasional.</li>
                                            <li>Mengolah data operasional dan menyusun laporan harian maupun bulanan menggunakan Microsoft Excel (PivotTable, Lookup, Filter) untuk monitoring SLA, KPI, dan performa operasional.</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 order-1 order-md-2 d-flex justify-content-start justify-content-md-center mb-3 mb-md-0">
                                        <img src="images/logo-telkomakses.png" alt="Telkom" class="roadmap-logo" loading="lazy">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Experience 2 -->
                        <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
                            <span class="badge bg-secondary text-white mb-3 px-3 py-2 shadow-sm">Desember 2016 - November 2017</span>
                            <div class="glass-card p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-9 order-2 order-md-1">
                                        <h5 class="fw-bold text-dark mb-1">Operator Produksi</h5>
                                        <h6 class="fw-bold text-cyan mb-3">PT. Yamaha Music Manufacturing Indonesia</h6>
                                        <ul class="text-secondary small ps-3 mb-0 lh-lg">
                                            <li>Mengoperasikan mesin produksi sesuai standar operasional perusahaan.</li>
                                            <li>Melakukan pemeriksaan kualitas produk sebelum proses berikutnya.</li>
                                            <li>Memastikan target produksi harian tercapai dengan tetap menjaga kualitas produk.</li>
                                            <li>Menerapkan standar 5S, K3, serta disiplin kerja di lingkungan produksi.</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 order-1 order-md-2 d-flex justify-content-start justify-content-md-center mb-3 mb-md-0">
                                        <img src="images/logo-yamaha.png" alt="Yamaha" class="roadmap-logo" loading="lazy">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Experience 3 -->
                        <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                            <span class="badge bg-secondary text-white mb-3 px-3 py-2 shadow-sm">Juni 2015 - April 2016</span>
                            <div class="glass-card p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-9 order-2 order-md-1">
                                        <h5 class="fw-bold text-dark mb-1">Call Center</h5>
                                        <h6 class="fw-bold text-cyan mb-3">Taxiku (Grup Hiba Utama)</h6>
                                        <ul class="text-secondary small ps-3 mb-0 lh-lg">
                                            <li>Menangani pertanyaan dan permintaan pelanggan melalui telepon.</li>
                                            <li>Memasukkan data order pelanggan ke dalam sistem operasional.</li>
                                            <li>Berkoordinasi dengan pengemudi untuk memastikan proses layanan berjalan sesuai SOP.</li>
                                            <li>Memberikan solusi serta informasi kepada pelanggan dengan komunikasi yang baik.</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 order-1 order-md-2 d-flex justify-content-start justify-content-md-center mb-3 mb-md-0">
                                        <img src="images/logo-taxiku.png" alt="Taxiku" class="roadmap-logo" loading="lazy">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Education & Certification Section -->
    <section id="education">
        <div class="container">
            <h6 class="text-cyan fw-bold mb-2" style="letter-spacing: 2px; font-size: 0.8rem;" data-aos="fade-right">LATAR BELAKANG</h6>
            <h2 class="section-title" data-aos="fade-right" data-aos-delay="100">Pendidikan & Sertifikasi</h2>
            
            <div class="row g-4 mt-1">
                <!-- Education -->
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card p-4 h-100">
                        <h5 class="fw-bold text-dark mb-4 border-bottom pb-3"><i class="fas fa-graduation-cap text-cyan me-2"></i> Pendidikan Formal</h5>
                        <div class="timeline mt-3 border-start-0 ps-0">
                            <!-- Darma Persada -->
                            <div class="timeline-item ps-4 border-start border-2 border-primary mb-0">
                                <h6 class="fw-bold text-primary mb-1">Universitas Darma Persada</h6>
                                <p class="text-secondary small mb-2">S1 Teknologi Informasi</p>
                                <div class="d-flex flex-wrap gap-2">
                                    <span class="badge bg-light border text-dark"><i class="far fa-calendar-alt me-1"></i> 2016 - 2021</span>
                                    <span class="badge bg-info bg-opacity-10 text-primary border border-info border-opacity-25"><i class="fas fa-award me-1"></i> IPK: 3.17</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Certifications -->
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass-card p-4 h-100">
                        <h5 class="fw-bold text-dark mb-4 border-bottom pb-3"><i class="fas fa-certificate text-cyan me-2"></i> Sertifikasi Profesional</h5>
                        <div class="timeline mt-3 border-start-0 ps-0">
                            <div class="timeline-item ps-4 border-start border-2 border-primary mb-4">
                                <h6 class="fw-bold text-primary mb-1">Google Foundations of Cybersecurity</h6>
                                <p class="text-secondary small mb-2">Google / Coursera</p>
                                <span class="badge bg-light border text-dark">2025</span>
                            </div>
                            <div class="timeline-item ps-4 border-start border-2 border-primary mb-0">
                                <h6 class="fw-bold text-primary mb-1">CCNA Routing and Switching</h6>
                                <p class="text-secondary small mb-2">Cisco Networking Academy</p>
                                <span class="badge bg-light border text-dark">2020</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW HONEST SKILL SECTION -->
    <section id="skills" style="background-color: rgba(241, 245, 249, 0.5);">
        <div class="container">
            <h6 class="text-cyan fw-bold mb-2" style="letter-spacing: 2px; font-size: 0.8rem;" data-aos="fade-right">NILAI PROFESIONAL</h6>
            <h2 class="section-title" data-aos="fade-right" data-aos-delay="100">Keahlian & Kompetensi</h2>
            <p class="text-secondary mb-5" data-aos="fade-right" data-aos-delay="150">Daftar keahlian di bawah ini merupakan representasi jujur sesuai dengan pengalaman riil dan riwayat pada <i>Curriculum Vitae</i> saya.</p>
            
            <div class="row g-4">
                
                <!-- 1. IT Ops & Network Support -->
                <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="100">
                    <div class="glass-card p-4 p-md-5 h-100">
                        <h5 class="fw-bold text-dark mb-4 border-bottom pb-3"><i class="fas fa-network-wired text-cyan me-2"></i> IT Ops & Network Support</h5>
                        <div>
                            <span class="skill-tag">FTTH</span>
                            <span class="skill-tag">GPON</span>
                            <span class="skill-tag">OLT Provisioning</span>
                            <span class="skill-tag">ONT Provisioning</span>
                            <span class="skill-tag">Network Management System (NMS)</span>
                            <span class="skill-tag">Network Troubleshooting</span>
                            <span class="skill-tag">FiberHome UNM2000</span>
                            <span class="skill-tag">Huawei iMaster NCE</span>
                            <span class="skill-tag">ZTE</span>
                            <span class="skill-tag">FiberHome</span>
                            <span class="skill-tag">Huawei</span>
                            <span class="skill-tag">Nokia</span>
                            <span class="skill-tag">Service Provisioning</span>
                            <span class="skill-tag">Incident Management</span>
                            <span class="skill-tag">Operational Monitoring</span>
                            <span class="skill-tag">SSH</span>
                            <span class="skill-tag">Xshell</span>
                            <span class="skill-tag">TCP/IP (Basic)</span>
                            <span class="skill-tag">VLAN (Basic)</span>
                            <span class="skill-tag">Subnetting (Basic)</span>
                        </div>
                    </div>
                </div>

                <!-- 2. Data Analysis & Administration -->
                <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="200">
                    <div class="glass-card p-4 p-md-5 h-100">
                        <h5 class="fw-bold text-dark mb-4 border-bottom pb-3"><i class="fas fa-chart-pie text-success me-2"></i> Data Analysis & Admin</h5>
                        <div>
                            <span class="skill-tag">SLA & KPI Monitoring</span>
                            <span class="skill-tag">Operational Reporting</span>
                            <span class="skill-tag">Data Analysis</span>
                            <span class="skill-tag">Microsoft Excel</span>
                            <span class="skill-tag">PivotTable</span>
                            <span class="skill-tag">Lookup Functions</span>
                            <span class="skill-tag">Data Filtering</span>
                            <span class="skill-tag">Google Sheets</span>
                            <span class="skill-tag">Google Workspace</span>
                            <span class="skill-tag">Microsoft Office</span>
                            <span class="skill-tag">Technical Documentation</span>
                            <span class="skill-tag">Incident Reporting</span>
                            <span class="skill-tag">Root Cause Analysis (RCA)</span>
                        </div>
                    </div>
                </div>

                <!-- 3. Web Development & AI Tools -->
                <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="300">
                    <div class="glass-card p-4 p-md-5 h-100">
                        <h5 class="fw-bold text-dark mb-4 border-bottom pb-3"><i class="fas fa-code text-primary me-2"></i> Web Development & AI</h5>
                        <div>
                            <span class="skill-tag">AI-Assisted Development (ChatGPT, Gemini, Claude)</span>
                            <span class="skill-tag">Python (Basic)</span>
                            <span class="skill-tag">Streamlit (Basic)</span>
                            <span class="skill-tag">Visual Studio Code</span>
                            <span class="skill-tag">HTML</span>
                            <span class="skill-tag">CSS</span>
                            <span class="skill-tag">Bootstrap</span>
                            <span class="skill-tag">JavaScript (Basic)</span>
                        </div>
                    </div>
                </div>

                <!-- 4. Soft Skills & Competencies -->
                <div class="col-md-6" data-aos="zoom-in-up" data-aos-delay="400">
                    <div class="glass-card p-4 p-md-5 h-100">
                        <h5 class="fw-bold text-dark mb-4 border-bottom pb-3"><i class="fas fa-users text-warning me-2"></i> Soft Skills & Competencies</h5>
                        <div>
                            <span class="skill-tag">Cross-functional Collaboration</span>
                            <span class="skill-tag">Analytical Thinking</span>
                            <span class="skill-tag">Problem Solving</span>
                            <span class="skill-tag">Communication</span>
                            <span class="skill-tag">Attention to Detail</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects">
        <div class="container">
            <h6 class="text-cyan fw-bold mb-2" style="letter-spacing: 2px; font-size: 0.8rem;" data-aos="fade-right">HASIL EKSEKUSI DATA & LOGIKA</h6>
            <h2 class="section-title" data-aos="fade-right" data-aos-delay="100">Karya & Eksperimen Digital</h2>

            <div class="row g-4">
                
                <!-- BimbelPro -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card h-100 d-flex flex-column position-relative p-0 border-0 shadow-sm">
                        <div class="p-4 border-bottom" style="background: rgba(37, 99, 235, 0.1); border-color: rgba(37, 99, 235, 0.2) !important;">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h3 class="fw-bold mb-0 text-dark">BimbelPro</h3>
                            </div>
                            <span class="badge bg-primary text-white fw-bold mb-0">EduTech Platform</span>
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1 bg-white">
                            <p class="text-secondary small mb-3 flex-grow-1 lh-lg">
                                Aplikasi web fullstack untuk manajemen operasional bimbingan belajar. Sistem ini dibangun dengan arsitektur database relasional MySQL untuk mengelola <strong>multi-role authentication</strong>. Fitur intinya mencakup pemrosesan CRUD pada manajemen kelas, pelacakan tagihan, distribusi materi, dan <strong>Computer Based Test (CBT)</strong> dengan kalkulasi skor otomatis.
                            </p>
                            
                            <div class="alert alert-info py-2 px-3 mb-3 small border-0" style="background-color: rgba(14, 165, 233, 0.1); color: #0284c7;">
                                <i class="fas fa-code-branch me-1"></i> Fullstack Web App
                            </div>

                            <button class="btn btn-sm w-100 text-center mb-3 border-0" disabled style="background: rgba(15,23,42,0.05); color: #64748b;">
                                <i class="fas fa-laptop-code me-1"></i> PHP, MySQL, Bootstrap/Tailwind
                            </button>
                            
                            <div class="d-flex flex-wrap gap-2 mt-auto">
                                <span class="badge bg-light border text-dark">LMS & CBT</span>
                                <span class="badge bg-light border text-dark">Role Management</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wahyungaji -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass-card h-100 d-flex flex-column position-relative p-0 border-0 shadow-sm">
                        <div class="p-4 border-bottom" style="background: rgba(34,197,94,0.1); border-color: rgba(34,197,94,0.2) !important;">
                            <h3 class="fw-bold mb-1 text-dark">WahyuNgaji</h3>
                            <span class="badge bg-success text-white fw-bold mb-2">Web App Latihan</span>
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1 bg-white">
                            <p class="text-secondary small mb-4 flex-grow-1 lh-lg">
                                Proyek frontend pendukung aktivitas ibadah harian yang berfokus pada <strong>manipulasi DOM</strong> dan <strong>integrasi data JSON/API</strong> untuk menyajikan fitur Al-Qur'an digital secara dinamis. Antarmuka dirancang responsif, dilengkapi dengan logika kalkulasi matematika dasar pada kalkulator zakat.
                            </p>
                            <a href="https://wahyuedi1104.github.io/wahyungaji/" class="btn-outline-glow btn-sm w-100 text-center mb-3 text-decoration-none" target="_blank" style="border-color: #22c55e; color: #22c55e;">Lihat Hasil Belajar <i class="fas fa-external-link-alt ms-1"></i></a>
                            <div class="d-flex flex-wrap gap-2 mt-auto">
                                <span class="badge bg-light border text-dark">HTML/JS/CSS</span>
                                <span class="badge bg-light border text-dark">Integrasi API</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- WayDash -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="glass-card h-100 d-flex flex-column position-relative p-0 border-0 shadow-sm">
                        <div class="p-4 border-bottom" style="background: rgba(14,165,233,0.1); border-color: rgba(14,165,233,0.2) !important;">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h3 class="fw-bold mb-0 text-dark">WayDash.</h3>
                                <img src="images/logo_waydash.png" alt="WayDash Logo" style="height: 35px; width: auto; object-fit: contain; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));" loading="lazy">
                            </div>
                            <span class="badge bg-primary text-white fw-bold mb-0">Local-Server Monitoring</span>
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1 bg-white">
                            <p class="text-secondary small mb-3 flex-grow-1 lh-lg">
                                Aplikasi dashboard internal untuk monitoring operasional provisioning dan SLA jaringan. Dibangun menggunakan arsitektur local-server dengan backend <strong>Python (FastAPI)</strong> dan database <strong>MySQL</strong> guna mengotomatisasi sinkronisasi data lapangan.
                            </p>
                            
                            <div class="alert alert-success py-2 px-3 mb-3 small border-0" style="background-color: rgba(22, 163, 74, 0.1); color: #15803d;">
                                <i class="fas fa-server me-1"></i> <strong>Sistem Aktif:</strong> Local-Hosted
                            </div>

                            <button class="btn btn-sm w-100 text-center mb-3 border-0" disabled style="background: rgba(15,23,42,0.05); color: #64748b;">
                                <i class="fas fa-lock me-1"></i> Akses Privat (Lokal)
                            </button>
                            
                            <div class="d-flex flex-wrap gap-2 mt-auto">
                                <span class="badge bg-light border text-dark">Python (FastAPI)</span>
                                <span class="badge bg-light border text-dark">MySQL</span>
                            </div>
                        </div>
                    </div>
                </div>
				
                <!-- Web Porto -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="glass-card h-100 d-flex flex-column position-relative p-0 border-0 shadow-sm">
                        <div class="p-4 border-bottom" style="background: rgba(168,85,247,0.1); border-color: rgba(168,85,247,0.2) !important;">
                            <h3 class="fw-bold mb-1 text-dark">Web Portofolio</h3>
                            <span class="badge text-white fw-bold mb-2" style="background-color: #a855f7;">Halaman Profil</span>
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1 bg-white">
                            <p class="text-secondary small mb-4 flex-grow-1 lh-lg">Website portofolio statis yang dikembangkan untuk mendokumentasikan perjalanan karir IT Operations dan implementasi praktik dasar web development modern. Dibangun menggunakan HTML terstruktur, Bootstrap 5, dan Vanilla JavaScript.</p>
                            <button class="btn btn-sm w-100 text-center mb-3 border-0" disabled style="background: rgba(168,85,247,0.1); color: #9333ea;"><i class="fas fa-check-circle me-1"></i> Sedang Diakses</button>
                            <div class="d-flex flex-wrap gap-2 mt-auto">
                                <span class="badge bg-light border text-dark">Bootstrap 5</span>
                                <span class="badge bg-light border text-dark">Vanilla JS</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" style="background-color: rgba(241, 245, 249, 0.5);">
        <div class="container">
            <h6 class="text-cyan fw-bold mb-2 text-center" style="letter-spacing: 2px; font-size: 0.8rem;" data-aos="fade-up">KONEKSI</h6>
            <h2 class="section-title text-center mb-5" data-aos="fade-up" data-aos-delay="100">Mari Terhubung</h2>

            <div class="row g-3 justify-content-center mb-5">
                <div class="col-xl col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="glass-card p-3 p-md-4 text-center h-100 d-flex flex-column justify-content-center">
                        <div class="fs-2 text-cyan mb-2"><i class="fas fa-envelope"></i></div>
                        <h6 class="fw-bold text-dark mb-1">Email (Utama)</h6>
                        <a href="mailto:Wahyuedi1104@gmail.com" class="text-secondary text-decoration-none text-truncate d-block small">Wahyuedi1104@gmail.com</a>
                    </div>
                </div>
                <div class="col-xl col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="glass-card p-3 p-md-4 text-center h-100 d-flex flex-column justify-content-center">
                        <div class="fs-2 text-info mb-2"><i class="far fa-envelope"></i></div>
                        <h6 class="fw-bold text-dark mb-1">Email (Alt)</h6>
                        <a href="mailto:wahyuedi1805@outlook.com" class="text-secondary text-decoration-none text-truncate d-block small">wahyuedi1805@outlook.com</a>
                    </div>
                </div>
                <div class="col-xl col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="glass-card p-3 p-md-4 text-center h-100 d-flex flex-column justify-content-center">
                        <div class="fs-2 text-primary mb-2"><i class="fab fa-linkedin"></i></div>
                        <h6 class="fw-bold text-dark mb-1">LinkedIn</h6>
                        <a href="https://www.linkedin.com/in/wahyuedi18/" class="text-secondary text-decoration-none text-truncate d-block small" target="_blank">wahyuedi18</a>
                    </div>
                </div>
                <div class="col-xl col-md-6 col-sm-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="glass-card p-3 p-md-4 text-center h-100 d-flex flex-column justify-content-center">
                        <div class="fs-2 text-dark mb-2"><i class="fab fa-github"></i></div>
                        <h6 class="fw-bold text-dark mb-1">GitHub</h6>
                        <a href="https://github.com/wahyuedi1104" class="text-secondary text-decoration-none text-truncate d-block small" target="_blank">wahyuedi1104</a>
                    </div>
                </div>
                <div class="col-xl col-md-6 col-sm-6" data-aos="zoom-in" data-aos-delay="500">
                    <div class="glass-card p-3 p-md-4 text-center h-100 d-flex flex-column justify-content-center">
                        <div class="fs-2 text-success mb-2"><i class="fab fa-whatsapp"></i></div>
                        <h6 class="fw-bold text-dark mb-1">WhatsApp</h6>
                        <a href="https://wa.me/6281319598016" class="text-secondary text-decoration-none text-truncate d-block small" target="_blank">+62 813-1959-8016</a>
                    </div>
                </div>
            </div>

            <!-- FORM KONTAK -->
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="300">
                    <div class="glass-card p-4 p-md-5 position-relative">
                        <h4 class="fw-bold mb-2 text-center text-dark">Kirim Sapaan</h4>
                        <p class="text-center text-secondary small mb-4">Mencari tenaga IT Operations & Technical Support yang terbiasa dengan SOP, data operasional, dan kolaborasi lintas tim? Tinggalkan pesan di bawah ini.</p>
                        
                        <form id="contact-form" action="https://formspree.io/f/xnjrzwqq" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" name="Nama Pengirim" class="form-control bg-light border py-2 shadow-none" placeholder="Nama Anda" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="_replyto" class="form-control bg-light border py-2 shadow-none" placeholder="Email Anda" required>
                                </div>
                                <div class="col-12">
                                    <textarea name="Isi Pesan" rows="5" class="form-control bg-light border py-2 shadow-none" placeholder="Pesan / Penawaran Kerjasama" required></textarea>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" id="btn-kirim" class="btn-glow px-5 w-100 py-3">
                                        <span id="btn-text">Kirim Pesan <i class="fas fa-paper-plane ms-2"></i></span>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div id="popup-notif" class="alert alert-success d-none mt-4 text-center border-0 bg-success bg-opacity-25 text-success fw-bold">
                            <i class="fas fa-check-circle me-2"></i> Pesan Berhasil Terkirim!
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 text-center border-top bg-white">
        <div class="container">
            <p class="mb-1 fw-bold text-secondary" style="font-size: 0.9rem;">&copy; 2026 Wahyu Edi Suryanto. Membangun sambil belajar.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    
    <script>
        // 1. Matikan Layar Loading
        window.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('loading-screen');
            if(loader) { setTimeout(() => { loader.classList.add('loader-hidden'); }, 300); }
        });

        // 2. Scroll Progress Bar
        window.addEventListener('scroll', () => {
            let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            let scrolled = (winScroll / height) * 100;
            document.getElementById("scroll-progress").style.width = scrolled + "%";
        });

        // 3. Back to Top Button Logic
        const backToTopBtn = document.getElementById("btn-back-to-top");
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                backToTopBtn.classList.add("show");
            } else {
                backToTopBtn.classList.remove("show");
            }
        });
        backToTopBtn.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // 4. Inisialisasi AOS (Animasi Scroll)
        AOS.init({ once: true, offset: 50, duration: 800 });

        // 5. Inisialisasi Typed.js (Efek Mengetik di Hero selaras dengan CV)
        var typed = new Typed('#typed-text', {
            strings: ['IT Operations.', 'Technical Support.', 'Service Provisioning.', 'Data Analysis.'],
            typeSpeed: 50, backSpeed: 30, backDelay: 2000, loop: true, showCursor: true, cursorChar: '|'
        });

        // 6. Logika Dark Mode Toggle
        const themeToggleBtnMobile = document.getElementById('theme-toggle');
        const themeToggleBtnDesktop = document.getElementById('theme-toggle-desktop');
        const htmlElement = document.documentElement;
        
        const savedTheme = localStorage.getItem('wes-theme') || 'light';
        htmlElement.setAttribute('data-bs-theme', savedTheme);
        updateIcon(savedTheme);

        function toggleTheme() {
            const currentTheme = htmlElement.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            htmlElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('wes-theme', newTheme);
            updateIcon(newTheme);
        }

        function updateIcon(theme) {
            const iconClass = theme === 'light' ? 'fa-moon' : 'fa-sun';
            if(themeToggleBtnMobile) themeToggleBtnMobile.innerHTML = `<i class="fas ${iconClass}"></i>`;
            if(themeToggleBtnDesktop) themeToggleBtnDesktop.innerHTML = `<i class="fas ${iconClass}"></i>`;
        }

        if(themeToggleBtnMobile) themeToggleBtnMobile.addEventListener('click', toggleTheme);
        if(themeToggleBtnDesktop) themeToggleBtnDesktop.addEventListener('click', toggleTheme);

        // 7. Form Kontak AJAX
        const form = document.getElementById('contact-form');
        const popup = document.getElementById('popup-notif');
        const btnKirim = document.getElementById('btn-kirim');
        const btnText = document.getElementById('btn-text');

        if(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                btnKirim.disabled = true;
                btnText.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
                const formData = new FormData(form);

                fetch(form.action, { method: 'POST', body: formData, headers: { 'Accept': 'application/json' } })
                .then(response => {
                    if (response.ok) {
                        popup.classList.remove('d-none');
                        form.reset();
                        setTimeout(() => { popup.classList.add('d-none'); }, 4000);
                    } else { alert('Terjadi kesalahan, gagal mengirim pesan.'); }
                })
                .catch(error => { alert('Gagal mengirim, periksa kembali koneksi internet Anda.'); })
                .finally(() => { btnKirim.disabled = false; btnText.innerHTML = 'Kirim Pesan <i class="fas fa-paper-plane ms-2"></i>'; });
            });
        }
    </script>
</body>
</html>