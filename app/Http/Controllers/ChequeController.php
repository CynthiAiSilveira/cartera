<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cheque;
use App\Models\Beneficiario;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
//use Barryvdh\DomPDF\Facade as PDF;
use PDF;
use Auth;

class ChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cheque::with('beneficiario')->get();
        return view('cheques.index', compact('data'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $beneficiarios = Beneficiario::all();
        return view('cheques.create', compact('beneficiarios'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cheque = new Cheque;
        $cheque->fecha_creacion = $request->fecha_creacion;
        $cheque->cantidad = $request->cantidad;
        $cheque->id_beneficiario = $request->id_beneficiario;
        $cheque->cantidad_letra = $request->cantidad_letra;
        $cheque->save();
        return redirect()->route('cheques.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cheque = Cheque::find($id);
        return view('cheques.pdf', compact('cheque'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cheque = Cheque::find($id);
        $beneficiarios = Beneficiario::all();
        return view('cheques.edit', compact('cheque', 'beneficiarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cheque = Cheque::find($id);
        $cheque->fecha_creacion = $request->fecha_creacion;
        $cheque->cantidad = $request->cantidad;
        $cheque->id_beneficiario = $request->id_beneficiario;
        $cheque->cantidad_letra = $request->cantidad_letra;
        $cheque->save();
        return redirect()->route('cheques.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cheque = Cheque::destroy($id);
        return redirect()->route('cheques.index');
    }

    public function generatePDF(Request $request, string $id)
    {
        
        $beneficiarios = Beneficiario::all();
        $cheque = Cheque::find($id);

        // Genera el PDF utilizando la clase PDF de Laravel
        $pdf = PDF::loadView('cheques.pdf', compact('cheque', 'beneficiarios'));

        // Descarga el PDF
        return $pdf->stream('cheques.pdf'); 
    }

    /*public function PDF(Request $request, string $id)
    {
        
        $beneficiarios = Beneficiario::all();
        $cheque = Cheque::find($id);

        // Genera el PDF utilizando la clase PDF de Laravel
        $pdf = PDF::loadView('cheques.pdf', compact('cheque', 'beneficiarios'));

        // Descarga el PDF
        return $pdf->download('cheques.pdf'); 
    }*/
}
