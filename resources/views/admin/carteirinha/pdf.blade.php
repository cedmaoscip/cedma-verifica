<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CEDMA Carteirinha</title>
    <style>
        body { font-family: Arial; margin: 0; }
        .carteirinha {
            width: 900px;
            height: 550px;
            border: 12px solid #003087;
            background: white;
            position: relative;
        }
        .header {
            background: #003087;
            color: white;
            text-align: center;
            padding: 15px;
        }
        .foto {
            width: 200px;
            height: 250px;
            border: 5px solid #003087;
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="carteirinha">
        <div class="header">
            <h2>CEDMA - Carteirinha Digital</h2>
        </div>
        <div style="display:flex; padding:20px;">
            <div>
                @if($associado->foto)
                    <img src="{{ $associado->foto }}" class="foto">
                @else
                    <div class="foto bg-light d-flex align-items-center justify-content-center">👤</div>
                @endif
            </div>
            <div style="margin-left:30px;">
                <h3>{{ $associado->nome_completo }}</h3>
                <p><strong>Matrícula:</strong> {{ $associado->matricula }}</p>
                <p><strong>Status:</strong> {{ $associado->status }}</p>
                <p><strong>Categoria:</strong> {{ $associado->categoria }}</p>
            </div>
        </div>
    </div>
</body>
</html>
