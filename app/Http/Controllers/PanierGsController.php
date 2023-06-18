<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\PanierG;
use App\Http\Requests\PanierGRequest;

class PanierGsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $paniergs= PanierG::all();
        return view('paniergs.index', ['paniergs'=>$paniergs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('paniergs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PanierGRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PanierGRequest $request)
    {
        $panierg = new PanierG;
		$panierg->quantite = $request->input('quantite');
		$panierg->etatG = $request->input('etatG');
		$panierg->etatF = $request->input('etatF');
        $panierg->save();

        return to_route('paniergs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $panierg = PanierG::findOrFail($id);
        return view('paniergs.show',['panierg'=>$panierg]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $panierg = PanierG::findOrFail($id);
        return view('paniergs.edit',['panierg'=>$panierg]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PanierGRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PanierGRequest $request, $id)
    {
        $panierg = PanierG::findOrFail($id);
		$panierg->quantite = $request->input('quantite');
		$panierg->etatG = $request->input('etatG');
		$panierg->etatF = $request->input('etatF');
        $panierg->save();

        return to_route('paniergs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $panierg = PanierG::findOrFail($id);
        $panierg->delete();

        return to_route('paniergs.index');
    }
}
