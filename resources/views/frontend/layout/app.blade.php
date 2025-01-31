<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    @include('frontend.layout.css')
    @yield('customCSS')
</head>

<body class="bg-white">

    {{-- <div id="preloader">
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
    </div> --}}

    <div id="mode_switcher" class="d-none">
        <span><i class="bi bi-moon-fill"></i></span>	
    </div>        

    <div class="pointer bnz-pointer" id="bnz-pointer"></div>

    
        @include('frontend.layout.header')
        
        <main class="wrapper">

            @yield('content')

        </main>

    <div class="fixed-contact-buttons">
        <a href="https://wa.me/{{config('settings.whatsapp')}}" class="contact-button whatsapp" target="_blank">
            <i class="bi bi-whatsapp text-white"></i>
            <div class="whatsapp-tooltip">Hemen mesaj gönderin! 👋</div>
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
