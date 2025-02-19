@extends('frontend.layout.app')

@section('content')
    
<div class="page_header" dir="ltr">
    <div class="page_header_inner">
        <div class="container">
            <div class="page_header_content d-flex align-items-center justify-content-between">
                <div class="d-flex flex-column">
                    <h1 class="heading">
                        {{ __('site.iletisim_baslik') }}
                    </h1>
                    <div class="">
                        <p class="text-olive">{{config('settings.siteTitle')}}</p>
                    </div>
                </div>
                <ul class="breadcrumb d-flex align-items-center">
                    <li><a href="{{ route('home')}}">{{ __('site.anasayfa') }}</a></li>
                    <li class="active">{{ __('site.iletisim') }}</li>
                </ul>
            </div>
        </div>
    </div>        
</div>

<section class="gmap box_padding">
    <div class="gmapbox" data-aos="zoom-in" data-aos-duration="1000">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28653.133940389314!2d29.182552965088853!3d40.986085554313114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cad1a49508589d%3A0xf0fe26369aa4998a!2sUrban%20Reklam!5e0!3m2!1str!2str!4v1738293257064!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<section class="contact_us bg-dark-200">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5" data-aos="fade-right" data-aos-duration="1000">
                <div class="section-header">
                    <h1 class="text-white text-uppercase mb-4">{{ __('site.iletisim') }}</h1>
                    <p class="gray-600">{{ __('site.iletisim_page_text_1') }}</p>
                        <p class="gray-600">{{ __('site.iletisim_page_text_2') }}</p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                <div class="home_contact">
                    <form action="contact.php" method="POST">
                        <input class="form-control form-control-lg" name="name" id="name" type="text" placeholder="{{ __('site.adsoyad') }}" required >
                        <input class="form-control form-control-lg" name="phone" id="phone" type="number" placeholder="{{ __('site.telefon') }}">
                        <input class="form-control form-control-lg" name="email" id="email" type="email" placeholder="{{ __('site.email') }}">
                        <textarea class="form-control pt-4" name="message" id="message" placeholder="{{ __('site.mesaj') }}" rows="3"></textarea>
                        <div class="btn_group">
                            <button type="submit" class="btn olive">{{ __('site.gonder') }}</button>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Section Grid Lines -->
    <ul class="grid_lines d-none d-md-flex justify-content-between">
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
    </ul>
</section>
@endsection