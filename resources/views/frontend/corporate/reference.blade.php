@extends('frontend.layout.app')
@section('content')

<div class="page_header">
    <div class="page_header_inner">
        <div class="container">
            <div class="page_header_content d-flex align-items-center justify-content-between">
                <div class="d-flex flex-column">
                    <h1 class="heading">
                        Urban - Referanslar
                    </h1>
                    <div class="">
                        <p class="text-olive">{{config('settings.siteTitle')}}</p>
                    </div>
                </div>
                <ul class="breadcrumb d-flex align-items-center">
                    <li><a href="{{ route('home')}}">Anasayfa</a></li>
                    <li class="active">Referanslar</li>
                </ul>
            </div>
        </div>
    </div>        
</div>


    <div class="container mt-5" style="z-index: 1000;">
        <div class="row">
            @foreach($References->getMedia('gallery') as $item)
            <div class="col-md-3 mb-4 text-center">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ $item->getUrl('thumb') }}" alt="Urban ATM Kabin İmalatı" class="img-fluid black-white-img">
                    </div>
                </div>
            </div>
          @endforeach
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-5 content">
                            <h2 class="heading">{{config('settings.siteTitle')}}</h2>
                            {!! $References->desc !!}
                        </div>
                    </div>
                </div>
            </div>
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

@endsection