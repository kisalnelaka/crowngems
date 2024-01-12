@extends('layouts.client')

@section('content')

    <!-- First part -->
    <div class="w-full bg-third">
      <div class="font-cormorant grid md:grid-cols-2 max-md:grid-cols-1 justify-center align-center max-w-7xl mx-auto text-first lg:py-8">
        <div class="flex flex-col p-8 justify-evenly">
          <p class="md:text-4xl max-md:text-2xl font-semibold py-4">Your one-stop destination for unique and exquisite Gemstones.</p>
          <p class=" text-md py-0 font-lora text-first">
            Here we offer different types of gemstones! We have something for everyone.</p>
          <a href="{{route('gemstones')}}" class="bg-fourth text-first text-lg text-center py-3 px-6 w-fit rounded-l-full my-4 font-semibold hover:bg-fourthDarker hover:text-white transition">
            Discover the collection</a>
        </div>
      
        <div class="flex items-center">
          <img src="{{ asset('images/composants/DSC9792.jpg')}}"
            alt="landing image" srcset="" class="object-cover align-center">
        </div>
      </div>
    </div>
    
    <!-- Second part -->
    <div class="font-lora w-full bg-white text-fourth py-6">
      <p class="text-center text-2xl p-4">
        Our Collection</p>
  
      <div class="grid md:grid-cols-3 max-md:grid-cols-1 max-w-4xl mx-auto justify-between gap-12 md:py-6 max-md:items-center text-lg font-semibold">
        
        <div class="relative aspect-square max-md:max-w-xs mx-auto">
          <img class="object-cover w-full h-full" src="{{ asset('images/composants/landing-earrings.png')}}" alt="landing earrings" srcset="">
          <a href="{{ route('shopCategoryFilter',['typeGem' =>'boucles oreilles'])}}" 
            class="absolute top-3/4 left-0 bg-third hover:bg-fourth transition text-fourth hover:text-white text-center p-2 w-48 rounded-r-full shadow-xl my-4">Topaz</a>
        </div>
        
        <div class="relative aspect-square max-md:max-w-xs mx-auto">
          <img class="object-cover w-full h-full" src="{{ asset('images/composants/landing-necklace.png')}}" alt="landing necklace" srcset="">
          <a href="{{ route('shopCategoryFilter',['typeGem' =>'Collier'])}}" 
            class="absolute top-3/4 left-0 bg-third hover:bg-fourth transition text-fourth hover:text-white text-center p-2 w-48 rounded-r-full shadow-xl my-4">Cat's Eye</a>
        </div>
        
        <div class="relative aspect-square max-md:max-w-xs mx-auto">
          <img class="object-cover w-full h-full" src="{{ asset('images/composants/landing-ring.png')}}" alt="landing ring" srcset="">
          <a href="{{ route('shopCategoryFilter',['typeGem' =>'Anneau'])}}" 
            class="absolute top-3/4 left-0 bg-third hover:bg-fourth transition text-fourth hover:text-white text-center p-2 w-48 rounded-r-full shadow-xl my-4">Opels</a>
        </div>
      </div>
    </div>
  
    <!-- Third part -->
    <div class="font-lora w-full bg-third">
     <div class="flex flex-col justify-evenly md:py-16 md:px-6 max-md:p-8 max-w-4xl mx-auto  text-center text-fourth">
      <p class="text-2xl font-semibold md:pb-12 max-md:pb-6">
        A Gemstone is a woman's best friend!
      </p>
      <p class="font-lora ">
        A gemstone is a timeless symbol of beauty and friendship, making it the perfect gift for any woman. It's often said that gemstones are a woman's best friend, and that makes sense.
        Not only does a gemstone represent unwavering loyalty and devotion, but it is also a symbol of luxury, glamor and class. A gemstone tells the world that you are proud of your loved one and want to give her only the best.
      </p>
     </div>
    </div> 

    <!-- Jewels -->
    <div class="w-full bg-white">
      <div class="max-w-7xl mx-auto grid grid-cols-4 max-md:grid-cols-2 max-sm:grid-cols-1 place-items-center">


      </div>
    </div>

    <!-- Fourth part -->
    <div class="w-full bg-fourth text-third border-t border-secondDarker">
      <div class="max-w-7xl mx-auto grid grid-cols-2 max-md:grid-cols-1 md:gap-4 place-items-center p-4">

        <img src="{{ asset('images/composants/landing-4women.png')}}" alt="4women" class="object-cover object-center max-md:h-96 w-auto md:p-6 max-md:p-4">

        <div class="flex flex-col gap-4 max-md:text-center justify-center p-4">

          <h4 class="font-lora text-2xl font-bold">About us</h4>
          <p class="font-lora px-2">Crown Gems is an -Sri Lankan/UK joint venture engaged in responsible gem mining/cutting and ethical gem dealing.We offer our customers high-quality sapphire and ruby, as well as a wide range of other gemstones. Our focus is on full traceability, so that our customers know exactly where their gemstones originate.
            We cover the entire gemstone supply chain from mining rough gem material, through the cutting and polishing of gemstones, right up to the sale of fully-traceable gems to the end customer, both wholesale and retail.
            Our stones are responsibly sourced from our own small-scale mining operations or through our trusted network of other mine owners. By dealing directly at source, not only can we guarantee the integrity of the supply chain, we can also offer the most competitive prices.</p>

        </div>

      </div>

    </div>

    <!-- Fifth part -->

     {{-- Ancien page d'accueil --}}
    {{-- <div class="w-full h-largeHeight bg-top bg-no-repeat bg-cover" style="background-image:url({{ asset('images/composants/landing-md.jpg') }})">
      <div class="w-full h-full relative">

        <div class="absolute left-10 md:top-1/2 md:right-2/3 p-4  max-md:top-3/4 max-md:left-1/2">
          <p class="text-3xl text-whiteBeige font-serif max-md:text-xl">Des gemteries exquices près de vous</p>
        </div>

        <div class="w-full h-full bg-slate-800 bg-opacity-30"></div>
      </div>
    </div> --}}

@endsection

