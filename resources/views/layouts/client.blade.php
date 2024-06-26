<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/components/logo/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/components/logo/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/components/logo/favicon-16x16.png') }}">

  <title>CrownGems</title>

  <!-- Tailwind & Fonts -->
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')

  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.css" rel="stylesheet">

</head>
<body class="overflow-x-hidden antialiased font-swap">

    {{-- Banner --}}
  {{-- <div class="w-full text-center p-2 max-md:hidden bg-fourthDarker text-white font-lora font-bold">
    <a href="{{ route('gemstones') }}">
      <p class="text-sm animate-translate">Welcome to CrownGems!</p>
    </a>
  </div> --}}

  <!-- Navbar -->
  <div class="w-full font-lora bg-fourth border-b border-fourth">
    <nav class="cabin flex justify-between px-6 py-3 max-w-5xl mx-auto text-first">

      <div class="flex items-left">
        <a href="{{ route('home')}}" class="flex">
          <p class="font-cormorant text-4xl text-semibold">CrownGems</p>
        </a>
      </div>
  
      <div class="flex gap-10 items-center max-md:hidden">
        {{-- <a href="{{ route('home') }}" class="text-md cursor-pointer hover:translate-x-2 transition-transform duration-300 ease-in-out">Home</a> --}}
        <a href="{{ route('gemstones') }}" class="text-md cursor-pointer">Gemstones</a>
        <a href="#" class="text-md cursor-pointer">Gem Cutting</a>
        <a href="#" class="text-md cursor-pointer">Gem Mining</a>
        <a href="{{ route('about-us') }}" class="text-md cursor-pointer">About Us</a>
      </div>
    

      <div class="flex items-right">

        <div class="indicator mx-4">
          <a href="{{ route('cart')}}">
            @if( Cart::instance('cart')->content()->count() > 0)
            <span class="indicator-item badge badge-secondary h-3 p-2">
              {{ Cart::instance('cart')->content()->count() }} </span> 
              @endif
              <img src="{{ asset('images/components/logo/cart.png')}}" alt="cart" srcset="" class="w-6 h-auto">
            </a>
        </div>
        {{-- hover:translate-x-1  transition-transform duration-300 ease-in-out --}}
        @auth
        <a href="{{ route('dashboard')}}"><i class="ri-user-fill text-2xl px-4 "></i></a>
        @else
        <a href="{{ route('login') }}"><i class="ri-user-fill text-2xl px-4 "></i></a>
        @endauth



        <div class="dropdown dropdown-bottom dropdown-end md:hidden text-fourth">
          <label tabindex="0"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="150px" height="150px" class="w-8 h-8 ml-3 fill-first">
            <path d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z"/></svg></label>
          <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-second rounded-box w-48">
            <li><a href="/" class="text-base" >Home</a></li>
            <li><a href="/gemstones" class="text-base" >Gemstones</a></li>
            <li><a href="/about-us" class="text-base">About Us</a></li>
            @auth
            <li><a href="/dashboard" class="text-base bg-emerald-200">Client area</a></li>
            @else
            <li><a href="{{ route('login') }}" class="text-base" >Login</a></li>
            {{-- <li><a href="{{ route('register') }}" class="text-base" >Register</a></li> --}}
            @endauth
          </ul>
        </div>

        {{-- <a href="{{ route('register') }}" class=" pl-5 pr-3 max-md:hidden">Register</a> --}}

      </div>


    </nav>
  </div>

  <!-- Contenu -->
  @yield('content')
  
  <!-- Footer -->
  <footer class="w-full border-t border-second bg-third font-martel">
    <div class="grid lg:grid-cols-5 md:grid-cols-2 max-md:grid-cols-1 max-lg:text-center max-w-7xl mx-auto max-md:p-3 md:gap-4 max-md:gap-2 md:p-6">

      <!-- Email -->
      <div class="lg:col-span-2 max-lg:col-span-1 p-4">
        <p class="text-xl font-semibold font-playfair text-fourth">Join our NewsLetter</p>
        <p class="py-4 text-sm text-fourth">Subscribing to CrownGems allows you to stay up to date with the latest news and updates.</p>
        <div class="flex max-lg:justify-center font-playfair">

          {{-- <form action="{{ route('Newsletter')}}" method="POST"> --}}
            {{-- @csrf --}}
            <input type="email" name="email" placeholder="Email" class="rounded-l-full max-md:w-36 py-2 appearance-none">
            <input type="submit" value="Submit" class="rounded-r-full py-2 px-5 bg-second text-fourth hover:bg-secondDarker hover:text-fourth transition ">
          {{-- </form> --}}
        </div>  
      </div>
    
      <div class="flex flex-col font-semibold text-fourth">
        <p class="text-fourth text-xl py-2 font-playfair">Shop</p>
        <div class="flex flex-col justify-evenly gap-2 text-sm p-2 text-fourth">
            <a href="{{ route('shopCategoryFilter',['typeGem' =>'boucles oreilles'])}}">Opels</a>
            <a href="{{ route('shopCategoryFilter',['typeGem' =>'Anneau'])}}">Cat's Eye</a>
            <a href="{{ route('shopCategoryFilter',['typeGem' =>'Bracelet'])}}">Sapphires</a>
        </div>
      </div>
    
      <div class="flex flex-col font-semibold text-fourth">
        <p class="text-fourth text-xl py-2 font-playfair">Who we are</p>
        <div class="flex flex-col justify-evenly gap-2 text-sm p-2">
          <a href="{{ route('about-us')}}">About Us</a>
        </div>
      </div>
    
      <div class="flex flex-col font-semibold text-fourth">
        <p class="text-fourth text-xl py-2 font-playfair">Contact Us</p>
        <div class="flex flex-col justify-evenly gap-2 text-sm p-2">
          <a href="mailto:info@crowngemspvt.com">info@crowngemspvt.com</a>
          <a href="tel:+447747624040">+44 774 762 4040</a>
          <a href="tel:+94770858829">+94 770 858 829</a>

        </div>
      </div>
    
    </div>
    
    {{-- <div class="grid lg:grid-cols-5 md:grid-cols-2 max-md:grid-cols-1 max-lg:text-center max-w-7xl mx-auto max-md:p-3 text-first md:gap-4 max-md:gap-2 md:p-6">
  
      <!-- Email -->
      <div class="lg:col-span-2 max-lg:col-span-1 p-4">
        <p class="text-xl font-semibold">Join our email list</p>
        <p class="py-4">Subscribing to Jewels allows you to stay updated on the latest trends and designs in the jewelry industry.</p>
        <div class="flex max-lg:justify-center">
          <input type="email" name="" id="" placeholder="Email" class="rounded-l-full max-md:w-36 py-2 appearence-none">
          <input type="submit" value="Send" class="rounded-r-full py-2 px-5 bg-second text-third">
        </div>  
      </div>
  
      <div class="flex flex-col">
        <p class="text-second text-xl py-2">Shop</p>
        <div class="flex flex-col justify-evenly">
          <a href="">Collections</a>
          <a href="">Rings</a>
          <a href="">Bracelets</a>
          <a href="">Chains</a>
          <a href="">Wedding Rings</a>
        </div>
      </div>
  
      <div class="flex flex-col">
        <p class="text-second text-xl py-2">About</p>
        <div class="flex flex-col justify-evenly">
          <a href="">About us</a>
          <a href="">Contact</a>
          <a href="">Privacy Policy</a>
          <a href="">FAQ's</a>
        </div>
      </div>
  
      <div class="flex flex-col">
        <p class="text-second text-xl py-2">Our Contacts</p>
        <div class="flex flex-col justify-evenly">
          <a href="mailto:arhri.salah@gmail.com">arhri.salah@gmail.com</a>
          <a href="">+212611223344</a>
        </div>
      </div>
  
    </div> --}}
  </footer>

</body>
</html>