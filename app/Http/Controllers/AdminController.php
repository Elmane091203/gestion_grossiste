<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function createUser()
    {
        return view('admin.creer');
    }

    public function storeUser(Request $request)
    {
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'motDePasse' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        event(new Registered($user));
        return view('admin.creer');
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

    public function client() {
        $clients = User::where('role','=','client','and','etat','=','1')->get();
        return view('client.liste', compact('clients'));
    }
    public function forunisseur() {
        $clients = User::where('role','=','fournisseur','and','etat','=','1')->get();
        return view('fournisseur.liste',compact('clients'));
    }
    public function gestionnaire() {
        $clients = User::where('role','=','gestionnaire','and','etat','=','1')->get();
        return view('fonctions.liste',compact('clients'));
    }
}
