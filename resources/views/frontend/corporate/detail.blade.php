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

<div class="container my-5 pt-4" style="z-index: 1000;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="content">
                        {!! $Detay->desc !!}
                    </div>

                    <div class="text-center mt-5 mb-5">
                        <a href="{{ route('home') }}">
                            <img src="/{{ config('settings.siteLogo')}}" alt="{{ config('settings.siteTitle')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
@section('customJS')
<script src="/frontend/plugins/fancybox/jquery.fancybox.min.js"></script>
<script src="/frontend/plugins/fancybox/fancybox-init.js"></script>
@endsection