
<footer class="footer bg-dark-200 box_padding">
    <div class="footer_inner bg-black">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-4 col-md-2 col-sm-2">
                    <div class="section-header">
                        <h2>{{ __('site.iletisim') }}</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-5">
                    <div class="communication">
                        <div class="info_body">
                            <h6>{{ __('site.email') }}</h6>
                            <h5><a href="mailto:{{ config('settings.email1')}}" class="text-white">{{ config('settings.email1')}}</a> </h5>
                        </div>
                        <div class="info_body">
                            <h6>{{ __('site.telefon') }}</h6>
                            <h5><a href="tel:{{ config('settings.telefon1')}}" class="text-white" dir="ltr">{{ config('settings.telefon1')}}</a> </h5>
                            <h5><a href="tel:{{ config('settings.telefon2')}}" class="text-white" dir="ltr">{{ config('settings.telefon2')}}</a> </h5>

                        </div>
                        <div class="info_body">
                            <h6>{{ __('site.depo_imalat') }}</h6>
                            <h5 class="text-white ">{{ config('settings.adres1')}}</h5>

                        </div>
                        <div class="info_body">
                            <h6>{{ __('site.imalat_ofis') }}</h6>
                            <h5 class="text-white">{{ config('settings.adres2')}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-5">
                    <div class="footer_elements d-flex align-items-center justify-content-end">
                        <div class="footer_elements_inner">
                            <div class="footer_logo">
                                <a href="{{ route('home')}}" class="light_logo">
                                    <img src="/{{ config('settings.siteFooterLogo')}}" alt="{{config('settings.siteTitle')}}">
                                </a>
                            </div>
                            <div class="footer_social" dir="ltr">
                                <ul class="social_list">
                                    <li class="facebook"><a href="https://www.facebook.com/{{ config('settings.facebook')}}" target="_blank"><i class="bi bi-facebook"></i></a></li>
                                    <li class="instagram"><a href="https://www.instagram.com/{{ config('settings.instagram')}}" target="_blank" ><i class="bi bi-instagram"></i></a></li>
                                    <li class="youbetube"><a href="https://www.youtube.com/{{ config('settings.youtube')}}" target="_blank" ><i class="bi bi-youtube"></i></a></li>
                                </ul>
                            </div>
                            <div class="terms_condition">
                                <ul>
                                    <li><a href="{{ route('contactus')}}">{{ __('site.iletisim') }}</a></li>
                                    <li><a href="{{route('home')}}/sitemap/{{config('app.locale')}}/sitemap.xml">{{ __('site.sitemap') }}</a></li>
                                    <li><a href="https://www.godijital.net" target="_blank">{{ __('site.web_tasarim') }}</a></li>
                                </ul>
                            </div>
                            <div class="copyright">
                                <p class="text-white">{{ __('site.firma')}} {{date('Y')}}. {{ __('site.tüm_hakları_saklıdır') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="grid_lines d-none d-md-flex justify-content-between">
            <li class="grid_line"></li>
            <li class="grid_line"></li>
            <li class="grid_line"></li>
            <li class="grid_line"></li>
            <li class="grid_line"></li>
            <li class="grid_line"></li>
            <li class="grid_line"></li>
        </ul>
    </div>
</footer>