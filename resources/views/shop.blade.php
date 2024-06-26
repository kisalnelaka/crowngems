@extends('layouts.client')

{{-- i'll clean things later  --}}
@section('content')

<div class="w-full font-dmsans font-swap bg-third">

  <div class="max-w-7xl mx-auto md:h-60 max-md:h-48 bg-cover bg-center" style="background-image:url({{ asset('images/components/bg-hero.jpg')}});">
    <div class="h-full w-full bg-amber-950 bg-opacity-30">
      <div class="flex items-center justify-center h-full md:pt-36 max-md:pt-24">
        <p class="md:text-4xl max-md:text-3xl text-fourth font-cormorant font-bold">Gemstones</p>
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


  <div class="max-w-7xl mx-auto grid lg:grid-cols-4 md:grid-cols-3 justify-center gap-4 p-4">

    {{-- Tri --}}
    <div class="w-60 text-sm flex flex-col dm-sans p-2 max-md:mx-auto">
      <p class="text-2xl font-bold font-playfair mb-3 underline-offset-4 underline text-fourth ">Filter By</p>

      <div x-data="{open1:false}" class="py-1">

        <button @click="open1 =! open1" class="text-xl font-bold font-playfair text-fourth">
          <div class="flex gap-2 justify-between">
            <p>Category</p>
            <div class="">
                <i x-show="!open1" class="ri-arrow-down-s-fill text-2xl"></i>
                <i x-show="open1" class="ri-arrow-up-s-fill"></i>
            </div>
        </div>
        
        </button>

        <div x-show="open1" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">

          @include('components/shopCategoryForm')
        </div>
      </div>

      <div x-data="{open2:false}" class="py-1">

        <button @click="open2 =! open2" class="text-xl font-bold font-playfair text-fourth">
          <div class="flex gap-2">
            <p>Price</p>
            <i x-show="!open2" class="ri-arrow-down-s-fill text-2xl"></i>
            <i x-show="open2" class="ri-arrow-up-s-fill"></i>
          </div>
        </button>

        <div x-show="open2" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">

          @include('components/shopPriceForm')
        </div>

      </div>

      <div x-data="{open3:false}" class="py-1">

        <button @click="open3 =! open3" class="text-xl font-bold font-playfair text-fourth">
          <div class="flex gap-2">
            <p>Price Range</p>
            <i x-show="!open3" class="ri-arrow-down-s-fill text-2xl"></i>
            <i x-show="open3" class="ri-arrow-up-s-fill"></i>
          </div>
        </button>

        <div x-show="open3" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">

          @include('components/shopPriceRangeForm')
        </div>
      </div>

    </div>

    <div class="lg:col-span-3 md:col-span-2">

      <div class="flex
       {{-- max-sm:flex-col max-sm:gap-2 --}}
        items-center p-3">
        <p class=" font-bold text-fourth">{{ $gems->total()}} Item(s) Found</p>

        {{-- <form action="shopOrder" method="post" >
          <label for="order" class="text-sm">Trier par :</label>
          <select name="order" class="focus:ring-second text-sm border-second focus:border-second" >
            <option value="prixAsc">Prix (Croissant)</option>
            <option value="prixDesc">Prix (Décroissant)</option>
          </select>
        </form> --}}

      </div>


      {{-- Products --}}
      <div class="grid lg:grid-cols-4 md:grid-cols-3 max-md:grid-cols-2 items-center gap-2">

        @foreach ($gems as $gem)
    
          <a href="{{ route('gem',[ 'slug' => $gem->slug]) }}">

            <div class="flex flex-col place-items-center relative shadow-lg rounded-2xl">
              <img src="{{ asset('images/products/'. $gem->photo1 )}}" loading="lazy" alt="img gem database" class="w-full h-auto aspect-square object-cover object-center rounded-t-xl absolute hover:opacity-0 transition-all">
              <img src="{{ asset('images/products/'. $gem->photo2 )}}" loading="lazy" alt="img gem hover" class="w-full h-auto aspect-square object-cover object-center rounded-t-xl">
              <div class="flex flex-col sm:text-sm max-sm:text-xs text-center border-t border-second w-full p-1">
                <p class="truncate font-semibold">{{ $gem->name }}</p>
                <p class="text-xs"> {{ $gem->type_metal }}</p> 
                <p class="font-semibold text-fourth" >{{ $gem->prix }} $</p>
              </div>
            </div>

          </a>
        @endforeach
      </div>

      <div class="mx-auto justify-center md:p-4 max-md:p-2">
        {{$gems->withQueryString()->links()}}
      </div>

    </div>

  </div>
</div>

@endsection

      


  {{-- <div class="grid grid-cols-2 max-md:grid-cols-1 justify-center gap-4 max-w-5xl p-4">

    @foreach($gems as $gem)
      <div class="font-dmsans text-sm p-2 border border-second rounded">
        <p> {{ $gem->name }} / {{ $gem->id }}</p>
        <p class="font-semibold"> {{ $gem->type }} </p>
        <p> {{ $gem->type_metal }} </p>
        <p> {{ $gem->prix }} $</p>
      </div>
    @endforeach
  </div> --}}