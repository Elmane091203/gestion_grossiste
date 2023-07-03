<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paniers = array();
        $produits = Produit::where('stock', '>', 2)->take(5)->get();
        if (Auth::user() != null) {
            $paniers = Panier::where('user_id', Auth::user()->id)->get();
        }
        $produits2 = Produit::where('stock', '>', 2)->orderBy('id', 'desc')->take(5)->get();
        return view('home', compact(["produits", "produits2", "paniers"]));
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
        $panier = Panier::where('user_id', $request->input('user_id'))->where('produit_id', $request->input('produit_id'));
        if (!($panier->exists())) {
            $panier = new Panier;
            $panier->user_id = $request->input('user_id');
            $panier->produit_id = $request->input('produit_id');
        } else {
            $panier =$panier->first();
            $panier->quantite = $panier->quantite+ 1;
        }
        $panier->save();

        return to_route('acceuil');
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
    public function destroy($id)
    {
        $panier = Panier::findOrFail($id);
        $panier->delete();

        return to_route('acceuil');
    }

    public function categorie($categorie)
    {
        $produits = Produit::where('categorie', $categorie)->get();
        return view('categories.' . $categorie, compact("produits"));
    }
}
