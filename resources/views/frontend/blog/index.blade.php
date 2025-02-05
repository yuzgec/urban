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
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="blog-post">
                                <a href="{{ route('blogdetail', $item->slug) }}" class="post-image">
                                    <div class="image-overlay"></div>
                                    <span class="post-date">{{ $item->created_at }}</span>
                                    <img src="{{ $item->getFirstMediaUrl('page', 'thumb') }}" alt="{{ $item->title }}">
                                </a>
                                <div class="post-content">
                                    <h3 class="post-title">{{ $item->title }}</h3>
                                    <div class="post-link">
                                        <a href="{{ route('blogdetail', $item->slug) }}">
                                            DEVAMINI OKU
                                            <span class="dot"></span>
                                        </a>
                                    </div>
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

@section('customCSS')
<style>
    .blog-area {
        padding: 80px 0;
    }
    
    .blog-post {
        margin-bottom: 30px;
    }

    .post-image {
        position: relative;
        background: #f5f5f5;
        margin-bottom: 20px;
        display: block;
        overflow: hidden;
    }

    .post-image img {
        width: 100%;
        height: auto;
        transition: all 0.5s ease;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.4);
        opacity: 0;
        transition: all 0.5s ease;
        z-index: 1;
    }

    .post-image:hover img {
        transform: scale(1.1);
    }

    .post-image:hover .image-overlay {
        opacity: 1;
    }

    .post-date {
        position: absolute;
        top: 20px;
        left: 20px;
        background: #ffa500;
        color: #fff;
        padding: 5px 15px;
        font-size: 14px;
        z-index: 2;
    }

    .post-content {
        position: relative;
        padding: 20px 0;
    }

    .post-number {
        position: absolute;
        left: 0;
        bottom: 70px;
        color: #ffa500;
        font-size: 24px;
        font-weight: bold;
    }

    .post-title {
        font-size: 18px;
        margin-bottom: 15px;
        padding-left: 40px;
    }

    .post-link a {
        display: flex;
        align-items: center;
        color: #333;
        text-decoration: none;
        font-size: 14px;
        padding-left: 40px;
    }

    .post-link .dot {
        width: 6px;
        height: 6px;
        background: #ffa500;
        border-radius: 50%;
        margin-left: 10px;
        transition: transform 0.3s ease;
    }

    .post-link a:hover .dot {
        transform: translateX(5px);
    }
</style>
@endsection