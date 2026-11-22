
@extends('layouts.app')

@section('title', 'Редагувати запис')

@section('content')
    <h1>Редагувати запис</h1>

    <form method="POST" action="{{ route('blog.update', $blog) }}">
        @csrf
        @method('PUT')

        @include('blog._form')

        <button type="submit">Зберегти зміни</button>
    </form>

    <p>
        <a href="{{ route('blog.index') }}">Назад до списку</a>
    </p>
@endsection
