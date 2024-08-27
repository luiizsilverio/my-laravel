<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function __construct() {
        $this->middleware(middleware: 'can:isAdmin')->only(methods: ['index', 'destroy']);
    }

    public function meus($id) {
        $user = User::where('id', $id)->first();
        $clientes = $user->clientes()->get();
        return view('clientes.meus', ['clientes' => $clientes]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clientes.index', [
            'clientes' => Cliente::orderBy('nome')->paginate('5')
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
        $cliente = new Cliente();
        $cliente->user_id  = $request->user_id;
        $cliente->nome     = $request->nome;
        $cliente->email    = $request->email;
        $cliente->telefone = $request->telefone;
        $cliente->empresa  = $request->empresa;
        $cliente->tel_com  = $request->tel_com;

        $cliente->save();
        return redirect()->route('clientes.index')->with('msg', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        Cliente::findOrFail($cliente->id)->update($request->all());
        return redirect()->route('clientes.index')->with('msg', 'Cliente alterado com sucesso!');
    }

    public function conf_delete($id) {
        $cliente = Cliente::findOrFail($id)->first();
        return view('clientes.conf_delete', ['cliente' => $cliente]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();
        return redirect()->route('clientes.meus', Auth::user()->id)->with('msg', 'Cliente excluído com sucesso!');
    }
}
