<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Associado;
use Illuminate\Http\Request;

class AssociadoController extends Controller {
    public function index() {
        $associados = Associado::paginate(15);
        return view('admin.associados.index', compact('associados'));
    }

    public function create() {
        return view('admin.associados.form');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'matricula' => 'required|unique:associados',
            'nome_completo' => 'required',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|unique:associados',
            'data_filiacao' => 'required|date',
            'categoria' => 'required',
        ]);

        $associado = Associado::create($validated);
        return redirect()->route('admin.associados.index')
                         ->with('success', 'Associado cadastrado com sucesso!');
    }
}
