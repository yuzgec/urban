@extends('frontend.layout.app') 
@section('content')

@include('frontend.layout.slider')

<section class="services bg-dark-100 pt-4 pb-0">

    <ul class="grid_lines d-none d-md-flex justify-content-between">
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
    </ul>

    <div class="large_font">
        <h2 class="floating_element text-dark-200 d-flex justify-content-center" data-aos="fade-right" data-aos-duration="3000">URBAN</h2>
    </div>
    <div class="container">
        <div class="section-header text-center has_line">
            <h1>URBAN ATM VE KABİN SİSTEMLERİ</h1>
            <div class="section-desc row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <p>Şehir yaşamını güvenli, fonksiyonel ve estetik çözümlerle şekillendiriyoruz.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($Service as $item)
            <div class="col-lg-4 mb-3 content" data-aos="fade-up" data-aos-duration="1000">
                <div class="card card-hover">
                    <div class="card-body">
                        <div class="icon_box mb-4 mt-3">
                            <img src="/urbanicon.png" alt="{{ $item->title }}" class="light" style="width: 50px;">
                        </div>
                        <h4 class="card-title"><a href="{{ route('servicedetail', $item->slug) }}" title="{{ $item->title }}">{{ $item->title }}</a></h4>
                        <p class="card-text">
                            {!! $item->short !!}
                        </p>
                        <div class="details_link">
                            <a href="{{ route('servicedetail', $item->slug) }}" title="{{ $item->title }}">
                                <span class="link_text">Devamını Oku</span>
                                <span class="link_icon">
                                    <span class="line"></span>
                                    <span class="circle"></span>
                                    <span class="dot"></span>
                                </span>
                            </a>
                        </div>                 
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>

<div>
    <div class="container" style="z-index: 1000;margin-top:100px">
        <div class=" text-center has_line">
            <h1>REFERANSLAR</h1>
            <div class="section-desc row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <p>Şehir yaşamını güvenli, fonksiyonel ve estetik çözümlerle şekillendiriyoruz.</p>
                </div>
            </div>
        </div>
        <div class="row">
        @foreach($References->getMedia('gallery')->random(12) as $item)

        <div class="col-md-2 col-4 mb-4 text-center">
            <div class="card">
                <div class="card-body">
                    <img src="{{ $item->getUrl('thumb') }}" alt="Urban ATM Kabin İmalatı" class="img-fluid black-white-img">
                </div>
            </div>
        </div>
      @endforeach
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

<section class="about bg-dark-100">
    <div class="large_font">
        <h2 class="floating_element text-dark-200 d-flex justify-content-center" data-aos="fade-right" data-aos-duration="1000">URBAN</h2>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-5">
                <div class="about_image">
                    <img src="/frontend/hakkimizda.jpg" alt="{{ config('settings.siteTitle')}}">
                    <img src="/frontend/img/about/e1.svg" alt="{{ config('settings.siteTitle')}}" data-aos="fade-down" data-aos-duration="1000">
                </div>
            </div>
            <div class="col-lg-6 col-md-7">
                <div class="about_text_inner">
                    <div class="about_text">
                        <h2 class="text-white">URBAN ATM VE KABİN SİSTEMLERİ</h2>
                        {!! $Hakkimizda->short !!}
                    </div>

                    <div class="about_icon_box">
                        <h3 class="text-dark mb-2">NEDEN URBAN KABİN</h3>
                        <div class="row mt-4">
                            <div class="col-lg-6 col-12 mb-2">
                                <h6>Kalite ve Dayanıklılık</h6>
                                <p>Yüksek kaliteli malzemeler kullanarak uzun ömürlü ve dayanıklı kabinler üretiriz.</p>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <h6>Müşteri Odaklı Yaklaşım</h6>
                                <p>Her projede, müşteri ihtiyaçlarına özel çözümler sunarak memnuniyeti en üst seviyeye çıkarırız.</p>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <h6>Zamanında Teslimat</h6>
                                <p>Proje süreçlerini dikkatlice takip ederek zamanında teslimatı garantileriz.</p>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <h6>Çevre Dostu Üretim</h6>
                                <p>Sürdürülebilir çözümlerle, doğaya dost malzemeler kullanarak çevreye duyarlı üretim yaparız.</p>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <h6>Gelişmiş Güvenlik Özellikleri</h6>
                                <p>Kabinlerimizi, hırsızlık, vandalizm ve diğer dış tehditlere karşı güvenli hale getiririz.</p>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <h6>Fonksiyonel ve Estetik Tasarımlar</h6>
                                <p>Şehir yaşamına uyum sağlayacak şık ve işlevsel kabin tasarımları sunarız.</p>
                            </div>
                        </div>
                    </div>
                    <div class="btn_group" data-aos="fade-down" data-aos-duration="1000">
                        <a href="{{ route('corporatedetail','hakkimizda') }}" class="btn gray">Devamını Oku </a>  
                    </div>
                </div>
                                    
            </div>
        </div>
    </div>
