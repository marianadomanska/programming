
@extends('layouts.app')

@section('title', 'Додати країну')

@section('content')

<h1>Додавання країни</h1>

<form method="POST" action="{{ route('country.store') }}">
    @csrf

    <p>
        <label>Код країни:</label>
        <input type="text" name="code" maxlength="2" value="{{ old('code') }}" required>
        @error('code') <span>{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Назва країни:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name') <span>{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Населення:</label>
   <input type="text" name="population" inputmode="numeric" pattern="[0-9]+" value="{{ old('population') }}" required>
        @error('population') <span>{{ $message }}</span> @enderror
    </p>

    <button type="submit">Додати країну</button>
</form>

<p>
    <a href="{{ route('country.index') }}">Назад до списку</a>
</p>

@endsection
