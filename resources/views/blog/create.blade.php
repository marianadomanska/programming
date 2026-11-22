
@extends('layouts.app')

@section('title', 'Додати запис')

@section('content')
    <h1>Додати запис</h1>

    <form method="POST" action="{{ route('blog.store') }}">
        @csrf

        @include('blog._form')

        <button type="submit">Зберегти</button>
    </form>

    <p>
        <a href="{{ route('blog.index') }}">Назад до списку</a>
    </p>
@endsection
