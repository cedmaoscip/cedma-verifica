@extends('layouts.admin')

@section('title', 'Novo Associado')

@section('content')
<h2>Novo Associado</h2>

<form method="POST" action="{{ route('admin.associados.store') }}">
    @csrf
    <div class="mb-3">
        <label>Matrícula</label>
        <input type="text" name="matricula" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Nome Completo</label>
        <input type="text" name="nome_completo" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="data_nascimento" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>CPF</label>
        <input type="text" name="cpf" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Data de Filiação</label>
        <input type="date" name="data_filiacao" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Categoria</label>
        <select name="categoria" class="form-select" required>
            <option value="CONTRIBUINTE">Contribuinte</option>
            <option value="BENFEITOR">Benfeitor</option>
            <option value="FUNDADOR">Fundador</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Salvar Associado</button>
</form>
@endsection
