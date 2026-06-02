<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Associado;
use Barryvdh\DomPDF\Facade\Pdf;

class CarteirinhaController extends Controller
{
    public function gerar(Associado $associado)
    {
        $pdf = Pdf::loadView('admin.carteirinha.pdf', compact('associado'))
                  ->setPaper([0, 0, 900, 550], 'portrait'); // Tamanho carteirinha

        return $pdf->stream("carteirinha_{$associado->matricula}.pdf");
    }
}
