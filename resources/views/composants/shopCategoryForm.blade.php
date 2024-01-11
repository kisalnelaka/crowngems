<form action="{{ route('shopCategoryFilter')}}" class="flex flex-col gap-2 py-4 border-b border-amber-700 border-opacity-20 text-fourth">
  {{-- <p class="font-semibold">Catégorie :</p> --}}
  @csrf  

  <a href="{{ route('gemstones')}}">
  <input type="radio" name="touslesproduits">&nbsp; All products</a>
  
  <label for="typeBijou">
    <input type="radio" name="typeBijou" value="Anneau"
     onchange="this.form.submit()" class="focus:ring-second text-fourth"
    @if(isset($typeBijou)) {{ ($typeBijou == 'CatsEye')?'checked' : ''}} @endif
     >&nbsp; Cat'sEye</label>

  <label for="typeBijou">
    <input type="radio" name="typeBijou" value="Collier"
     onchange="this.form.submit()" class="focus:ring-second text-fourth"
    @if(isset($typeBijou)) {{ ($typeBijou == 'Garnet')?'checked' : ''}} @endif
     >&nbsp; Garnet</label>

  <label for="typeBijou">
    <input type="radio" name="typeBijou" value="Bracelet"
     onchange="this.form.submit()" class="focus:ring-second text-fourth"
    @if(isset($typeBijou)) {{ ($typeBijou == 'sapphire')?'checked' : ''}} @endif
     >&nbsp; Sapphire</label>

    <label for="typeBijou">
    <input type="radio" name="typeBijou" value="Boucles oreilles"
      onchange="this.form.submit()" class="focus:ring-second text-fourth"
    @if(isset($typeBijou)) {{ ($typeBijou == 'Opel')?'checked' : ''}} @endif
      >&nbsp; Opel</label>

  {{-- <input type="submit" class="px-3 py-2 w-24 text-center bg-second text-third" value="Search"> --}}
  
</form>