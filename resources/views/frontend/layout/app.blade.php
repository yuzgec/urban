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
    <style>

.black-white-img {
  filter: grayscale(100%);
  transition: filter 0.3s ease;
}
.black-white-img:hover {
  filter: grayscale(0%);
}

       
        .fixed-contact-buttons {
            position: fixed;
            bottom: 30px;
            right: 25px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            z-index: 999;
        }

        .contact-button {   
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            background: #333;
        }

        .contact-button:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .whatsapp {
            background: #25D366;
        }

        .instagram {
            background: #333; /* Siyah beyaz tema için */
        }

        .phone {
            background: #333;
        }

        .contact-button i {
            font-size: 24px;
        }

        /* WhatsApp Pulse Efekti */
        .fixed-contact-buttons .whatsapp {
            background: #25D366;
            animation: whatsapp-pulse 2s infinite;
            position: relative;
        }

        @keyframes whatsapp-pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        .fixed-contact-buttons .whatsapp:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            animation: none; /* Hover durumunda pulse efektini durdur */
        }

        /* WhatsApp Mesaj Kutusu */
        .whatsapp-tooltip {
            position: absolute;
            right: 70px;
            background: white;
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 14px;
            color: #333;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateX(20px);
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .whatsapp-tooltip::after {
            content: '';
            position: absolute;
            right: -8px;
            top: 50%;
            transform: translateY(-50%);
            border-left: 8px solid white;
            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent;
        }

        .whatsapp-tooltip.show {
            opacity: 1;
            visibility: visible;
            transform: translateX(0);
        }
    </style>
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const tooltip = document.querySelector('.whatsapp-tooltip');
        
        function toggleTooltip() {
            tooltip.classList.add('show');
            
            setTimeout(() => {
                tooltip.classList.remove('show');
            }, 3000); // 3 saniye görünür kalacak
        }
        
        // İlk gösterim için 2 saniye bekle
        setTimeout(() => {
            toggleTooltip();
            
            // Her 10 saniyede bir tekrarla
            setInterval(toggleTooltip, 10000);
        }, 2000);
    });
    </script>

</body>
</html>
