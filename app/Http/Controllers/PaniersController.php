<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Panier;
use App\Http\Requests\PanierRequest;

class PaniersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $paniers= Panier::all();
        return view('paniers.index', ['paniers'=>$paniers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('paniers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PanierRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PanierRequest $request)
    {
        $panier = new Panier;
		$panier->quantite = $request->input('quantite');
		$panier->etatC = $request->input('etatC');
		$panier->etatG = $request->input('etatG');
        $panier->save();

        return to_route('paniers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $panier = Panier::findOrFail($id);
        return view('paniers.show',['panier'=>$panier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $panier = Panier::findOrFail($id);
        return view('paniers.edit',['panier'=>$panier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PanierRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PanierRequest $request, $id)
    {
        $panier = Panier::findOrFail($id);
		$panier->quantite = $request->input('quantite');
		$panier->etatC = $request->input('etatC');
		$panier->etatG = $request->input('etatG');
        $panier->save();

        return to_route('paniers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $panier = Panier::findOrFail($id);
        $panier->delete();

        return to_route('paniers.index');
    }
}
