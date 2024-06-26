@extends('layouts.client')

@section('content')
<div class="w-full bg-third">

  <div class="h-72 max-sm:h-60 max-w-7xl mx-auto bg-cover bg-center" style="background-image:url({{asset('images/components/gems-cart.jpg')}});">
    <div class="h-full w-full bg-gray-950 bg-opacity-60">
      <div class="flex items-center justify-center h-full pt-36">
        <p class="text-3xl text-white font-playfair font-semibold">Your Cart</p>
      </div>
    </div>
  </div>

    <!-- Alerts succes ou refus -->
    @if(session('success'))
      <div class="alert alert-success max-w-xl mx-auto my-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>{{ session('success') }}</span>
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-error max-w-xl mx-auto my-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>{{ session('error') }}</span>
      </div>
    @endif

  @if ($cartItems->count() > 0)

    <div class="mx-auto sm:px-8 sm:py-14 max-sm:py-6 max-w-6xl flex sm:flex-row max-sm:flex-col font-dmsans">

          {{-- Section Product --}}
        <div class="wrapper sm:mx-4 sm:w-2/3 max-sm:w-full">
          <p class="text-xl font-semibold p-4">Your Cart ({{ $cartItems->count() }})</p>

          @foreach ($cartItems as $item)
              <div class="flex flex-row max-sm:flex-col items-center p-1 border-b border-second border-opacity-40 max-sm:gap-3 max-sm:mx-12">
                  {{-- Photo --}}
                  <div class="sm:w-1/4">
                    <img src="{{ asset('images/products/' . $item->model->photo1) }}" alt="{{ $item->model->photo1 }}" class="sm:w-40 max-sm:w-52 aspect-square object-cover shadow border border-amber-800 border-opacity-40">
                  </div>
                  {{-- Infos du Product --}}
                  <div class="sm:w-3/4 max-sm:text-center sm:p-2 max-sm:py-2 items-center">
                    <p class="text-lg text-fourth font-semibold">{{ $item->name }}</p>
                    <p class="text-sm mt-2 italic text-fourth pl-1">Price : {{ $item->price }} $</p>
                    <p class="text-sm mb-2 italic text-fourth pl-1">Qte : {{ $item->qty}}</p>
                    <p class="text mb-2">Total : {{ $item->subtotal()}} $</p>

                  {{-- Options --}}
                  <div class="w-fit mx-auto flex flex-row gap-3 items-center pt-3">
                    {{-- Modifier Quantité --}}
                    <form method="post" action="{{ route('updateCart', $item->rowId) }}">
                      @csrf
                      <input type="hidden" name="_method" value="put">
                      <div class="flex flex-row gap-2 items-center">
                        <input type="number" name="quantity" min="1" value="{{ $item->qty }}" class="w-10 h-fit py-1 [appearance:textfield]">
                        <button type="submit" class="md:px-3 p-2 bg-second hover:bg-secondDarker transition shadow rounded text-xs text-fourth">Modify</button>
                      </div>
                    </form> 

                    {{-- Supprimer Product --}}
                    <form method="post" action="{{ route('retirerCart', $item->rowId) }}">
                      @csrf
                      @method('delete')
                      <button type="submit" class="md:px-3 p-2 bg-red-600 hover:bg-red-700 transition bg-opacity-80 shadow rounded text-xs text-fourth">DELETE&nbsp;&#11199</button>
                    </form>
                  </div>

                  </div>

              </div>
          @endforeach
        </div>

        {{-- Récapitulatif --}}
        <div class="min-w-64 w-1/3 p-4  max-sm:w-full max-sm:text-center 
          border-r border-l border-b border-opacity-70 border-second font-dmsans">

          <p class="font-bold mb-8 text-xl text-fourth">Summary :</p>

          <div class="flex flex-col gap-16">
            <div class="grid grid-cols-2">

              @foreach ($cartItems as $item)
              <p class="text-left text-fourth">{{ $item->model->type }} x {{ $item->qty }}</p> 
              <p class="text-right text-fourth">{{ $item->price }} $ x {{ $item->qty }}</p>
              @endforeach

              <p class="text-left text-fourth mt-3"> Delivery<i class="text-sm text-fourth"> / Pays : $</i> </p> 
              <p class="text-right text-fourth mt-3">{{ $livraison }} $</p>

              <p class="text-left text-fourth text-lg mt-3">Total : </p> 
              <p class="text-right text-fourth text-lg mt-3">{{ $total }} $</p>
            </div>

            <form action="{{route('checkout')}}" method="POST">
              @csrf
              <button class="w-full mx-auto px-4 py-2 text-center bg-softGreen hover:bg-softGreenDarker transition shadow-lg rounded-lg text-white">
                Pay online(via Stripe)</button>
            </form>
          </div>
        </div>
          


    </div>

  @else
  
  <div class="max-w-4xl  mx-auto md:py-7  font-playfair">
    <p class="py-5 text-center text-fourth md:text-xl text-lg">Your cart is empty at the moment.<br> Find what suits you by visiting our selection.</p>
    <p class="py-5 max-sm:p-2 text-fourth font-semibold underline md:text-2xl max-md:text-lg">Our selections:</p>

    <div class="flex max-md:flex-col items-center gap-2 p-4 text-xl">

      {{-- Onglet Anneaux --}}
        <div class="relative w-1/3 flex flex-col bg-cover bg-center h-full aspect-square max-md:w-3/4" 
          style="background-image:url({{ asset('images/products/ring2.jpg') }})">

            <div class="w-full h-full bg-stone-800 bg-opacity-40 hover:bg-opacity-10 transition">
              <a href="{{ route('shopCategoryFilter',['typeGem' =>'Anneau'])}}" class="h-full w-full absolute"></a></div>
            <p class="absolute top-3/4 w-full text-center text-white">Sapphires</p>
        </div>

      {{-- Onglet Colliers --}}
        <div class="relative w-1/3 flex flex-col bg-cover bg-center h-full aspect-square max-md:w-3/4" 
          style="background-image:url({{ asset('images/products/necklace2.jpg') }})">

            <div class="w-full h-full bg-stone-800 bg-opacity-40 hover:bg-opacity-10 transition">
              <a href="{{ route('shopCategoryFilter',['typeGem' =>'Collier'])}}"  class="h-full w-full absolute"></a></div>
            <p class="absolute top-3/4 w-full text-center text-white">Opels</p>
        </div>

      {{-- Onglet Bracelets --}}
        <div class="relative w-1/3 flex flex-col bg-cover bg-center h-full aspect-square max-md:w-3/4" 
        style="background-image:url({{ asset('images/products/bracelet2.jpg') }})">

          <div class="w-full h-full bg-stone-800 bg-opacity-40 hover:bg-opacity-10 transition">
            <a href="{{ route('shopCategoryFilter',['typeGem' =>'Bracelet'])}}" class="h-full w-full absolute"></a></div>
          <p class="absolute top-3/4 w-full text-center text-white">Garnets</p>
        </div>

        {{-- Onglet Bracelets --}}
        <div class="relative w-1/3 flex flex-col bg-cover bg-center h-full aspect-square max-md:w-3/4" 
        style="background-image:url({{ asset('images/products/boucles2.jpg') }})">

          <div class="w-full h-full bg-stone-800 bg-opacity-40 hover:bg-opacity-10 transition">
            <a href="{{ route('shopCategoryFilter',['typeGem' =>'Boucles oreilles'])}}" class="h-full w-full absolute"></a></div>
          <p class="absolute top-3/4 w-full text-center text-white">Cat's Eyes</p>
        </div>

    </div>
  </div>
    
@endif

</div>
@endsection

