<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Blog;
use App\Models\Form;
use App\Models\Page;
use App\Models\Service;
use App\Models\Video;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index(){

        $About = Page::where('id',1)->first();
        return view('frontend.index',compact('About'));
    }

    public function syllabus(){
        return view('frontend.page.syllabus');
    }

    public function preregistration(){
        return view('frontend.page.preregistration');
    }
    
    public function contact(){
        return view('frontend.contact');
    }

    public function corporatedetail($slug){
        $Detay = Page::where('slug', $slug)->firstOrFail();
        return view('frontend.page.index', compact('Detay'));

    }

    public function services(){
        $All = Service::where('category', 1)->get();
        return view('frontend.service.index',compact('All'));
    }


    public function service($slug){
        $Detay = Service::where('category', 1)->where('slug', $slug)->firstOrFail();
        return view('frontend.service.detail', compact('Detay'));
    }


    public function studios(){
        $All = Service::where('category', 2)->get();
        return view('frontend.studio.index',compact('All'));
    }

    public function studio($slug){
        $Detay = Service::where('category', 2)->where('slug', $slug)->firstOrFail();
        return view('frontend.studio.detail', compact('Detay'));
    }

    public function campaigns(){
        $All = Service::where('category', 3)->get();
        return view('frontend.service.campaigns',compact('All'));
    }

    public function campaign($slug){
        $Detay = Service::where('category', 3)->where('slug', $slug)->firstOrFail();
        return view('frontend.service.campaign', compact('Detay'));
    }

    public function project(){
        return view('frontend.project.index');
    }

    public function hr(){
        return view('frontend.page.hr');
    }


    public function team(){
        $All = Service::where('category', 4)->get();
        return view('frontend.page.team', compact('All'));
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

        Mail::send("mail.form",compact('New'),function ($message) use($New) {
            $message->to('info@riobaski.com')->subject($New->name.' - Site Bilgi Formu');
        });

        return redirect()->route('home');
    }

}
