@extends('frontend.layout.app')
@section('content')
<div class="page_header">
    <div class="page_header_inner">
        <div class="container">
            <div class="page_header_content d-flex align-items-center justify-content-between">
                <h2 class="heading">Blog</h2>
                <ul class="breadcrumb d-flex align-items-center">
                    <li><a href="{{ route('home')}}">Anasayfa</a></li>
                    <li class="active">Blog</li>
                </ul>
            </div>
        </div>
    </div>        
</div>

<section class="blog-area">
    <div class="container">
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