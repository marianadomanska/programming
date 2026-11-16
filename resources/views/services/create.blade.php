
@extends('layouts.app')

@section('title', 'Додати послугу')

@section('content')

<h1>Додавання нової послуги</h1>

<form method="POST" action="{{ route('services.store') }}">
    @csrf

    <p>
        <label>Назва послуги:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name') <span>{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Категорія:</label>
        <select name="category" required>
            <option value="">Оберіть категорію</option>
            @foreach (['Перукарські послуги', 'Манікюрні послуги', 'Послуги візажиста', 'Послуги лашмейкера'] as $category)
                <option value="{{ $category }}" @selected(old('category') == $category)>
                    {{ $category }}
                </option>
            @endforeach
        </select>
        @error('category') <span>{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Ціна майстра, грн:</label>
        <input type="text" name="price_master" inputmode="numeric"
               pattern="[0-9]+" value="{{ old('price_master') }}" required>
        @error('price_master') <span>{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Ціна топмайстра, грн:</label>
        <input type="text" name="price_top_master" inputmode="numeric"
               pattern="[0-9]+" value="{{ old('price_top_master') }}" required>
        @error('price_top_master') <span>{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Опис:</label>
        <textarea name="description" rows="4">{{ old('description') }}</textarea>
        @error('description') <span>{{ $message }}</span> @enderror
    </p>

    <button type="submit">Додати послугу</button>
</form>

<p>
    <a href="{{ route('services.index') }}">Назад до списку</a>
</p>

@endsection
