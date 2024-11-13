@extends('layouts.master')

@section('menu')
    @parent
    <p><a href="{{ route('layout2') }}">layout2</a></p>
@endsection

@section('content')
    <p>Este es el contenido propio de prueba 1.</p>
@endsection
