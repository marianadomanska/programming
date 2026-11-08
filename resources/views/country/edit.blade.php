@extends('layouts.app')

@section('title', 'Редагування країни')

@section('content')

<h1>Редагування країни {{ $country->name }}</h1>

<form method="POST" action="{{ route('country.update', $country) }}">
    @csrf
    @method('PUT')

    <p>
        <label>Код країни:</label>
        <input type="text" value="{{ $country->code }}" disabled>
    </p>

    <p>
        <label>Назва країни:</label>
        <input type="text" name="name"
               value="{{ old('name', $country->name) }}" required>
    </p>

    <p>
        <label>Населення:</label>
        <input type="text" name="population"
               inputmode="numeric" pattern="[0-9]+"
               value="{{ old('population', $country->population) }}" required>
    </p>

    <button type="submit">Зберегти зміни</button>
</form>

<p>
    <a href="{{ route('country.show', $country) }}">Назад</a>
</p>

@endsection
