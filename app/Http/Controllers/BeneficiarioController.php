<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_Beneficiario;
use App\Models\Beneficiario; 
use Illuminate\Support\Facades\View;
use Auth;

class BeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beneficiarios = Beneficiario::with('tipos_beneficiarios')->get();
            return view('beneficiarios.index', compact('beneficiarios'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos_beneficiarios = Tipo_Beneficiario::all();
        return view('beneficiarios.create', compact('tipos_beneficiarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $beneficiario = new Beneficiario;
        $beneficiario->nombre = $request->nombre;
        $beneficiario->id_tipo = $request->id_tipo;
        $beneficiario->save();
        return redirect()->route('beneficiarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $beneficiario = Beneficiario::find($id);
        return view('beneficiarios.show', compact('beneficiario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $beneficiario = Beneficiario::find($id);
        $tipos_beneficiarios = Tipo_Beneficiario::all();
        return view('beneficiarios.edit', compact('beneficiario', 'tipos_beneficiarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $beneficiario = Beneficiario::find($id);
        $beneficiario->nombre = $request->nombre;
        $beneficiario->id_tipo = $request->id_tipo;
        $beneficiario->save();
        return redirect()->route('beneficiarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $beneficiario = Beneficiario::destroy($id);
        return redirect()->route('beneficiarios.index');
    }
}