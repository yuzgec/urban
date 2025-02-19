@extends('frontend.layout.app')
@section('content')

<div class="page_header">
    <div class="page_header_inner">
        <div class="container">
            <div class="page_header_content d-flex align-items-center justify-content-between">
                <div class="d-flex flex-column">
                    <h1 class="heading">
                        {{$Detay->title}}
                    </h1>
                    <div class="">
                        <p class="text-olive">{{config('settings.siteTitle')}}</p>
                    </div>
                </div>
                <ul class="breadcrumb d-flex align-items-center">
                    <li><a href="{{ route('home')}}">{{ __('site.anasayfa')}}</a></li>
                    <li><a href="" title="{{ $Detay->getCategory->title}}">{{ $Detay->getCategory->title}}</a></li>
                    <li class="active">{{ $Detay->title}}</li>
                </ul>
            </div>
        </div>
    </div>        
</div>
    
<section class="project-details bg-dark-200">
    <div class="container" style="z-index: 1000;">       
         <div class="gallery_slider">
            <div class="swiper swiper_gallery">
                <div class="swiper-wrapper">
                    @forelse($horizontalImages as $item)
                        <div class="swiper-slide">
                            <div class="gallery-image">
                                <img src="{{ $item->getUrl('img') }}" alt="{{ $Detay->title }}">
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <div class="gallery-image">
                                <img src="{{ $Detay->getFirstMediaUrl('page') }}" alt="{{ $Detay->title }}">
                            </div>
                        </div>
                    @endforelse
                </div>
 
                <div class="swiper-navigation">
                    <div class="swiper-button-prev"><i class="bi bi-arrow-left"></i></div>
                    <div class="swiper-button-next"><i class="bi bi-arrow-right"></i></div>
                </div>
            </div>
        </div>

        <div class="row">
                    
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="sidebar">

                            <div class="service-information">
                                <ul class="">
                                    @foreach ($Service as $item)
                                    <li class="{{ ($item->id == $Detay->id) ? 'active' : ''}}">
                                        <a href="{{ route('servicedetail', $item->slug)}}">
                                            ✔ {{ $item->title}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8 col-md-8">
                <div class="project-details_inner">
                    <div class="post_content">

                        <div class="content">
                            <div class="card mb-3">
                                <div class="card-body">
                                    {!! $Detay->desc !!}
                                </div>
                            </div>
                        </div>


                        <h6 class="widget-title mb-2">
                            {{ $Detay->title }} PROJELERİMİZ
                            <span class="title-line"></span>
                        </h6>

                        <figure class="block-gallery">
                            <ul class="blocks-gallery-grid">
                                @foreach($allImages as $item)
                                    <li class="blocks-gallery-item {{ $item->getCustomProperty('orientation') === 'horizontal' ? 'width-100' : '' }}">
                                        <figure>
                                            <img src="{{ $item->getUrl('thumb') }}" alt="{{ $Detay->title }}" class="block-image">
                                            <div class="popup-btn">
                                                <a href="{{ $item->getUrl('watermark') }}" data-fancybox="images">
                                                    <i class="bi bi-plus"></i>
                                                </a>
                                            </div>
                                        </figure>
                                    </li>
                                @endforeach
                            </ul>
                        </figure>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('customJS')
<script src="/frontend/plugins/fancybox/jquery.fancybox.min.js"></script>
<script src="/frontend/plugins/fancybox/fancybox-init.js"></script>
<script>
    $(document).ready(function() {
        var $grid = $('.blocks-gallery-grid').isotope({
            itemSelector: '.blocks-gallery-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.blocks-gallery-item'
            }
        });

        $grid.imagesLoaded().progress(function() {
            $grid.isotope('layout');
        });
    });
</script>
@endsection

@section('customCSS')
<style>
    /* Slider CSS */
    .gallery_slider .swiper-slide {
        height: 500px;
    }
    .gallery_slider .gallery-image {
        width: 100%;
        height: 100%;
    }
    .gallery_slider .gallery-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    /* Gallery Grid CSS */
    .blocks-gallery-grid {
        width: 100%;
    }
    .blocks-gallery-item {
        width: 32%;
        margin-bottom: 20px;
    }
    .blocks-gallery-item.width-100 {
        width: 66%;
    }
    .blocks-gallery-item figure {
        margin: 0;
        height: 100%;
    }
    .blocks-gallery-item img {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }
    
    @media (max-width: 768px) {
        .blocks-gallery-item,
        .blocks-gallery-item.width-100 {
            width: 100%;
        }
    }
</style>
@endsection
