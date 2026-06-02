@extends('layouts.admin')

@section('title', 'Associados')

@section('content')
<h2>Associados</h2>
<a href="{{ route('admin.associados.create') }}" class="btn btn-primary mb-3">+ Novo Associado</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($associados as $associado)
        <tr>
            <td>{{ $associado->matricula }}</td>
            <td>{{ $associado->nome_completo }}</td>
            <td>
                <span class="badge bg-{{ $associado->status == 'Ativo' ? 'success' : ($associado->status == 'Pendente' ? 'warning' : 'danger') }}">
                    {{ $associado->status }}
                </span>
            </td>
            <td>
                <a href="{{ route('admin.associados.carteirinha', $associado) }}" class="btn btn-sm btn-success">Carteirinha</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
