<header class="header">				
    <div class="container">
        <div class="pt-3 d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="{{ route('home') }}" title="{{ config('settings.siteTitle')}}">
                    <img src="/{{ config('settings.siteFooterLogo')}}" alt="{{ config('settings.siteTitle')}}" class="logo-light">
                    <img src="/{{ config('settings.siteLogo')}}" alt="{{ config('settings.siteTitle')}}" class="logo-dark">
                </a>
            </div>
            <div class="mainnav d-none d-lg-block">
                <ul class="main_menu">
                    <li class="menu-item  active"><a href="{{ route('home') }}">Anasayfa</a></li>
                    <li class="menu-item menu-item-has-children"><a href="#">Kurumsal</a>
                        <ul class="sub-menu">
                            @foreach ($Pages as $item)
                                <li class="menu-item">
                                    <a href="{{ route('corporatedetail', $item->slug) }}" title="{{ $item->title }}">
                                        {{ $item->title }}
                                    </a>
                                </li>
                            @endforeach
                 
                        </ul>
                    </li>
                    <li class="menu-item menu-item-has-children"><a href="#">Hizmetlerimiz</a>
                        <ul class="sub-menu">
                            @foreach ($Service as $item)
                                <li class="menu-item">
                                    <a href="{{ route('servicedetail', $item->slug) }}" title="{{ $item->title }}">
                                        {{ $item->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="menu-item"><a href="{{ route('project')}}">Projeler</a></li>
                    <li class="menu-item"><a href="{{ route('reference')}}">Referanslar</a></li>
                    {{-- <li class="menu-item"><a href="{{ route('blog')}}">S.S.S.</a></li> --}}
                    <li class="menu-item"><a href="{{ route('blog')}}">Blog</a></li>
                    <li class="menu-item"><a href="{{ route('contactus')}}">İletişim</a></li>
                </ul>
            </div>
            <div class="header_right_part d-flex align-items-center">
                <button class="aside_open d-none d-sm-block">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </button>
                <div class="header_search">								
                    <img src="/frontend/flag/tr.svg" alt="Türkçe" style="width: 15px;">
                    <img src="/frontend/flag/en.svg" alt="English" style="width: 15px;">
                    <img src="/frontend/flag/sa.svg" alt="Arabic" style="width: 20px;">
                </div>
                
                <button type="button" class="mr_menu_toggle d-lg-none">
                    <i class="bi bi-list"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<div class="mr_menu">
    <div class="mr_menu_overlay"></div>
    <button type="button" class="mr_menu_close"><i class="bi bi-x-lg"></i></button>
    <div class="logo">
        <a href="{{ route('home') }}">
            <img src="/{{ config('settings.siteFooterLogo')}}" alt="{{ config('settings.siteTitle')}}" style="width: 200px;">
        </a>
    </div>
    <div class="mr_navmenu"></div>

    <!-- Footer-->
    <footer class="footer p-0">
        <div class="footer_inner pb-0">
            <div class="footer_elements d-flex align-items-center justify-content-center">
                <div class="footer_elements_inner">
                    <div class="footer_social">
                        <ul class="social_list justify-content-center">
                            <li class="facebook"><a href="https://facebook.com/{{ config('settings.facebook')}}"><i class="bi bi-facebook"></i></a></li>
                            <li class="instagram"><a href="https://instagram.com/{{ config('settings.instagram')}}"><i class="bi bi-instagram"></i></a></li>
                            <li class="youbetube"><a href="https://youtube.com/{{ config('settings.youtube')}}"><i class="bi bi-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="terms_condition">
                        <ul>
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="#">Çerezler</a></li>
                        </ul>
                    </div>
                    <div class="copyright">
                        <p>{{ config('settings.siteTitle')}} {{ date('Y')}}.<br> Tüm Hakları Saklıdır.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="aside_info_wrapper">
    <button class="aside_close"><i class="bi bi-x-lg"></i></button>
    <div class="aside_logo">
        <img src="/urban-kabin-logo.png" alt="{{ config('settings.siteTitle')}}" style="width: 200px;">

    </div>
    <div class="aside_info_inner">
        <p>Urban kabin sistemleri, modern şehir yaşamına uygun, pratik ve fonksiyonel yaşam alanları sunan, sürdürülebilir ve yenilikçi yapılar olarak dikkat çeker.        </p>
        
        <div class="aside_info_inner_box">
            <h5>İletişim Bilgileri</h5>
            <p>{{ config('settings.telefon1')}}</p>
            <p>{{ config('settings.email1')}}</p>
            <p>{{ config('settings.adres1')}}</p>
        </div>
        <div class="social_sites">
            <ul class="d-flex align-items-center justify-content-center">
                <li><a href="https://facebook.com/{{ config('settings.facebook')}}"><i class="bi bi-facebook"></i></a></li>
                <li><a href="https://instagram.com/{{ config('settings.instagram')}}"><i class="bi bi-instagram"></i></a></li>
                <li><a href="https://youtube.com/{{ config('settings.youtube')}}"><i class="bi bi-youtube"></i></a></li>
            </ul>
        </div>
    </div>
</div>


