<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Log;
use App\Models\gem;
use App\Models\Order;
use Stripe\Stripe;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class CartController extends Controller{

    public function index(){

        $cartItems = Cart::instance('cart')->content();

        if($cartItems->count() >= 3){
            $livraison = (float)60;
        }else{
            $livraison = (float)45;
        }

        $subtotal = (float) str_replace(',', '', Cart::instance('cart')->subtotal());
        
        $total = $subtotal + $livraison;

        return view('cart',['cartItems'=>$cartItems ],compact('livraison','total'));
    }

    public function addToCart(Request $request){

        $product = gem::find($request->id);
        Cart::instance('cart')->add($product->id,$product->name,1 ,$product->prix)->associate('App\Models\gem');

        return redirect()->back()->with('success','Item successfully added to your cart!');
    }

    public function updateCart(Request $request, $rowId){

        $cart = Cart::instance('cart');
        $item = $cart->get($rowId);
    
        if ($item) {
            $rowId = $item->rowId;
            $quantity = (int)$request->input('quantity');
            
            $cart->update($rowId, $quantity);

            return redirect()->route('cart')->with('success', 'Quantity updated successfully!');
        }
    
        return redirect()->route('cart')->with('error', 'Item not found in cart.');
    }
    

    public function deleteItem($rowId){

        $cart = Cart::instance('cart');
        $item = $cart->get($rowId);

        if ($item) {
        Cart::remove($rowId);
        return redirect()->route('cart')->with('success', 'Item successfully removed from cart!');
        }

        return redirect()->route('cart')->with('error', 'Item not found in cart.');
    }   

    public function checkout(){

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $productsCart = Cart::instance('cart')->content();

        $prixTotal = 0;

        $lineItems =[];

        foreach($productsCart as $product){

            $prixTotal += $product->price;

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                        'images' => ['images/products/'. $product->model->photo1],
                     ],
                    'unit_amount' => $product->price * 100,],
                'quantity' => $product->qty,
            ];
        }

        if(count($productsCart) >= 3){
            $livraison = 60;
        }else{
            $livraison = 45;
        }

        $lineItems[] = [

            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Delivery fee',
                ],
                'unit_amount' => $livraison * 100,
            ],
            'quantity' => 1,
        ];

         $session = \Stripe\Checkout\Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('success',[],true ) . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('cancel',[],true ),
            ]);

            // Créer la commande 
            $order = new Order();

            $order->status = 'Unpaid';
            $order->prix_total = $prixTotal;
            $order->session_id = $session->id;
            $order->save();
    
            return redirect($session->url);
        }
        
        public function success(Request $request){

            Stripe::setApiKey(env('STRIPE_SECRET'));

            $sessionId = $request->get('session_id');

            // Données de la session en fonction du session_id
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            //Détails du client ( address->country , email, name)
            $client = $session->customer_details;

            $products = $session->allLineItems($sessionId,null,null);

            $descriptions = collect($products)->pluck('description')->unique()->toArray();

            $order = Order::where('session_id', $sessionId)->first();

            if ($order->status === 'Unpaid') {
                $order->status = 'Paid';
                $order->save(); 
            }

            Cart::instance('cart')->store($client->name);

            Cart::instance('cart')->destroy();

            return view('checkout.success',compact('order','client'));

        }
        
        

    public function cancel(){

        $this->index();

        return view('cart')->with('error','Payment failed. Check your data or try again later. Contact support if you have a persistent problem. THANKS.');
    }




    // public function success(Request $request){
        
    //     \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     $sessionId = $request->get('session_id');
    //     try {
    //         $session = \Stripe\Checkout\Session::retrieve($sessionId);

    //         if(!$session){  throw new NotFoundHttpException; }
            
    //         // $client = \Stripe\Customer::retrieve($session->customer);

    //         // $order = Order::where('session_id', $session->id)->first();

    //         // if (!$order) {
    //         //     throw new NotFoundHttpException();}

    //         // if ($order->status === 'Non payé') {
    //         //     $order->status = 'Payé';
    //         //     $order->save(); }

    //         return view('checkout.success', compact('client'));

    //     } catch (\Exception $e) {
            
    //         throw new NotFoundHttpException();
    //     }
    // }
} 