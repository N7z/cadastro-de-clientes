@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
    @include('clientes.form', ['cliente' => $cliente])
@endsection
