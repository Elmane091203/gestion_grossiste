<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\CommandeGestionnaire;
use App\Http\Requests\CommandeGestionnaireRequest;

class CommandeGestionnairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $commandegestionnaires= CommandeGestionnaire::all();
        return view('commandegestionnaires.index', ['commandegestionnaires'=>$commandegestionnaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('commandegestionnaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CommandeGestionnaireRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommandeGestionnaireRequest $request)
    {
        $commandegestionnaire = new CommandeGestionnaire;
		$commandegestionnaire->panierG_id = $request->input('panierG_id');
		$commandegestionnaire->user_id = $request->input('user_id');
        $commandegestionnaire->save();

        return to_route('commandegestionnaires.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $commandegestionnaire = CommandeGestionnaire::findOrFail($id);
        return view('commandegestionnaires.show',['commandegestionnaire'=>$commandegestionnaire]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $commandegestionnaire = CommandeGestionnaire::findOrFail($id);
        return view('commandegestionnaires.edit',['commandegestionnaire'=>$commandegestionnaire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CommandeGestionnaireRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CommandeGestionnaireRequest $request, $id)
    {
        $commandegestionnaire = CommandeGestionnaire::findOrFail($id);
		$commandegestionnaire->panierG_id = $request->input('panierG_id');
		$commandegestionnaire->user_id = $request->input('user_id');
        $commandegestionnaire->save();

        return to_route('commandegestionnaires.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $commandegestionnaire = CommandeGestionnaire::findOrFail($id);
        $commandegestionnaire->delete();

        return to_route('commandegestionnaires.index');
    }
}