</section>

<section class="funfacts bg_1" id="funfacts">
    <div class="container">
        <div class="row">
            <div class="col">
             
                <div class="funfacts_inner">
                    <div class="funfact2 d-flex align-items-center">
                        <div class="fun_img">
                            <img src="/urbanicon.png" alt="{{ $item->title }}" class="light" style="width: 50px;">
                        </div>
                        <div class="funfact_content">
                            <p>YAPILAN İŞLER</p>
                            <div class="d-flex align-items-center"><h2 class="fun-number">300</h2><span>+</span></div>                                
                        </div>
                    </div>                            
                    <div class="funfact2 d-flex align-items-center">
                        <div class="fun_img">
                            <img src="/urbanicon.png" alt="{{ $item->title }}" class="light" style="width: 50px;">
                        </div>
                        <div class="funfact_content">
                            <p>MÜŞTERİ MEMNUNİYETİ</p>
                            <div class="d-flex align-items-center"><h2 class="fun-number">100%</h2></div>
                        </div>
                    </div>                            
                    <div class="funfact2 d-flex align-items-center">
                        <div class="fun_img">
                            <img src="/urbanicon.png" alt="{{ $item->title }}" class="light" style="width: 50px;">
                        </div>
                        <div class="funfact_content">
                            <p>YENİ ÜRÜNLER</p>
                            <div class="d-flex align-items-center"><h2 class="fun-number">15</h2><span>+</span></div>
                        </div>
                    </div>                            
                    <div class="funfact2 d-flex align-items-center">
                        <div class="fun_img">
                            <img src="/urbanicon.png" alt="{{ $item->title }}" class="light" style="width: 50px;">
                        </div>
                        <div class="funfact_content">
                            <p>DEVAM EDEN İŞLER</p>
                            <div class="d-flex align-items-center"><h2 class="fun-number">2</h2><span>+</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="running_projects"> 
    <ul class="grid_lines d-none d-md-flex justify-content-between">
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
    </ul>     
    <div class="large_font">
        <h2 class="floating_element text-dark-200 d-flex justify-content-center" data-aos="fade-right" data-aos-duration="1000">Running</h2>
    </div>  
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="left_part">
                    <div class="grid-item" data-aos="fade-right" data-aos-duration="1000">
                        <div class="thumb">
                            <img class="item_image" src="/frontend/img/image_box/3.jpg" alt="img">
                            <div class="works-info">
                                <div class="label-text">
                                    <h6><a href="#">Club House</a></h6>
                                    <h5><a href="#">California young menz club</a></h5>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>

            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="right_part">
                    <div class="grid-item" data-aos="fade-left" data-aos-duration="1000">
                        <div class="thumb">
                            <img class="item_image" src="/frontend/img/image_box/2.jpg" alt="img">
                            <div class="works-info">
                                <div class="label-text">
                                    <h6><a href="#">Club House</a></h6>
                                    <h5><a href="#">California young menz club</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item active" data-aos="fade-left" data-aos-duration="1500">
                        <div class="thumb">
                            <img class="item_image" src="/frontend/img/image_box/1.jpg" alt="img">
                            <div class="works-info">
                                <div class="label-text">
                                    <h6><a href="#">Club House</a></h6>
                                    <h5><a href="#">California young menz club</a></h5>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
    </div>        
</section> --}}

