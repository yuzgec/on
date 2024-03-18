<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewShareProvider extends ServiceProvider
{

    public function boot()
    {

        // $Pages = Cache::remember('pages',now()->addYear(1), function () {
        //     return Page::with('getCategory')->get();
        // });

        // $Service = Cache::remember('service',now()->addYear(1), function () {
        //     return Service::orderBy('rank', 'asc')->get();
        // });

        // $Blog = Cache::remember('blog',now()->addYear(1), function () {
        //     return Blog::all();
        // });

        $Pages = Page::with('getCategory')->get();
        $Service = Service::orderBy('rank', 'asc')->get();
        $Blog = Blog::all();
     
        View::share([
            'Pages' => $Pages,
            'Service' => $Service,
            'Blog' => $Blog,
        ]);
    }
}
