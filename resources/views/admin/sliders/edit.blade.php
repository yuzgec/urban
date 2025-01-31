@extends('backend.layout.app')
@section('title', 'Slider Düzenle')
@section('content')
    <div class="col-12 col-md-9">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Slider Düzenle
                    </h4>
                </div>
                <div>
                    <a class="btn btn-primary btn-sm me-1" href="{{  url()->previous() }}" title="Geri">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 18v-6a3 3 0 0 0 -3 -3h-10l4 -4m0 8l-4 -4" /></svg>
                        Geri
                    </a>
                    <button class="btn btn-primary btn-sm" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                        Kaydet
                    </button>
                </div>
            </div>

            <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-form-inputfile label="Slider Resmi (Web)" name="image" :value="$slider->getFirstMediaUrl('web')"/>
                    <x-form-inputfile label="Slider Resmi (Mobil)" name="imagemobil" :value="$slider->getFirstMediaUrl('mobil')"/>

                    <div class="card mt-2" style="height: calc(24rem + 10px)">
                        <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li class="nav-item">
                                            <a href="#{{ $localeCode }}" class="nav-link @if($loop->first) active @endif" data-bs-toggle="tab">
                                                <img src="/frontend/flag/{{ $localeCode }}.svg" width="20px"> {{ $properties['native'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="tab-content">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <div class="tab-pane @if($loop->first) active @endif" id="{{ $localeCode }}">
                                        <x-form-inputtext label="Başlık" name="{{ $localeCode }}[title]" :value="$slider->translate($localeCode)->title"/>
                                        <x-form-inputtext label="Link" name="{{ $localeCode }}[link]" :value="$slider->translate($localeCode)->link"/>
                                        <x-form-inputtext label="Link Yazı" name="{{ $localeCode }}[link_text]" :value="$slider->translate($localeCode)->link_text"/>
                                        <x-form-inputtext label="Yazı 1" name="{{ $localeCode }}[text1]" :value="$slider->translate($localeCode)->text1"/>
                                        <x-form-inputtext label="Yazı 2" name="{{ $localeCode }}[text2]" :value="$slider->translate($localeCode)->text2"/>
                                        <x-form-inputtext label="Yazı 3" name="{{ $localeCode }}[text3]" :value="$slider->translate($localeCode)->text3"/>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <x-form-switch name="status" label="Durum" :value="$slider->status"/>
                            <button class="btn btn-primary btn-sm" type="submit">Kaydet</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection 