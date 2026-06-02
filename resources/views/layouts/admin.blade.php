<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - CEDMA Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar { background: #003087; min-height: 100vh; color: white; }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar p-3" style="width: 250px;">
        <h4 class="text-center">CEDMA</h4>
        <ul class="nav flex-column">
            <li><a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
            <li><a href="{{ route('admin.associados.index') }}" class="nav-link text-white">Associados</a></li>
        </ul>
    </div>
    <div class="flex-grow-1 p-4">
        @yield('content')
    </div>
</div>
</body>
</html>
