<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gem;

class GemController extends Controller
{
    public function index(){
        
        //Tous les products 
        $gems = gem::Paginate(24);
        return view('shop', compact('gems'));
    }

    public function show($slug){

        //Product avec similaires selon collection
        $gem = gem::where('slug', $slug)->first();

        if (!$gem) { abort(404); }

        $gemsSimilaires = gem::where('collection' , $gem->collection )
        ->where( 'id' , '!=', $gem->id)
        ->limit(8)
        ->get();
        return view('product', compact('gem','gemsSimilaires'));
    }


}

