<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clientes.index', [
            'clientes' => Cliente::orderByDesc('created_at')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'celular' => 'nullable|string|max:255',
            'data_nascimento' => 'nullable|string|max:255',
            'cpf' => 'nullable|string|max:255',
            'cep' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:255',
            'endereco' => 'nullable|string|max:255',
        ]);

        Cliente::create($validated);

        return redirect('/clientes')->with('flash_message', 'Cliente adicionado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', [
            'cliente' => $cliente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'celular' => 'nullable|string|max:255',
            'data_nascimento' => 'nullable|string|max:255',
            'cpf' => 'nullable|string|max:255',
            'cep' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:255',
            'endereco' => 'nullable|string|max:255',
        ]);

        try {
            $cliente->update($validated);
            return redirect('/clientes')->with('flash_message', 'Cliente atualizado!');
        }catch(QueryException|\Exception $exception){
            return back()->with('flash_message', 'Erro: ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect('/clientes')->with('flash_message', 'Cliente deletado!');
    }
}
