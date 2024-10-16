@extends('layouts.index')

@section('title', 'Home')

@section('main')
    <section>
        <h1>Bienvenido {{ auth()->user()->username }}</h1>


    </section>
@endsection
