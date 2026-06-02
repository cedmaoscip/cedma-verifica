<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Associado;

class DashboardController extends Controller {
    public function index() {
        $total = Associado::count();
        $ativos = Associado::where('status', 'Ativo')->count();
        $pendentes = Associado::where('status', 'Pendente')->count();
        $inativos = Associado::where('status', 'Inativo')->count();

        return view('admin.dashboard', compact('total', 'ativos', 'pendentes', 'inativos'));
    }
}
