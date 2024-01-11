<form action="{{ route('shopPrixFilter')}}" class="flex flex-col text-md gap-3 py-4 border-b border-amber-700 border-opacity-20 text-fourth">
  {{-- <p class="font-semibold">Prix :</p> --}}
  @csrf
  <label for="prixRange"><input type="radio" name="prixRange" value="0-500" onchange="this.form.submit()" class="focus:ring-second text-fourth"
    @if(isset($prixRange)){{ ($prixRange == '0-500')?'checked':''}}@endif >&nbsp; 0-500 $</label>
  <label for="prixRange"><input type="radio" name="prixRange" value="500-1000" onchange="this.form.submit()" class="focus:ring-second text-fourth"
    @if(isset($prixRange)){{ ($prixRange == '500-1000')?'checked':''}}@endif >&nbsp; 500-1000 $</label>
  <label for="prixRange"><input type="radio" name="prixRange" value="1000-1500" onchange="this.form.submit()" class="focus:ring-second text-fourth"
    @if(isset($prixRange)){{ ($prixRange == '1000-1500')?'checked':''}}@endif >&nbsp; 1000-1500 $</label>
  <label for="prixRange"><input type="radio" name="prixRange" value="1500-2000" onchange="this.form.submit()" class="focus:ring-second text-fourth"
    @if(isset($prixRange)){{ ($prixRange == '1500-2000')?'checked':''}}@endif >&nbsp; 1500-2000 $</label>
  <label for="prixRange"><input type="radio" name="prixRange" value="2000+" onchange="this.form.submit()" class="focus:ring-second text-fourth"
    @if(isset($prixRange)){{ ($prixRange == '2000+')?'checked':''}}@endif >&nbsp; 2000+ $</label>

  {{-- <input type="submit" class="px-3 py-2 w-24 text-center bg-second text-third" value="Search"> --}}
</form>