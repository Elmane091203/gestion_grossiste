<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\CommandeClient;
use App\Http\Requests\CommandeClientRequest;

class CommandeClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $commandeclients= CommandeClient::all();
        return view('commandeclients.index', ['commandeclients'=>$commandeclients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('commandeclients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CommandeClientRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommandeClientRequest $request)
    {
        $commandeclient = new CommandeClient;
		$commandeclient->panier_id = $request->input('panier_id');
		$commandeclient->user_id = $request->input('user_id');
        $commandeclient->save();

        return to_route('commandeclients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $commandeclient = CommandeClient::findOrFail($id);
        return view('commandeclients.show',['commandeclient'=>$commandeclient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $commandeclient = CommandeClient::findOrFail($id);
        return view('commandeclients.edit',['commandeclient'=>$commandeclient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CommandeClientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CommandeClientRequest $request, $id)
    {
        $commandeclient = CommandeClient::findOrFail($id);
		$commandeclient->panier_id = $request->input('panier_id');
		$commandeclient->user_id = $request->input('user_id');
        $commandeclient->save();

        return to_route('commandeclients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $commandeclient = CommandeClient::findOrFail($id);
        $commandeclient->delete();

        return to_route('commandeclients.index');
    }
}
