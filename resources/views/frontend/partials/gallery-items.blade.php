@php
    $verticalImages = $images->where(function($media) { 
        return $media->getCustomProperty('orientation') === 'vertical'; 
    });
    $horizontalImages = $images->where(function($media) { 
        return $media->getCustomProperty('orientation') === 'horizontal'; 
    });
@endphp

<div class="row">
    <div class="col-md-6">
        @foreach($verticalImages as $index => $item)
            @if($index % 2 == 0)
                <div class="grid-item {{ $item->model->translate('tr')->slug }} mb-4">
                    <div class="thumb">
                        <img class="item_image" src="{{ $item->getUrl('thumb') }}" alt="{{ $item->model->title }}">
                        <div class="works-info">
                            <div class="label-text">
                                <h6>{{ config('settings.siteTitle')}}</h6>
                                <h5><a href="{{ route('servicedetail', $item->model->slug) }}">{{ $item->model->title }}</a></h5>
                                <div class="details_link">
                                    <a href="{{ route('servicedetail', $item->model->slug) }}">
                                        <span class="link_text">İncele</span>
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
            @endif
        @endforeach
    </div>
    
    <div class="col-md-6">
        @foreach($verticalImages as $index => $item)
            @if($index % 2 == 1)
                <div class="grid-item {{ $item->model->translate('tr')->slug }} mb-4">
                    <div class="thumb">
                        <img class="item_image" src="{{ $item->getUrl('thumb') }}" alt="{{ $item->model->title }}">
                        <div class="works-info">
                            <div class="label-text">
                                <h6>{{ config('settings.siteTitle')}}</h6>
                                <h5><a href="{{ route('servicedetail', $item->model->slug) }}">{{ $item->model->title }}</a></h5>
                                <div class="details_link">
                                    <a href="{{ route('servicedetail', $item->model->slug) }}">
                                        <span class="link_text">İncele</span>
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
            @endif
        @endforeach
    </div>
</div>

@foreach($horizontalImages as $item)
    <div class="grid-item {{ $item->model->translate('tr')->slug }} mb-4">
        <div class="thumb">
            <img class="item_image" src="{{ $item->getUrl('thumb') }}" alt="{{ $item->model->title }}">
            <div class="works-info">
                <div class="label-text">
                    <h6>{{ config('settings.siteTitle')}}</h6>
                    <h5><a href="{{ route('servicedetail', $item->model->slug) }}">{{ $item->model->title }}</a></h5>
                    <div class="details_link">
                        <a href="{{ route('servicedetail', $item->model->slug) }}">
                            <span class="link_text">İncele</span>
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