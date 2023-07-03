<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\PanierG;
use App\Models\Produit;
use App\Models\StockFournisseur;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $produits = Produit::all();
        return view('fonctions.produit', compact('produits'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produit = new Produit();
       // $versement->image = $request->image;
       if($request->file('image')){
        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('public/images'), $filename);
        $produit['image']= $filename;
    }
        $produit->libelle = $request->libelle;
        $produit->description = $request->description;
        $produit->stock = $request->stock;
        $produit->prixUnitaire = $request->prixUnitaire;
        $produit->categorie = $request->categorie;
        
        $produit->save();

        return redirect()->route('produit')->with('success','Produit Enregistrer avec success');
    }

    public function modif($id)
    {
        $produit=Produit::find($id);
        return view('fonctions.produitUpdate',compact('produit'));
    }

    public function update(Request $request, $id)
    {
        $produit = Produit::find($id);
        
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $filename);
            $produit['image']= $filename;
        }
            $produit->libelle = $request->libelle;
            $produit->description = $request->description;
            $produit->stock = $request->stock;
            $produit->prixUnitaire = $request->prixUnitaire;
            
            $produit->save();
    
            return redirect()->route('produit')->with('success','Produit Modifier avec success');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paniers = Panier::where('produit_id','=',$id)->get();
        foreach ($paniers as $p) {
            $p->delete();
        }
        $paniers = StockFournisseur::where('produit_id','=',$id)->get();
        foreach ($paniers as $p) {
            $pa = PanierG::where('stock_fournisseur_id','=',$p->id)->get();
            foreach ($pa as $k) {
                $k->delete();
            }
            $p->delete();
        }
        Produit::find($id)->delete();
        return redirect()->route('produit');
    }
}
