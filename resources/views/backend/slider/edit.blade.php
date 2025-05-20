@extends('backend.layout.app')
@section('title', 'Slider Düzenle')
@section('content')

    <div class="col-12 col-md-9">
        <div class="card">
            {{Form::model($Edit, ["route" => ["slider.update", $Edit->id],'enctype' => 'multipart/form-data'])}}

                <div class="card-header d-flex justify-content-between">
                    <x-add title="Slider"></x-add>
                    <div>
                        <x-back></x-back>
                        <x-save></x-save>
                    </div>
                </div>

                <ul class="nav nav-tabs" data-bs-toggle="tabs">

                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    <li class="nav-item">
                        <a href="#{{ $localeCode }}" class="nav-link" data-bs-toggle="tab">
                            <img src="/frontend/flag/{{ $localeCode }}.svg" width="20px"><span  style="margin-left:10px">{{ $properties['native'] }}</span>
                        </a>
                    </li>
                    @endforeach

                    <li class="nav-item ms-auto">
                        <a href="#tabs-settings-7" class="nav-link" title="Settings" data-bs-toggle="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </a>
                    </li>
                </ul>

                <div class="card-body">
                    <div class="tab-content">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                            <div class="tab-pane @if ($loop->first) show active @endif" id="{{ $localeCode }}">
                                <div class="text-center mb-2">
                                    <img src="/frontend/flag/{{ $localeCode }}.svg" width="20px"><span  style="margin-left:10px">{{ $properties['native'] }} dili ilgili ayarları yapıyorsunuz.</span>
                                </div>
                                <x-form-inputtext label="Slider Adı Giriniz" name="title:{{ $localeCode }}"/>
                                <x-form-inputtext label="Link Adı Giriniz" name="link:{{ $localeCode }}"/>
                                <x-form-inputtext label="Link Text Giriniz" name="link_text:{{ $localeCode }}"/>
                                <x-form-inputtext label="Alan 1 Giriniz" name="text1:{{ $localeCode }}"/>
                                <x-form-inputtext label="Alan 2 Giriniz" name="text2:{{ $localeCode }}"/>
                                <x-form-inputtext label="Alan 3 Giriniz" name="text3:{{ $localeCode }}"/>
                            </div>
                        @endforeach
                    </div>

            </div>

        </div>
    </div>

    <div class="col-12 col-md-3">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="15" y1="8" x2="15.01" y2="8" /><rect x="4" y="4" width="16" height="16" rx="3" /><path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5" /><path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2" /></svg>
                    Slider Resim
                </h4>
            </div>

            <div class="p-2">
                <div class="card-body justify-content-center align-items-center">
                    <div class="col">
                        <img src="{{ $Edit->getFirstMediaUrl('page', 'thumb')}}" class="img-fluid mb-2 mt-2" >
                    </div>
                <x-form-file label="" name="image"></x-form-file>
            </div>
            </div>
        </div>

    </div>
    {{Form::close()}}
@endsection

@section('customJS')
    @include('backend.layout.ck')

@endsection
