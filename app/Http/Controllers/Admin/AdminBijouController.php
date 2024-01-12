<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\gem;
use Illuminate\Http\Request;

class AdminGemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gems=gem::paginate(12);
        return view('admin.gems.index',compact('gems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(gem $gem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(gem $gem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, gem $gem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(gem $gem)
    {
        //
    }

        /*
    //Admin seulement
    public function create()
    {
        return view('products.create');
    }

    //Admin seulement
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'collection' => 'required',
            'photo1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prix' => 'required|numeric',
            'qte_stock' => 'required|integer',

        ]);

        //Unique Slug setup pour lien :
        $slug = Str::slug($data['name'] . '-' . $data['type'] . '-' . $data['collection']);
        $count = 1;
        while (JewelryProduct::where('slug', $slug)->exists()) {
            $slug = Str::slug($data['name'] . '-' . $data['type'] . '-' . $data['collection'] . '-' . $count++);
        }
        $data['slug'] = $slug;

        // Upload des photos :
        if ($request->hasFile('photo1')) {
            $photo = $request->file('photo1');
            $data['photo1'] = $photo->store('products', 'public');
        }
        if ($request->hasFile('photo2')) {
            $photo = $request->file('photo2');
            $data['photo2'] = $photo->store('products', 'public');
        }

        JewelryProduct::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Product créé avec succès.');
    }*/
}
