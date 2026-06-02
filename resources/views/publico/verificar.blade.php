@extends('layouts.app')

@section('title', 'Verificação CEDMA')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-dark text-white">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold">CEDMA - Verificação</h1>
            <p class="lead">Aponte o QR Code da credencial</p>
        </div>
        
        <div id="reader" style="max-width: 500px; margin: 0 auto; border-radius: 15px; overflow: hidden;"></div>
        
        <div id="result" class="mt-4"></div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
<script>
    const html5QrCode = new Html5Qrcode("reader");
    html5QrCode.start({ facingMode: "environment" }, 
        { fps: 10, qrbox: { width: 250, height: 250 } },
        (decodedText) => {
            html5QrCode.stop();
            verificar(decodedText);
        }
    );

    async function verificar(token) {
        const res = await fetch('/api/verificar', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({token})
        });
        const data = await res.json();
        
        let cor = data.status === 'Ativo' ? 'success' : (data.status === 'Pendente' ? 'warning' : 'danger');
        document.getElementById('result').innerHTML = `
            <div class="card text-center border-${cor}">
                <div class="card-header bg-${cor} text-white">
                    <h3>${data.status}</h3>
                </div>
                <div class="card-body">
                    <h4>${data.nome || 'Não encontrado'}</h4>
                    <p><strong>Matrícula:</strong> ${data.matricula || '-'}</p>
                    <p>${data.mensagem}</p>
                </div>
            </div>
        `;
    }
</script>
@endsection
