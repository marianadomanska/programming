@extends('layouts.app')

@section('title', 'Редагувати мітку')

@section('content')

<h1>Редагувати мітку</h1>

<form method="POST"
      action="{{ route('filters.update', $filter) }}">

    @csrf
    @method('PUT')

    <p>
        <label>Назва мітки</label>
        <input type="text" name="filter_name"
               value="{{ old('filter_name', $filter->filter_name) }}" required>
        @error('filter_name')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Опис</label>
        <textarea name="filter_description">{{ old('filter_description', $filter->filter_description) }}</textarea>
        @error('filter_description')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <button type="submit">Зберегти зміни</button>
</form>

<p>
    <a href="{{ route('filters.index') }}">Назад до списку</a>
</p>

@endsection
