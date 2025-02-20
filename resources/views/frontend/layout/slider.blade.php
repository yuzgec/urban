
<div class="theme_slider bg-black" dir="ltr">
    <div class="container">
        <div class="swiper swiper_theme_slider">
            <div class="swiper-wrapper">
                @foreach($Slider as $item)
                <div class="swiper-slide">
                    <div class="slider" style="background-image: url({{ $item->getFirstMediaUrl('page', 'page_img') }})">
                        <div class="slide_content">
                            <div class="slide_content_wrapper mb-0 h-auto bg-dark-100">
                                <div class="slide_content_inner">
                                    <div class="meta m-0">
                                        <div class="category text-olive text-uppercase">{{ __('site.firma')}}</div>
                                    </div>
                                    <h4><a href="{{ $item->link }}" class="text-white">{{ $item->title }}</a></h4>
                                    <div class="details_link">
                                        <a href="{{ $item->link }}">
                                            <span class="link_text">{{ ($item->link_text) ? $item->link_text : __('site.incele')}}</span> 
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
                </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Add Buttons -->
            <div class="swiper-navigation">
                <div class="swiper-button-prev"><i class="bi bi-arrow-left"></i></div>
                <div class="swiper-button-next"><i class="bi bi-arrow-right"></i></div>
            </div>
        </div>
    </div>
    <div class="divider_bg bg-dark-100"></div>
</div>
