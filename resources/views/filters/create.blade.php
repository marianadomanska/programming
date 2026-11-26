
@extends('layouts.app')

@section('title', 'Додати мітку')
@section('content')

<h1>Додати мітку</h1>

<form method="POST" action="{{ route('filters.store') }}">
    @csrf

    <p>
        <label>Назва мітки</label>
        <input type="text" name="filter_name"
               value="{{ old('filter_name') }}" required>
        @error('filter_name')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Опис</label>
        <textarea name="filter_description">{{ old('filter_description') }}</textarea>
        @error('filter_description')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <button type="submit">Зберегти</button>
</form>

<p>
    <a href="{{ route('filters.index') }}">Назад до списку</a>
</p>

@endsection
