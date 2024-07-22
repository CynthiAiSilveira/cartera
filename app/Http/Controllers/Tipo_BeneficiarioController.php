<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_Beneficiario;
use Illuminate\Support\Facades\View;
use Auth;

class Tipo_BeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos_beneficiarios = Tipo_Beneficiario::all();
        return view('tipos_beneficiarios.index', compact('tipos_beneficiarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos_beneficiarios = Tipo_Beneficiario::all();
        return view('tipos_beneficiarios.create', compact('tipos_beneficiarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo_beneficiario = new Tipo_Beneficiario;
        $tipo_beneficiario->tipo = $request->tipo;
        $tipo_beneficiario->save();
        return redirect()->route('tipos_beneficiarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipo_beneficiario = Tipo_Beneficiario::find($id);
        return view('tipos_beneficiarios.show', compact('tipo_beneficiario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipo_beneficiario = Tipo_Beneficiario::find($id);
        return view('tipos_beneficiarios.edit', compact('tipo_beneficiario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tipo_beneficiario = Tipo_Beneficiario::find($id);
        $tipo_beneficiario->tipo = $request->tipo;
        $tipo_beneficiario->save();
        return redirect()->route('tipos_beneficiarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo_beneficiario = Tipo_Beneficiario::destroy($id);
        return redirect()->route('tipos_beneficiarios.index');
    }
}