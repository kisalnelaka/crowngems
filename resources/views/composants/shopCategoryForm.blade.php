<form action="{{ route('shopCategoryFilter')}}" class="flex flex-col gap-2 py-4 border-b border-amber-700 border-opacity-20 text-fourth">
  {{-- <p class="font-semibold">Catégorie :</p> --}}
  @csrf  

  <a href="{{ route('gemstones')}}">
  <input type="radio" name="touslesproduits">&nbsp; All products</a>
  
  <label for="typeGem">
    <input type="radio" name="typeGem" value="Anneau"
     onchange="this.form.submit()" class="focus:ring-second text-fourth"
    @if(isset($typeGem)) {{ ($typeGem == 'CatsEye')?'checked' : ''}} @endif
     >&nbsp; Cat'sEye</label>

  <label for="typeGem">
    <input type="radio" name="typeGem" value="Collier"
     onchange="this.form.submit()" class="focus:ring-second text-fourth"
    @if(isset($typeGem)) {{ ($typeGem == 'Garnet')?'checked' : ''}} @endif
     >&nbsp; Garnet</label>

  <label for="typeGem">
    <input type="radio" name="typeGem" value="Bracelet"
     onchange="this.form.submit()" class="focus:ring-second text-fourth"
    @if(isset($typeGem)) {{ ($typeGem == 'sapphire')?'checked' : ''}} @endif
     >&nbsp; Sapphire</label>

    <label for="typeGem">
    <input type="radio" name="typeGem" value="Boucles oreilles"
      onchange="this.form.submit()" class="focus:ring-second text-fourth"
    @if(isset($typeGem)) {{ ($typeGem == 'Opel')?'checked' : ''}} @endif
      >&nbsp; Opel</label>

  {{-- <input type="submit" class="px-3 py-2 w-24 text-center bg-second text-third" value="Search"> --}}
  
</form>