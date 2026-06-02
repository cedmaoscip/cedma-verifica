<?php

namespace App\Services;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Illuminate\Support\Facades\Storage;

class QrCodeService
{
    public function gerarQrCode($associado)
    {
        $token = hash('sha256', $associado->matricula . now() . config('app.key'));
        
        $associado->update(['token_validacao' => $token]);

        $data = "CEDMA|{$associado->matricula}|{$associado->nome_completo}|{$token}";

        $result = Builder::create()
            ->data($data)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(400)
            ->build();

        $path = "qrcodes/{$associado->matricula}.png";
        Storage::disk('public')->put($path, $result->getString());

        return Storage::url($path);
    }
}
