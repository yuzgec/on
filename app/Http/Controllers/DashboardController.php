<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Search;
use App\Models\Product;
use Carbon\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index(){

        //dd(Product::all());

        $Search = Search::select('key')->whereBetween('created_at', [Carbon::yesterday(),Carbon::today()])->paginate(10);

        $chart_options = [
            'chart_title' => 'Sipariş Raporu',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\ShopCart',
            'group_by_field' => 'created_at',
            'group_by_period' => 'week',
            'chart_type' => 'bar',
            'column_class'   => 'col-md-8',

        ];
        $Chart = new LaravelChart($chart_options);
        $PopularPages = Product::orderByViews('desc')->take(10)->get();

        //dd($PopularPages);

        return view('backend.index', compact('Search', 'Chart', 'PopularPages'));
    }

    public function formlar(){
        $All = Form::orderBy('created_at','desc')->get();
        return view('backend.form.index', compact('All'));
    }

    public function formDelete($id){

        $Delete = Form::findOrFail($id);
        $Delete->delete();

        alert()->success('Başarıyla Silindi','Form mesajı başarıyla Silindi');
        return redirect()->route('form');
    }



}
