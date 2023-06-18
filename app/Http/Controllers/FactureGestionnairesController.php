<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\FactureGestionnaire;
use App\Http\Requests\FactureGestionnaireRequest;

class FactureGestionnairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $facturegestionnaires= FactureGestionnaire::all();
        return view('facturegestionnaires.index', ['facturegestionnaires'=>$facturegestionnaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('facturegestionnaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FactureGestionnaireRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FactureGestionnaireRequest $request)
    {
        $facturegestionnaire = new FactureGestionnaire;
		$facturegestionnaire->commande_gestionnaire_id = $request->input('commande_gestionnaire_id');
        $facturegestionnaire->save();

        return to_route('facturegestionnaires.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $facturegestionnaire = FactureGestionnaire::findOrFail($id);
        return view('facturegestionnaires.show',['facturegestionnaire'=>$facturegestionnaire]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $facturegestionnaire = FactureGestionnaire::findOrFail($id);
        return view('facturegestionnaires.edit',['facturegestionnaire'=>$facturegestionnaire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FactureGestionnaireRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FactureGestionnaireRequest $request, $id)
    {
        $facturegestionnaire = FactureGestionnaire::findOrFail($id);
		$facturegestionnaire->commande_gestionnaire_id = $request->input('commande_gestionnaire_id');
        $facturegestionnaire->save();

        return to_route('facturegestionnaires.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $facturegestionnaire = FactureGestionnaire::findOrFail($id);
        $facturegestionnaire->delete();

        return to_route('facturegestionnaires.index');
    }
}
