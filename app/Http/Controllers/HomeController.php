<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Pivot;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Service;
use App\Models\LanguageLine;
use Illuminate\Http\Request;
use App\Services\MediaService;
use App\Models\ProductCategory;
use App\Models\ServiceCategory;
use Artesaos\SEOTools\Facades\SEOMeta;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HomeController extends Controller
{
    public function index(){


        $Slider = Slider::orderBy('rank')->get();
        $Index = Page::where('id', 10)->first();

        SEOMeta::setTitle('WC Kabin - Otomat İmalatı');
        SEOMeta::setDescription('Urban Kabin ATM kabini, WC Kabin, Otomatik kabin ve diğer kabin imalatlarını yapmaktadır. Lütfen iletişime geçiniz.');
        SEOMeta::setCanonical(url()->full());
        
        $Hakkimizda = Page::where('id', '=',1)->first();
        $Services = Service::where('status', 1)->take(5)->orderBy('rank')->get();

        // Her servis için resim sayılarını hesapla
        $imageCounts = [];
        foreach($Services as $service) {
            $count = Media::query()
                ->where('collection_name', 'gallery')
                ->whereHasMorph(
                    'model',
                    [Service::class],
                    function ($query) use ($service) {
                        $query->whereHas('translations', function($q) use ($service) {
                            $q->where('slug', $service->slug);
                        });
                    }
                )->count();
            
            $imageCounts[$service->slug] = $count;
        }

        $mediaService = new MediaService();
        
        // Default olarak ID=1 olan servisin resimlerini getir
        $defaultService = Service::find(1);
        $galleryImages = Media::query()
            ->where('collection_name', 'gallery')
            ->whereHasMorph(
                'model',
                [Service::class],
                function ($query) {
                    $query->where('id', 1)->where('status', 1);
                }
            )
            ->with('model.translations')
            ->orderBy('order_column')
            ->get()
            ->sortBy(function ($media) {
                return $media->getCustomProperty('orientation') === 'horizontal' ? 1 : 0;
            });

        return view('frontend.index', compact('Hakkimizda', 'galleryImages', 'Services', 'imageCounts', 'defaultService', 'Slider', 'Index'));
    }

    public function categorydetail($url)
    {
        $Detay = ServiceCategory::whereHas('translations', function ($query) use ($url) {
            $query->where('slug', $url);
        })->first();

        views($Detay)->cooldown(60)->record();

        $Product = Service::where('category',$Detay->id)->get();

        SEOMeta::setTitle($Detay->title);
        SEOMeta::setCanonical(url()->full());
        return view('frontend.service.category', compact('Detay', 'Product'));
    }

    public function corporatedetail($url)
    {
        $Detay = Page::whereHas('translations', function ($query) use ($url) {
            $query->where('slug', $url);
        })->first();

        views($Detay)->cooldown(60)->record();
        SEOMeta::setTitle($Detay->title);
        SEOMeta::setCanonical(url()->full());
        return view('frontend.corporate.detail', compact('Detay'));
    }

    public function servicedetail($url)
    {
        $Detay = Service::whereHas('translations', function ($query) use ($url) {
            $query->where('slug', $url);
        })->first();

        // Slider için horizontal resimler (max 5)
        $horizontalImages = Media::query()
            ->where('collection_name', 'gallery')
            ->whereHasMorph(
                'model',
                [Service::class],
                function ($query) use ($Detay) {
                    $query->where('id', $Detay->id);
                }
            )
            ->whereJsonContains('custom_properties->orientation', 'horizontal')
            ->take(5)
            ->get();

        // Tüm resimler
        $allImages = Media::query()
            ->where('collection_name', 'gallery')
            ->whereHasMorph(
                'model',
                [Service::class],
                function ($query) use ($Detay) {
                    $query->where('id', $Detay->id);
                }
            )
            ->get();

        views($Detay)->cooldown(60)->record();
        SEOMeta::setTitle($Detay->title);
        SEOMeta::setCanonical(url()->full());
        
        return view('frontend.service.detail', compact('Detay', 'horizontalImages', 'allImages'));
    }


    public function service()
    {
        $Service = Service::all();
        SEOMeta::setTitle('Urban Kabin - Hizmetlerimiz');
        SEOMeta::setCanonical(url()->full());
        return view('frontend.service.index', compact('Service'));
    }



    public function project(){

        $Project = Service::where('category', 3 )->get();

        return view('frontend.project.index',compact('Project'));
    }

    public function productdetail($url)
    {
        $Detay = Product::whereHas('translations', function ($query) use ($url) {
            $query->where('slug', $url);
        })->first();

        views($Detay)->cooldown(60)->record();


        SEOMeta::setTitle($Detay->title);
        SEOMeta::setCanonical(url()->full());
        return view('frontend.product.index', compact('Detay'));
    }

    public function partdetail($url)
    {
        $Detay = Product::whereHas('translations', function ($query) use ($url) {
            $query->where('slug', $url);
        })->first();

        views($Detay)->cooldown(60)->record();
        SEOMeta::setTitle($Detay->title);
        SEOMeta::setCanonical(url()->full());
        return view('frontend.product.index', compact('Detay'));
    }

    public function gallery(){

        return view('frontend.gallery.index');
    }

    public function contactus(){

        SEOMeta::setTitle('İletişim');
        SEOMeta::setCanonical(url()->full());
        return view('frontend.corporate.contactus');

    }

    public function reference(){

        $Reference = Page::where('id', 5 )->first();
        SEOMeta::setTitle('Referanslarımız');
        SEOMeta::setCanonical(url()->full());
        return view('frontend.corporate.reference', compact('Reference'));

    }

    public function blog(){
        $Blog = Blog::all();
        SEOMeta::setTitle('Blog');
        SEOMeta::setCanonical(url()->full());
        return view('frontend.blog.index',compact('Blog'));
    }


    public function video(){
        return view('frontend.gallery.video');
    }

    public function foto(){
        return view('frontend.gallery.foto');
    }

    public function blogdetail($slug){

        $Detay = Blog::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->first();

        SEOMeta::setTitle($Detay->title);
        SEOMeta::setCanonical(url()->full());


        return view('frontend.blog.detail',compact('Detay'));
    }
    
    public function document(){

        $Reference = Page::where('id', 6 )->first();
        SEOMeta::setTitle('Belgelerimiz');
        SEOMeta::setCanonical(url()->full());
        return view('frontend.corporate.document', compact('Reference'));

    }

    public function getServiceGallery($slug = null)
    {
        // Önce resim sayısını hesapla
        $count = Media::query()
            ->where('collection_name', 'gallery')
            ->whereHasMorph(
                'model',
                [Service::class],
                function ($query) use ($slug) {
                    $query->where('status', 1);
                    if ($slug) {
                        $query->whereHas('translations', function($q) use ($slug) {
                            $q->where('slug', $slug);
                        });
                    }
                }
            )->count();

        // Resimleri getir
        $query = Media::query()
            ->where('collection_name', 'gallery')
            ->whereHasMorph(
                'model',
                [Service::class],
                function ($query) use ($slug) {
                    $query->where('status', 1);
                    if ($slug) {
                        $query->whereHas('translations', function($q) use ($slug) {
                            $q->where('slug', $slug);
                        });
                    }
                }
            )
            ->with('model.translations')
            ->orderBy('order_column');

        $images = $query->get()
            ->sortBy(function ($media) {
                return $media->getCustomProperty('orientation') === 'horizontal' ? 1 : 0;
            });

        return response()->json([
            'html' => view('frontend.partials.gallery-items', compact('images'))->render(),
            'count' => $count
        ]);
    }

}
