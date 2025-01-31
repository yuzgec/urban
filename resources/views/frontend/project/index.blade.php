@extends('frontend.layout.app')
@section('content')
<div class="page_header">
    <div class="page_header_inner">
        <div class="container">
            <div class="page_header_content d-flex align-items-center justify-content-between">
                <div class="d-flex flex-column">
                    <h1 class="heading">
                        Urban Kabin - Projeler
                    </h1>
                    <div class="">
                        <p class="text-olive">{{config('settings.siteTitle')}}</p>
                    </div>
                </div>
                <ul class="breadcrumb d-flex align-items-center">
                    <li><a href="{{ route('home')}}">Anasayfa</a></li>
                    <li class="active">İletişim</li>
                </ul>
            </div>
        </div>
    </div>        
</div>
<div class="container" style="margin-top: 100px;margin-bottom: 100px;">
    <div class="row">
      
    </div>
</div>
@endsection