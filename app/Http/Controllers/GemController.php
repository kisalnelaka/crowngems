<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gem;

class GemController extends Controller
{
    public function index(){
        
        //Tous les produits 
        $gems = gem::Paginate(24);
        return view('shop', compact('gems'));
    }

    public function show($slug){

        //Produit avec similaires selon collection
        $gem = gem::where('slug', $slug)->first();

        if (!$gem) { abort(404); }

        $gemsSimilaires = gem::where('collection' , $gem->collection )
        ->where( 'id' , '!=', $gem->id)
        ->limit(8)
        ->get();
        return view('produit', compact('gem','gemsSimilaires'));
    }


}

