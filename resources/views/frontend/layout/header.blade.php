<header class="header" dir="ltr">				
    <div class="container">
        <div class="pt-3 d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="{{ route('home') }}" title="{{ config('settings.siteTitle')}}">
                    <img src="/{{ config('settings.siteLogo')}}" alt="{{ config('settings.siteTitle')}}" class="logo-dark">
                    <img src="/{{ config('settings.siteFooterLogo')}}" alt="{{ config('settings.siteTitle')}}" class="logo-light">

                </a>
            </div>
            <div class="mainnav d-none d-lg-block">
                <ul class="main_menu">
                    <li class="menu-item  active"><a href="{{ route('home') }}">{{ __('site.anasayfa') }}</a></li>
                    <li class="menu-item menu-item-has-children"><a href="#">{{ __('site.kurumsal') }}</a>
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
                    <li class="menu-item menu-item-has-children"><a href="#">{{ __('site.hizmetlerimiz') }}</a>
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
                    <li class="menu-item"><a href="{{ route('project')}}">{{ __('site.projeler') }}</a></li>
                    <li class="menu-item"><a href="{{ route('reference')}}">{{ __('site.referanslar') }}</a></li>
                    {{-- <li class="menu-item"><a href="{{ route('blog')}}">S.S.S.</a></li> --}}
                    <li class="menu-item"><a href="{{ route('blog')}}">{{ __('site.blog') }}</a></li>
                    <li class="menu-item"><a href="{{ route('contactus')}}">{{ __('site.iletisim') }}</a></li>
                </ul>
            </div>
            <div class="header_right_part d-flex align-items-center">
                <button class="aside_open d-none d-sm-block">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </button>
                <div class="header_search">			
                    
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, '/', [], true) }}">
                            <img src="/frontend/flag/{{ $localeCode }}.svg" alt="{{ $properties['native'] }}" style="width: 20px;">
                        </a>
                    @endforeach
                
                </div>
                
                <button type="button" class="mr_menu_toggle d-lg-none">
                    <i class="bi bi-list"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<div class="mr_menu" dir="ltr">
    <div class="mr_menu_overlay"></div>
    <button type="button" class="mr_menu_close"><i class="bi bi-x-lg"></i></button>
    <div class="logo">
      
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
                        <p>{{ config('settings.siteTitle')}} {{ date('Y')}}.<br> {{ __('site.tüm_hakları_saklıdır') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="aside_info_wrapper" >
    <button class="aside_close"><i class="bi bi-x-lg"></i></button>
    <div class="aside_logo" >
        <img src="/urban-kabin-logo.png" alt="{{ config('settings.siteTitle')}}" style="width: 200px;">

    </div>
    <div class="aside_info_inner">
        <p>{{ __('site.sidebar_text') }}</p>
        
        <div class="aside_info_inner_box">
            <h5>{{ __('site.iletisim') }}</h5>
            <p>{{ config('settings.telefon1')}}</p>
            <p>{{ config('settings.telefon2')}}</p>
            <p>{{ config('settings.email1')}}</p>
            <p>{{ config('settings.adres1')}}</p>
            <p>{{ config('settings.adres2')}}</p>
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


