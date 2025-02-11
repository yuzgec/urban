<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Features;
use App\Models\PageCategory;
use App\Models\ProductCategory;
use App\Models\ServiceCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewShareProvider extends ServiceProvider
{

    public function boot()
    {

       
            Paginator::useBootstrap();
            config()->set('settings', Setting::pluck('value','item')->all());
            $Pages = Page::with('getCategory')->where('category', 1)->get();
            $Blog = Blog::with('getCategory','media')->get();
            $References = Page::with('media')->where('id', 5)->first();
            $Service = Service::with('getCategory', 'media')->get();
            $ProductCategory = ProductCategory::with('cat')->where('parent_id', null)->get();
            $Product = Product::with(['getCategory'])->where('status', '=', 1)->get();
            $ServiceCategory = ServiceCategory::where('parent_id', null)->get();

            View::share([
                'Pages' => $Pages,
                'Service' => $Service,
                'ProductCategory' => $ProductCategory,
                'Product' => $Product,
                'ServiceCategory' => $ServiceCategory,
                'References' => $References,
                'Blog' => $Blog,
            ]);
       
    }
}
