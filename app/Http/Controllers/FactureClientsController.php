<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\FactureClient;
use App\Http\Requests\FactureClientRequest;

class FactureClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $factureclients= FactureClient::all();
        return view('factureclients.index', ['factureclients'=>$factureclients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('factureclients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FactureClientRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FactureClientRequest $request)
    {
        $factureclient = new FactureClient;
		$factureclient->commande_client_id = $request->input('commande_client_id');
        $factureclient->save();

        return to_route('factureclients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $factureclient = FactureClient::findOrFail($id);
        return view('factureclients.show',['factureclient'=>$factureclient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $factureclient = FactureClient::findOrFail($id);
        return view('factureclients.edit',['factureclient'=>$factureclient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FactureClientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FactureClientRequest $request, $id)
    {
        $factureclient = FactureClient::findOrFail($id);
		$factureclient->commande_client_id = $request->input('commande_client_id');
        $factureclient->save();

        return to_route('factureclients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $factureclient = FactureClient::findOrFail($id);
        $factureclient->delete();

        return to_route('factureclients.index');
    }
}
