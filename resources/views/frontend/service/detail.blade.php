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
                    <li><a href="{{ route('home')}}">Anasayfa</a></li>
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
                    <div class="swiper-slide">
                        <div class="gallery-image">
                            <img src="https://picsum.photos/1920/1000?random=4" alt="img">
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="gallery-image">
                            <img src="https://picsum.photos/1920/1000?random=5" alt="img">
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="gallery-image">
                            <img src="https://picsum.photos/1920/1000?random=6" alt="img">
                        </div>
                    </div>
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

                        <div class="related-posts">
                            <h6 class="widget-title mb-2">
                                ATM KABİNİ PROJELERİMİZ
                                <span class="title-line"></span>
                            </h6>
                            <div class="grid grid-3 gutter-15 clearfix"> 
                                <div class="grid-sizer"></div>                          
                                <div class="grid-item residences">
                                    <div class="thumb">
                                        <img class="item_image" src="/frontend/img/portfolio/4.jpg" alt="">
                                        <div class="works-info">
                                            <div class="label-text">
                                                <h5><a href="#">California young menz club</a></h5>
                                                <h6><a href="#">Club House</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>                          
                                <div class="grid-item interiors"> 
                                    <div class="thumb">
                                        <img class="item_image" src="/frontend/img/portfolio/2.jpg" alt="">
                                        <div class="works-info">
                                            <div class="label-text">
                                                <h5><a href="#">California young menz club</a></h5>
                                                <h6><a href="#">Club House</a>, <a href="#">Interior</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>                      
                                <div class="grid-item residences"> 
                                    <div class="thumb">
                                        <img class="item_image" src="/frontend/img/portfolio/3.jpg" alt="">
                                        <div class="works-info">
                                            <div class="label-text">
                                                <h5><a href="#">California young menz club</a></h5>
                                                <h6><a href="#">Club House</a>, <a href="#">Interior</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('customJS')
    <script type="text/javascript">
        const headings = document.querySelectorAll('.content h1, .content h2, .content h3, .content h4, .content h5, .content h6');
        headings.forEach(function(heading) {
            heading.classList.add('widget-title');
            const span = document.createElement('span');
            span.className = 'title-line';  // class adını ekle
            heading.appendChild(span);  // span'ı başlık etiketinin içine ekle
        });
    </script>
@endsection
