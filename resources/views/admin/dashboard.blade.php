@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h2>Dashboard - CEDMA</h2>

<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5>Ativos</h5>
                <h2>{{ $ativos ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5>Pendentes</h5>
                <h2>{{ $pendentes ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h5>Inativos</h5>
                <h2>{{ $inativos ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5>Total</h5>
                <h2>{{ $total ?? 0 }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection
