@extends('layouts.app')

@section('title', 'Редагування послуги')

@section('content')

<h1>Редагування послуги</h1>

<form method="POST" action="{{ route('services.update', $service) }}">
    @csrf
    @method('PUT')

    <p>
        <label>Назва послуги:</label>
        <input type="text" name="name"
               value="{{ old('name', $service->name) }}" required>
        @error('name') <span>{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Категорія:</label>
        <select name="category" required>
            @foreach (['Перукарські послуги', 'Манікюрні послуги', 'Послуги візажиста', 'Послуги лашмейкера'] as $category)
                <option value="{{ $category }}"
                    @selected(old('category', $service->category) == $category)>
                    {{ $category }}
                </option>
            @endforeach
        </select>
        @error('category') <span>{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Ціна майстра, грн:</label>
        <input type="text" name="price_master" inputmode="numeric"
               pattern="[0-9]+"
               value="{{ old('price_master', $service->price_master) }}" required>
        @error('price_master') <span>{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Ціна топмайстра, грн:</label>
        <input type="text" name="price_top_master" inputmode="numeric"
               pattern="[0-9]+"
               value="{{ old('price_top_master', $service->price_top_master) }}" required>
        @error('price_top_master') <span>{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Опис:</label>
        <textarea name="description" rows="4">{{ old('description', $service->description) }}</textarea>
        @error('description') <span>{{ $message }}</span> @enderror
    </p>

    <button type="submit">Зберегти зміни</button>
</form>

<p>
    <a href="{{ route('services.show', $service) }}">Назад</a>
</p>

@endsection
