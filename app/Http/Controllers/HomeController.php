<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Blog;
use App\Models\Form;
use App\Models\Page;
use App\Models\Service;
use App\Models\Attribute;
use App\Models\Video;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Mail;
use CyrildeWit\EloquentViewable\Support\Period;

class HomeController extends Controller
{

    public function index(){
        $About = Page::where('id',1)->first();
        $Gallery = Page::where('id',2)->first();
        return view('frontend.index',compact('About','Gallery'));
    }

    public function preregistration(){
        return view('frontend.page.preregistration');
    }
    
    public function contact(){
        return view('frontend.contact');
    }

    public function corporatedetail($slug){
        $Detay = Page::where('slug', $slug)->firstOrFail();
        views($Detay)->cooldown(60)->record();

        return view('frontend.page.index', compact('Detay'));

    }

    public function services(){
        $All = Service::where('category', 1)->get();
        return view('frontend.service.index',compact('All'));
    }

    public function service($slug){
        $Detay = Service::where('category', 1)->where('slug', $slug)->firstOrFail();
        views($Detay)->cooldown(60)->record();

        $Format = substr($Detay->getFirstMediaUrl('cover'), -3);
        return view('frontend.service.detail', compact('Detay', 'Format'));
    }

    public function studios(){
        $All = Service::where('category', 2)->get();
        return view('frontend.studio.index',compact('All'));
    }

    public function studio($slug){
        $Detay = Service::where('category', 2)->where('slug', $slug)->firstOrFail();
        views($Detay)->cooldown(60)->record();

        return view('frontend.studio.detail', compact('Detay'));
    }

    public function events(){
        $All = Blog::where('category', 3)->get();
        return view('frontend.event.index',compact('All'));
    }

    public function event($slug){
        $Detay = Blog::where('category', 3)->where('slug', $slug)->firstOrFail();
        views($Detay)->cooldown(60)->record();

        return view('frontend.event.detail', compact('Detay'));
    }

    public function team(){
        $All = Service::where('category', 4)->get();
        return view('frontend.page.team', compact('All'));
    }

    public function dancer($slug){
        $Detay = Service::where('category', 4)->where('slug', $slug)->firstOrFail();
        return view('frontend.page.dancer', compact('Detay'));
    }

    public function production($slug){
        $Detay = Service::where('category', 9)->where('slug', $slug)->firstOrFail();
        return view('frontend.page.dancer', compact('Detay'));
    }

    public function management(){
        $All = Service::where('category', 8)->get();
        return view('frontend.page.management', compact('All'));
    }

    public function projectdetail($slug){
        $Detay = Service::where('slug', $slug)->firstOrFail();
        return view('frontend.project.detail', compact('Detay'));
    }

    public function form(ContactRequest $request){
        $New = new Form;
        $New->name =  $request->name;
        $New->email =  $request->email;
        $New->phone =  $request->phone;
        $New->subject =  $request->subject;
        $New->message =  $request->message;
        $New->save();

        return redirect()->route('home');
    }

}