<section class="projects packery">
    <ul class="grid_lines d-none d-md-flex justify-content-between">
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
    </ul>
    <div class="large_font">
        <h2 class="floating_element text-dark-200 d-flex justify-content-center" data-aos="fade-right" data-aos-duration="1000">URBAN</h2>
    </div>
    <div class="container">
        <div class="section-header text-center has_line">
            <h2 class="text-white">YAPILAN İŞLER</h2>
            <div class="section-desc row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <p> Gerçekleştirdiğimiz referans projelerimiz, kalite ve güvenliği ön planda tutarak 
                        her müşterimizin ihtiyaçlarına özel çözümler sunduğumuzu göstermektedir.
                        Her projede zamanında ve mükemmeliyetçi bir yaklaşım sergileyerek, sektördeki 
                        güvenilirliğimizi pekiştirmeye devam ediyoruz.
                    </p>
                </div>
            </div>
        </div>

        <div class="portfolio-filters-content">
            <div class="filters-button-group">
                <button class="button is-checked" data-filter="*">Hepsi<sup class="filter-count"></sup></button>
                @foreach($Service->take(5) as $item)
                @php $title =$kelimeler = explode(" ", $item->title) @endphp
                <button class="button" data-filter=".{{$item->slug}}">{{implode(" ", array_slice($title, 0, 2))}}<sup class="filter-count"></sup></button>
                @endforeach
           
            </div>
        </div>
        <div class="grid gutter-20 clearfix"> 
            <div class="grid-sizer"></div>                          
            <div class="grid-item residences width-100">
                <div class="thumb">
                    <img class="item_image" src="/frontend/img/portfolio/packery/1.jpg" alt="Urban Kabin İmalatı">
                    <div class="works-info">
                        <div class="label-text">
                            <h6>{{ config('settings.siteTitle')}}</h6>
                            <h5><a href="#">Urban Kabin İmalatı</a></h5>
                            <div class="details_link"><a href="#"><span class="link_text">İncele</span> <span class="link_icon"><span class="line"></span> <span class="circle"></span><span class="dot"></span></span></a></div>
                        </div>
                    </div>
                </div>
            </div>                          
            <div class="grid-item interiors width-50"> 
                <div class="thumb">
                    <img class="item_image" src="/frontend/img/portfolio/packery/2.jpg" alt="Urban Kabin İmalatı">
                    <div class="works-info">
                        <div class="label-text">
                            <h6>{{ config('settings.siteTitle')}}</h6>
                            <h5><a href="#">Urban Kabin İmalatı</a></h5>
                            <div class="details_link"><a href="#"><span class="link_text">İncele</span> <span class="link_icon"><span class="line"></span> <span class="circle"></span><span class="dot"></span></span></a></div>
                        </div>
                    </div>

                </div>
            </div>                      
            <div class="grid-item residences width-50"> 
                <div class="thumb">
                    <img class="item_image" src="/frontend/img/portfolio/packery/3.jpg" alt="Urban Kabin İmalatı">
                    <div class="works-info">
                        <div class="label-text">
                            <h6>{{ config('settings.siteTitle')}}</h6>
                            <h5><a href="#">Urban ATM Kabin İmalatı</a></h5>
                            <div class="details_link"><a href="#"><span class="link_text">İncele</span> <span class="link_icon"><span class="line"></span> <span class="circle"></span><span class="dot"></span></span></a></div>

                        </div>
                    </div>
                </div>
            </div>                      
            <div class="grid-item landscape exterior width-100"> 
                <div class="thumb">
                    <img class="item_image" src="/frontend/img/portfolio/packery/4.jpg" alt="Urban Kabin İmalatı">
                    <div class="works-info">
                        <div class="label-text">
                            <h6>{{ config('settings.siteTitle')}}</h6>
                            <h5><a href="#">Urban Kabin İmalatı</a></h5>
                            <div class="details_link"><a href="#"><span class="link_text">İncele</span> <span class="link_icon"><span class="line"></span> <span class="circle"></span><span class="dot"></span></span></a></div>
                        </div>
                    </div>

                </div>
            </div>                      
           
        </div>
        <div class="btn_group mt-4 w-100 text-center">
            <a href="{{ route('project') }}" class="btn olive w-100">Bütün Projeleri Gör</a>
        </div>
    </div>
</section>

<section class="testimonial box_padding pb-0">
    <ul class="grid_lines d-none d-md-flex justify-content-between">
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
    </ul>
    <div class="has_line_lg"></div>
    <div class="testimonial_inner bg-black">
        <div class="swiper swiper_testimonial">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testimonial-block text-center">
                        <p>"İşini iyi yapmayan insan, zamanı boşa harcar."</p>
                        <h6 class="text-olive">Albert Einstein</h6>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial-block text-center">
                        <p>"Bir işin başlangıcı kadar bitişi de önemlidir."</p>
                        <h6 class="text-olive"> Confucius (Konfüçyüs)</h6>
                    </div>
                </div>
                
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<section class="blog pt-lg bg-dark-100">
    <div class="large_font">
        <h2 class="floating_element text-dark-200 d-flex justify-content-center">URBAN</h2>
    </div>
    <div class="container">
        <div class="section-header text-center has_line">
            <h2 class="text-white">BLOG YAZILARI</h2>
        </div>
        <div class="row">
            @foreach($Blog as $item)
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="blog-post">
                            <a href="{{ route('blogdetail', $item->slug) }}" class="post-image" title="{{ $item->title }}">
                                <div class="image-overlay"></div>
                                <span class="post-date">{{ $item->created_at }}</span>
                                <img src="{{ $item->getFirstMediaUrl('page', 'thumb') }}" alt="{{ $item->title }}">
                            </a>
                            <h5><a href="{{route('blogdetail', $item->slug)}}" class="text-dark" title="{{ $item->title }}">{{ $item->title }}</a></h5>
                            <p>{{ $item->short }}</p>
                            <div class="details_link">
                                <a href="{{route('blogdetail', $item->slug)}}" title="{{ $item->title }}">
                                    <span class="link_text">
                                        Devamını Oku</span>
                                    <span class="link_icon">
                                        <span class="line"></span>
                                        <span class="circle"></span>
                                        <span class="dot"></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>

@endsection


