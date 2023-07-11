<?php

namespace App\Http\Controllers;

use App\Events\ProduitSupprimer;
use App\Models\CommandeClient;
use App\Models\CommandeGestionnaire;
use App\Models\Panier;
use Illuminate\Http\Request;

class GestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandeClients = CommandeClient::all();
        $commandeGestionnaires = CommandeGestionnaire::all();
        return view('gestionnaire.index', compact(['commandeClients', 'commandeGestionnaires']));
    }

    public function commandeClient()
    {
        $paniers = Panier::where('etatC', '=', 1, 'and')->where('etatG', '=', 0)->get();
        return view('client.commande', compact('paniers'));
    }
    public function commandeClientA($action, $id)
    {
        $panier = Panier::find($id);
        if ($action == 'Valider') {
            $panier->etatG = 1;
            $panier->save();
            return view('client.factureClient');
        } else {
            $panier->delete();
            event(new ProduitSupprimer('hem'));
        }
        return redirect()->route('gestionnaire.client');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
