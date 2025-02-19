<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ config('app.locale') == 'sa' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    @include('frontend.layout.css')
    @yield('customCSS')

    
<style>
    .blog-area {
        padding: 80px 0;
    }
    
    .blog-post {
        margin-bottom: 30px;
    }

    .post-image {
        position: relative;
        background: #f5f5f5;
        margin-bottom: 20px;
        display: block;
        overflow: hidden;
    }

    .post-image img {
        width: 100%;
        height: auto;
        transition: all 0.5s ease;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.4);
        opacity: 0;
        transition: all 0.5s ease;
        z-index: 1;
    }

    .post-image:hover img {
        transform: scale(1.1);
    }

    .post-image:hover .image-overlay {
        opacity: 1;
    }

    .post-date {
        position: absolute;
        top: 20px;
        left: 20px;
        background: #ffa500;
        color: #fff;
        padding: 5px 15px;
        font-size: 14px;
        z-index: 2;
    }

    .post-content {
        position: relative;
        padding: 20px 0;
    }

    .post-number {
        position: absolute;
        left: 0;
        bottom: 70px;
        color: #ffa500;
        font-size: 24px;
        font-weight: bold;
    }

    .post-title {
        font-size: 18px;
        margin-bottom: 15px;
        padding-left: 40px;
    }

    .post-link a {
        display: flex;
        align-items: center;
        color: #333;
        text-decoration: none;
        font-size: 14px;
        padding-left: 40px;
    }

    .post-link .dot {
        width: 6px;
        height: 6px;
        background: #ffa500;
        border-radius: 50%;
        margin-left: 10px;
        transition: transform 0.3s ease;
    }

    .post-link a:hover .dot {
        transform: translateX(5px);
    }

    :root {
        --bg-color: #ffffff;
        --text-color: #000000;
        --card-bg: #ffffff;
    }

    [data-theme="dark"] {
        --bg-color: #1a1a1a;
        --text-color: #ffffff;
        --card-bg: #2d2d2d;
    }

    body {
        background-color: var(--bg-color);
        color: var(--text-color);
        transition: all 0.3s ease;
    }

    .card {
        background-color: var(--card-bg);
    }

    .theme-toggle {
        background: #6c757d;
    }

    .theme-toggle:hover {
        background: #5a6268;
    }

    .fixed-contact-buttons {
        position: fixed;
        right: 20px;
        bottom: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        z-index: 1000;
    }

    .contact-button {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    /* Dark/Light Tema Stilleri */
    body.bg-white .card {
        background-color: #ffffff;
        color: #000000;
    }

    body.bg-white .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    body.bg-white .card-body {
        color: #212529;
    }

    body.bg-dark .card {
        background-color: #2d2d2d;
        border-color: #404040;
    }

    body.bg-dark .card-header {
        background-color: #343434;
        border-bottom: 1px solid #404040;
    }

    body.bg-dark .card-body {
        color: #ffffff;
    }

    /* Link Renkleri */
    body.bg-white .card a {
        color: #212529;
    }

    body.bg-dark .card a {
        color: #ffffff;
    }

    /* Hover Efektleri */
    body.bg-white .card:hover {
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    body.bg-dark .card:hover {
        box-shadow: 0 0 15px rgba(255,255,255,0.1);
    }

    /* Geçiş Efekti */
    .card, .card-header, .card-body {
        transition: all 0.3s ease;
    }

    /* Logo Stilleri */
    .logo img {
        max-height: 150px;
        transition: opacity 0.3s ease;
    }

    .logo-light, .logo-dark {
        position: absolute;
        top: 0;
        left: 0;
    }

    body.bg-dark .logo-light {
        opacity: 1;
        visibility: visible;
    }

    body.bg-dark .logo-dark {
        opacity: 0;
        visibility: hidden;
    }

    body.bg-white .logo-light {
        opacity: 0;
        visibility: hidden;
    }

    body.bg-white .logo-dark {
        opacity: 1;
        visibility: visible;
    }

    .logo {
        position: relative;
        display: inline-block;
        width: 150px; /* Logo genişliğine göre ayarlayın */
    }
</style>
</head>

<body class="bg-white">

    <div id="preloader" dir="ltr">
        <div class="preloader-inner">
            <div class="spinner"></div>
            <div class="loading-text">
                <span data-preloader-text="U" class="characters">U</span>
                <span data-preloader-text="R" class="characters">R</span>
                <span data-preloader-text="B" class="characters">B</span>
                <span data-preloader-text="A" class="characters">A</span>
                <span data-preloader-text="N" class="characters">N</span>
            </div>
        </div>
    </div>

    <div id="mode_switcher" class="d-none">
        <span><i class="bi bi-moon-fill"></i></span>	
    </div>        

    <div class="pointer bnz-pointer" id="bnz-pointer"></div>

    
        @include('frontend.layout.header')
        
        <main class="wrapper">

            @yield('content')

        </main>

    <div class="fixed-contact-buttons">
        <a href="#" class="contact-button theme-toggle" id="theme-toggle">
            <i class="bi bi-sun-fill text-white" id="theme-icon"></i>
        </a>
        <a href="https://wa.me/{{config('settings.whatsapp')}}" class="contact-button whatsapp" target="_blank">
            <i class="bi bi-whatsapp text-white"></i>
        </a>
        <a href="https://www.instagram.com/{{config('settings.instagram')}}" class="contact-button instagram" target="_blank">
            <i class="bi bi-instagram text-white"></i>
        </a>
        <a href="tel:{{config('settings.telefon1')}}" class="contact-button phone">
            <i class="bi bi-phone text-white"></i>
        </a>
    </div>

    @include('frontend.layout.footer')
    @include('frontend.layout.js')
    @yield('customJS')

   

</body>
</html>
