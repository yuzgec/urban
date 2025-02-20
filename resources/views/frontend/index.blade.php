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
            <h1>{{ __('site.firma') }}</h1>
            <div class="section-desc row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <p>{{ __('site.hizmet_slogan') }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($Service as $item)
            <div class="col-lg-4 mb-3 content" data-aos="fade-up" data-aos-duration="1000">
                <div class="card card-hover">

                    <div class="card-body">
                        <img class="card-img-top" src="{{ $item->getFirstMediaUrl('page', 'thumb') }}" alt="{{ $item->title }}">
                        <div class="icon_box mb-4 mt-3">
                            <img src="/urbanicon.png" alt="{{ $item->title }}" class="light" style="position: absolute;top: 25px;right: 25px;width: 50px;">
                        </div>
                        <h4 class="card-title"><a href="{{ route('servicedetail', $item->slug) }}" title="{{ $item->title }}">{{ $item->title }}</a></h4>
                        <p class="card-text">
                            {!! $item->short !!}
                        </p>
                        <div class="details_link">
                            <a href="{{ route('servicedetail', $item->slug) }}" title="{{ $item->title }}">
                                <span class="link_text">{{ __('site.devaminioku') }}</span>
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
            <h1>{{ __('site.referanslar') }}</h1>
            <div class="section-desc row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <p>{{ __('site.referans_alt_text') }}</p>
                </div>
            </div>
        </div>
        <div class="row">
        @foreach($References->getMedia('gallery')->random(12) as $item)

        <div class="col-md-2 col-4 mb-4 text-center">
            <div class="card">
                <div class="card-body">
                    <img src="{{ $item->getUrl('thumb') }}" alt="{{ __('site.firma')}}" class="img-fluid black-white-img">
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
                    <img src="/frontend/hakkimizda.jpg" alt="{{ __('site.firma')}}">
                    <img src="/frontend/img/about/e1.svg" alt="{{ __('site.firma')}}" data-aos="fade-down" data-aos-duration="1000">
                </div>
            </div>
            <div class="col-lg-6 col-md-7">
                <div class="about_text_inner">
                    <div class="about_text">
                        <h2 class="text-white">{{ __('site.firma') }}</h2>
                        {!! $Hakkimizda->short !!}
                    </div>

                    <div class="about_icon_box">
                        <h3 class="text-dark mb-2">{{ __('site.neden_urban_kabin') }}</h3>
                        <div class="row mt-4">
                            <div class="col-lg-6 col-12 mb-2">
                                <h6>{{ __('site.neden_1_title') }}</h6>
                                <p>{{ __('site.neden_1_text') }}</p>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <h6>{{ __('site.neden_2_title') }}</h6>
                                <p>{{ __('site.neden_2_text') }}</p>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <h6>{{ __('site.neden_3_title') }}</h6>
                                <p>{{ __('site.neden_3_text') }}</p>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <h6>{{ __('site.neden_4_title') }}</h6>
                                <p>{{ __('site.neden_4_text') }}</p>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <h6>{{ __('site.neden_5_title') }}</h6>
                                <p>{{ __('site.neden_5_text') }}</p>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <h6>{{ __('site.neden_5_title') }}</h6>
                                <p>{{ __('site.neden_5_text') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="btn_group" data-aos="fade-down" data-aos-duration="1000">
                        <a href="{{ route('corporatedetail','hakkimizda') }}" class="btn gray">{{__('site.devaminioku')}}</a>  
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
                            <img src="/urbanicon.png" alt="{{ config('settings.siteTitle')}}" class="light" style="width: 50px;">
                        </div>
                        <div class="funfact_content">
                            <p>{{ __('site.yapilan_isler') }}</p>
                            <div class="d-flex align-items-center"><h2 class="fun-number">300</h2><span>+</span></div>                                
                        </div>
                    </div>                            
                    <div class="funfact2 d-flex align-items-center">
                        <div class="fun_img">
                            <img src="/urbanicon.png" alt="{{ config('settings.siteTitle')}}" class="light" style="width: 50px;">
                        </div>
                        <div class="funfact_content">
                            <p>{{ __('site.musteri_memnuniyeti') }}</p>
                            <div class="d-flex align-items-center"><h2 class="fun-number">100%</h2></div>
                        </div>
                    </div>                            
                    <div class="funfact2 d-flex align-items-center">
                        <div class="fun_img">
                            <img src="/urbanicon.png" alt="{{ config('settings.siteTitle')}}" class="light" style="width: 50px;">
                        </div>
                        <div class="funfact_content">
                            <p>{{ __('site.yeni_urunler') }}</p>
                            <div class="d-flex align-items-center"><h2 class="fun-number">15</h2><span>+</span></div>
                        </div>
                    </div>                            
                    <div class="funfact2 d-flex align-items-center">
                        <div class="fun_img">
                            <img src="/urbanicon.png" alt="{{ config('settings.siteTitle')}}" class="light" style="width: 50px;">
                        </div>
                        <div class="funfact_content">
                            <p>{{ __('site.devam_eden_isler') }}</p>
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
            <h2 class="text-white">{{ __('site.yapilan_isler') }}</h2>
            <div class="section-desc row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <p>{{ __('site.yapilan_isler_alt_text') }}</p>
                </div>
            </div>
        </div>

        <div class="portfolio-filters-content">
            <div class="filters-button-group">
                <button class="button" data-slug="">{{ __('site.hepsi') }}</button>
                @foreach($Services as $item)
                    @php $title = explode(" ", $item->title) @endphp
                    <button class="button {{ $item->id == 1 ? 'is-checked' : '' }}" data-slug="{{ $item->translate('tr')->slug }}">
                        {{implode(" ", array_slice($title, 0, 2))}}
                        <sup class="filter-count">{{ $imageCounts[$item->translate('tr')->slug] ?? 0 }}</sup>
                    </button>
                @endforeach
            </div>
        </div>

        <div class="grid gutter-20 clearfix"> 
            <div class="grid-sizer"></div>
            <div id="gallery-container">
                @include('frontend.partials.gallery-items', ['images' => $galleryImages])
            </div>
        </div>
        <div class="btn_group mt-4 w-100 text-center">
            <a href="{{ route('project') }}" class="btn olive w-100">{{ __('site.tum_projeleri_gor') }}</a>
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
            <h2 class="text-white">{{ __('site.blog_yazilari') }}</h2>
        </div>
        <div class="row">
            @foreach($Blog->take(6) as $item)
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
                                        {{ __('site.devaminioku') }}
                                    </span>
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


<div class="container " style="z-index: 1000;">
    <div class="row">
        <div class="col-lg-12 content">
            <div class="card mb-3 mt-3">
                <div class="card-header">
                    <h4 class="card-title">{{ $Index->title }}</h4>
                </div>
                <div class="card-body">
                    {!! $Index->desc!!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('customCSS')


<style>
.loading {
    position: relative;
    min-height: 200px;
}
.loading:after {
    content: '{{ __('site.yukleniyor') }}';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.grid-sizer {
    width: 49%;
}

.grid-item {
    margin-bottom: 20px;
}

.grid-item.width-50 {
    width: 49%;
}

.grid-item.width-100 {
    width: 99%;
}

/* Sağ-sol yerleşimi için */
.grid-item.width-50:nth-of-type(2n+1) { /* Tek sayılı elemanlar */
    margin-right: 1%;
}

.grid-item.width-50:nth-of-type(2n) { /* Çift sayılı elemanlar */
    margin-left: 1%;
}

.thumb img {
    width: 100%;
    height: auto;
    display: block;
}

@media (max-width: 768px) {
    .grid-sizer,
    .grid-item.width-50,
    .grid-item.width-100 {
        width: 100%;
        margin-left: 0;
        margin-right: 0;
    }
}
</style>
@endsection


