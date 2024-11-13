@extends('layouts.master')

@section('menu')
    @parent
    <p><a href="{{ route('layout1') }}">layout1</a></p>
@endsection

@section('content')
    <p>Este es el contenido propio de prueba 2.</p>
@endsection
