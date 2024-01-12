@extends('layouts.client')

@section('content')
    <div class="w-full bg-third pt-3">

        <!-- Alerts succes ou refus -->
        @if(session('success'))
          <div class="alert alert-success max-w-xl mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
              <span>{{ session('success') }}</span>
          </div>
        @endif
        @if(session('error'))
          <div class="alert alert-error max-w-xl mx-auto">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{ session('error') }}</span>
          </div>
        @endif

        <div class="max-w-7xl mx-auto grid lg:grid-cols-3 md:grid-cols-2 max-md:grid-cols-1 gap-3">

          {{-- Medium/Big screen --}}
          <div class="grid lg:col-span-2 max-md:col-span-1 lg:grid-cols-2 md:grid-cols-1 gap-3 max-md:hidden p-4">
            
            <div><img src="{{ asset('images/products/' . $gem->photo1) }}" 
              alt="Photo 1" class="w-full max-w-sm aspect-square object-cover shadow-lg">
            </div>
            <div><img src="{{ asset('images/products/' . $gem->photo2) }}" 
              alt="Photo 2" class="w-full max-w-sm aspect-square object-cover shadow-lg">
            </div>
          </div>

          {{-- Mobile screen --}}
          <div class="carousel max-w-sm mx-auto aspect-square object-cover md:hidden max-md:visible shadow-lg">

            <div id="slide1" class="carousel-item relative w-full">
                <img src="{{ asset('images/products/' . $gem->photo1) }}" class="w-full" />
                <div class="absolute flex justify-between transform -translate-y-1/2 right-5 top-1/2">
                    <a href="#slide2" class="btn btn-circle text-fourth">❯</a>
                </div>
              </div> 
              <div id="slide2" class="carousel-item relative w-full">
                <img src="{{ asset('images/products/' . $gem->photo2) }}" class="w-full" />
                  <div class="absolute flex justify-between transform -translate-y-1/2 left-5 top-1/2">
                      <a href="#slide1" class="btn btn-circle text-fourth">❮</a> 
                  </div>
              </div> 
          </div>

          {{-- Description et Ajout au cart --}}
          <div class="flex flex-col font-playfair p-4 max-md:w-96 max-md:mx-auto max-md:items-center">

            <h2 class="text-2xl font-bold text-fourth">{{ $gem->name }}</h2>
            <p class="font-dmsans font-semibold pt-4 text-fourth">{{ $gem->prix }} $</p>

            <div class="bg-second hover:bg-amber-700 transition text-fourth w-fit flex items-center font-dmsans text-center  my-4">

                <form id="ajouterCart" action="{{ route('ajouterProductCart') }}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{ $gem->id }}">
                  <input type="hidden" name="quantity" id="qty" value="1">

                  <button type="submit" class="py-2 px-5 text-lg flex align-center justify-center">
                    <i class="ri-shopping-bag-fill mr-3 text-xl"></i>
                    Add to Cart</button>
                </form>
            </div>

            <p class="text-xl font-bold p-4 text-fourth">Description</p>
            <p class="font-dmsans text-fourth">Type : {{ $gem->collection }}</p>
            <p class="font-dmsans text-fourth">Country : {{ $gem->type_metal }}</p>
            <p class="font-dmsans pt-2 pb-4 max-sm:text-center text-fourth">{{ $gem->description }}</p>
          </div>

        </div>

        <div class="max-w-5xl mx-auto p-4">
          <p class="text-2xl font-semibold text-fourth font-playfair py-2">Other suggestions</p>
          <div class="grid md:grid-cols-4 max-md:grid-cols-2 items-center gap-2 p-2">
            
            @foreach ($gemsSimilaires as $gemSimilaire)
            
            <a href="{{ route('gem',[ 'slug' => $gemSimilaire->slug]) }}">
              
              <div class="flex flex-col place-items-center relative shadow border border-second">
                <img src="{{ asset('images/products/'. $gemSimilaire->photo1 )}}" loading="lazy" alt="img gem database" class="w-full h-auto aspect-square object-cover object-center absolute hover:opacity-0 transition-all">
                <img src="{{ asset('images/products/'. $gemSimilaire->photo2 )}}" loading="lazy" alt="img gem hover" class="w-full h-auto aspect-square object-cover object-center">
                <div class="flex flex-col sm:text-sm max-sm:text-xs text-center border-t border-second w-full p-1">
                  <p class="truncate font-semibold text-fourth">{{ $gemSimilaire->name }}</p>
                  <p class="text-xs text-fourth"> {{ $gemSimilaire->type_metal }}</p> 
                  <p class="font-semibold text-amber-800" >{{ $gemSimilaire->prix }} $</p>
                </div>
              </div>
              
            </a>
            @endforeach
          </div>
        </div>
    </div>
@endsection