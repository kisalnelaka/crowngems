@extends('admin.layout')

@section('content')

  <div>

    <p class="text-lg max-md:text-md text-cyan-900 p-3 mt-2">Liste des gems</p>
    
    {{-- Recherche --}}

    <div class="overflow-x-auto border border-slate-400 rounded-lg py-1 m-2">
      <table class="table md:table-sm max-md:table-xs md:px-1">

        <thead class="text-lightBlue">
          <tr class="border-b-slate-300">
            <th class="max-md:hidden text-center  ">Photo</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Type</th>
            <th>Qte Stock</th>
            <th class="max-md:hidden text-center p-1">Collection</th>
            <th class="max-md:hidden text-center p-1">Métal</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody >

          @foreach($gems as $gem)
            <tr class="border-b-slate-300 hover:bg-sky-100">
              <td class="max-md:hidden"><div class="avatar"><div class="mask h-8 w-8"><img src="{{ asset('images/products/'.$gem->photo1) }}" alt="gem image"/></div></div></td>
              <td> {{ $gem->nom }} </td>
              <td> {{ $gem->prix }} $</td>
              <td> {{ $gem->type }} </td>
              <td> {{ $gem->qte_stock}} </td>
              <td class="max-md:hidden text-center"> {{ $gem->collection}} </td>
              <td class="max-md:hidden text-center"> {{ $gem->type_metal}} </td>
              <td class="text-center"><a href=""><i class="ri-settings-2-line text-cyan-900 text-2xl"></i></a></td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>

    <div class="mt-4 p-4">
      {{$gems->links()}}
    </div>

  </div>

@endsection