<?php

use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GemController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
//Admin
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminGemController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/welcome', function () { return view('welcome');     })
    ->name('welcome');
Route::get('/about-us', function () { return view('about-us');     })
    ->name('about-us');

//Display de gems
Route::get('/', function(){ return view('accueil'); })->name('accueil');
Route::get('/gemstones', [GemController::class, 'index'])->name('gemstones');
Route::get('/gems/{slug}', [GemController::class,'show'])->name('gem');

//Newsletter
// Route::post('/newsletter', [NewsletterController::class, 'newsletter_email'])->name('Newsletter');


//Sorting & Filter 
Route::get('/gemstones/byCategory',[ShopController::class,'sortCategory'])->name('shopCategoryFilter');
Route::get('/gemstones/byPrix',[ShopController::class,'sortPrix'])->name('shopPrixFilter');
Route::get('/gemstones/byPrixRange',[ShopController::class,'sortPrixRange'])->name('shopPrixRangeFilter');
Route::get('/gemstones/Order',[ShopController::class,''])->name('shopSortingOrder');

//Panier
Route::get('/panier',[PanierController::class,'index'])->name('panier');
Route::post('/panier-add',[PanierController::class,'addToCart'])->name('ajouterProduitPanier');
Route::put('/panier-update/{rowId}',[PanierController::class,'updateCart'])->name('updatePanier');
Route::delete('/panier-delete/{rowId}',[PanierController::class,'deleteItem'])->name('retirerPanier');

//Paiement 
Route::post('/checkout',[PanierController::class,'checkout'])->name('checkout');
Route::get('/success',[PanierController::class,'success'])->name('success');
Route::get('/cancel',[PanierController::class,'cancel'])->name('cancel');

//Profil :
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Espace Admin (à revoir ) 
Route::middleware('admin.check')->group(function () {
      Route::get('/admin/dashboard', function () {
          return view('admin.dashboard');
      })->name('admin.dashboard');
  });

Route::get('/dashboard', [Controller::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

//Administration
Route::group(['prefix'=>'admin','middleware'=>'admin.check'],function(){
    Route::resource('utilisateurs', AdminUserController::class);
    Route::resource('gems', AdminGemController::class);
});

Route::prefix('admin')->group(  function(){
    Route::get('utilisateurs',[ AdminUserController::class,'index'])->name('admin.utilisateurs.index');
    Route::get('gems',[ AdminGemController::class,'index'])->name('admin.gems.index');
});

require __DIR__.'/auth.php';
