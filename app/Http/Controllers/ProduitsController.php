<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Produit;
use App\Http\Requests\ProduitRequest;

class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $produits= Produit::all();
        return view('produits.index', ['produits'=>$produits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProduitRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProduitRequest $request)
    {
        $produit = new Produit;
		$produit->libelle = $request->input('libelle');
		$produit->description = $request->input('description');
		$produit->stock = $request->input('stock');
		$produit->prixUnitaire = $request->input('prixUnitaire');
        $produit->save();

        return to_route('produits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.show',['produit'=>$produit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.edit',['produit'=>$produit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProduitRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProduitRequest $request, $id)
    {
        $produit = Produit::findOrFail($id);
		$produit->libelle = $request->input('libelle');
		$produit->description = $request->input('description');
		$produit->stock = $request->input('stock');
		$produit->prixUnitaire = $request->input('prixUnitaire');
        $produit->save();

        return to_route('produits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return to_route('produits.index');
    }
}
