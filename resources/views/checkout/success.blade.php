@extends('layouts.client')

@section('content')

<div class="w-full bg-third md:py-24 p-2">

    <div class="max-w-7xl mx-auto bg-white bg-opacity-50 rounded-xl border border-secondDarker">

        {{-- Remerciements --}}
        <div class="flex flex-col text-center gap-8 p-8 pb-0">
            <h3 class="text-3xl font-semibold font-playfair">Thank you for your purchase,  {{ $client->name }}! </h3>
            <p class="font-dmsans">
                We would like to sincerely thank you for your recent purchase on our site. It is a pleasure to count you among our customers.</p>
        </div>
    
        <div class="grid grid-cols-3 max-md:grid-cols-1 justify-center place-items-center gap-8 ">
    
            <div class="font-dmsans p-4 md:px-8 flex flex-col gap-4 max-md:text-center md:col-span-2">
                <p >Your order has been handled with care, and we are preparing it for shipping. As soon as your order is ready to ship, we will send you a confirmation email to this email: <b class="text-softGreen underline">{{$client->email}}</b> avec tous les détails d'expédition.</p>
                <p class="">If you have any questions or concerns, please do not hesitate to contact us. We are here to help you!</p>
                <p class="">Thank you again for your trust.</p>
                <p class="mt-8 text-secondDarker font-playfair">Sincerely,</p>
                <p class="italic text-secondDarker font-playfair">CrownGems</p>
    
            </div>

            <img src="{{asset('images/components/confirm.png')}}" loading="lazy" alt="" srcset="" 
            class="object-center object-cover">
    
        </div>

        {{-- <div class="p-4">

            <h4 class="p-2">Articles achetées :</h4>
            <div class="max-w-4xl mx-auto grid grid-cols-2 max-md:grid-cols-1 gap-2">

                @foreach($products as $product)
                    <div class="p-4 border border-second bg-white bg-opacity-50">
                        <p>{{ $product->description }}</p>
                        <p>{{ $product->quantity }}</p>
                        <p>{{ number_format($product->price->unit_amount / 100,2,',','.') }}&nbsp; <b class="uppercase">{{ $product->price->currency }}</b></p>
                    </div>
                @endforeach 

            </div>
            
        </div> --}}

        <div class="flex flex-row max-sm:flex-col max-sm:text-center max-sm:gap-4 max-sm:w-full justify-between p-8">
            <a href="{{ route('home') }}" class=><button class="py-2 px-4 bg-second text-white font-dmsans rounded shadow-lg ">Back to Home</button></a>
            <a href="{{ route('gemstones') }}" class=><button class="py-2 px-4 bg-rose-500 text-white font-dmsans rounded shadow-lg ">Shop More!</button></a>
        </div>


    </div>



</div>


@endsection

