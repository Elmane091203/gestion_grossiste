<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\StockFournisseur;
use App\Http\Requests\StockFournisseurRequest;

class StockFournisseursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $stockfournisseurs= StockFournisseur::all();
        return view('stockfournisseurs.index', ['stockfournisseurs'=>$stockfournisseurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('stockfournisseurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StockFournisseurRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StockFournisseurRequest $request)
    {
        $stockfournisseur = new StockFournisseur;
		$stockfournisseur->quantite = $request->input('quantite');
		$stockfournisseur->prixUnitaire = $request->input('prixUnitaire');
        $stockfournisseur->save();

        return to_route('stockfournisseurs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $stockfournisseur = StockFournisseur::findOrFail($id);
        return view('stockfournisseurs.show',['stockfournisseur'=>$stockfournisseur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $stockfournisseur = StockFournisseur::findOrFail($id);
        return view('stockfournisseurs.edit',['stockfournisseur'=>$stockfournisseur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StockFournisseurRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StockFournisseurRequest $request, $id)
    {
        $stockfournisseur = StockFournisseur::findOrFail($id);
		$stockfournisseur->quantite = $request->input('quantite');
		$stockfournisseur->prixUnitaire = $request->input('prixUnitaire');
        $stockfournisseur->save();

        return to_route('stockfournisseurs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $stockfournisseur = StockFournisseur::findOrFail($id);
        $stockfournisseur->delete();

        return to_route('stockfournisseurs.index');
    }
}
