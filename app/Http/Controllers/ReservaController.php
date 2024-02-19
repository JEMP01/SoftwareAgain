<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Reserva;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $reservas = Reserva::latest()->paginate(3);
        return view('reserva.index', ['reservas' => $reservas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('reserva.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'habitacion' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'documento' => 'required',
            'descripcion' => 'required',
            'due_date' => 'required'
        ]);

        Reserva::create($request->all());
        return redirect()->route('reservas.index')->with('success', 'Nueva reserva creada exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reserva $reserva): View
    {
        return view('reserva.edit', ['reserva' => $reserva]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reserva $reserva): RedirectResponse
    {
        $request->validate([
            'habitacion' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'documento' => 'required',
            'descripcion' => 'required',
            'due_date' => 'required'
        ]);
        
        $reserva->update($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reserva $reserva): RedirectResponse
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada exitosamente!');
    }
}
