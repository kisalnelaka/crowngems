<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gem;

class ShopController extends Controller
{
    //Je vais les regrouper tous dans une seule fonction

        //Catégorie
        public function sortCategory(Request $request){
                
            if($request ->has('typeGem')){
                $typeGem = $request->typeGem;

                $gems = gem::where('type', $typeGem)
                ->paginate(24);

                return view('shop',compact('gems','typeGem'));
            }

            return redirect()->back();
        }

         //Prix : selection + entrer fourchette 
         public function sortPrix(Request $request){
                if($request->has('prixRange')){
                $prixRange = $request->prixRange;

                switch ($prixRange) {
                    case '0-500':
                        $gems = gem::where('prix', '<=', 500)->where('prix', '>=', 0)->orderBy('prix','asc');
                        break;
                    case '500-1000':
                        $gems = gem::where('prix', '<=', 1000)->where('prix', '>=', 500)->orderBy('prix','asc');
                        break;
                    case '1000-1500':
                        $gems = gem::where('prix', '<=', 1500)->where('prix', '>=', 1000)->orderBy('prix','asc');
                        break;
                    case '1500-2000':
                        $gems = gem::where('prix', '<=', 2000)->where('prix', '>=', 1500)->orderBy('prix','asc');
                        break;
                    case '2000+':
                        $gems = gem::where('prix', '>=', 2000)->orderBy('prix','asc');
                        break;
                    default:
                        return redirect()->back();
                }

                $gems = $gems->paginate(12);
        
                return view('shop', compact('gems', 'prixRange'));
            }
            return redirect()->back();
        }
        

        public function sortPrixRange(Request $request){

            $prixMin = $request->input('prixMin');
            $prixMax = $request->input('prixMax');
        
            if ($prixMin && $prixMax) {
                $gems = gem::where('prix', '>=', $prixMin)
                               ->where('prix', '<=', $prixMax)
                               ->orderBy('prix','asc')
                               ->paginate(12);
                return view('shop', compact('gems', 'prixMin', 'prixMax'));
                
            } elseif ($prixMin) {
                $gems = gem::where('prix', '>=', $prixMin)
                                ->orderBy('prix','asc')
                               ->paginate(12);
                return view('shop', compact('gems', 'prixMin'));
                
            } elseif ($prixMax) {
                $gems = gem::where('prix', '<=', $prixMax)
                                ->orderBy('prix','asc')
                                ->paginate(12);
                return view('shop', compact('gems', 'prixMax'));
                
            }
        
            return redirect()->back();
        }
        
        //Appends
}
