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

<section class="blog bg-dark-100">
    <div class="container">
        <div class="row">
            @foreach ($Blog as $item)
            <div class="col-lg-4 col-md-6">
                <div class="blog_post mb-0">
                    <img src="{{ $item->getFirstMediaUrl('thumb') }}" alt="{{ $item->title }}">
                    <div class="blog_content">                                    
                        <h2 class="post-count">01</h2>
                        <div class="meta">
                            <time class="text-olive" datetime="{{ $item->created_at }}">{{ $item->created_at }}</time>
                        </div>
                        <h5><a href="{{ route('blogdetail', $item->slug) }}" class="text-white">{{ $item->title }}</a></h5>
                        <p>{{ $item->short }}</p>
                        <div class="details_link">
                            <a href="{{ route('blogdetail', $item->slug) }}">
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
            @endforeach
        </div>
    </div>
</section>

@endsection