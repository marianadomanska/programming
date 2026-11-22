@extends('layouts.app')

@section('title', $translation?->name ?? $service->name)

@section('content')

@php
    $categoryTranslations = [
        'Перукарські послуги' => 'Hairdressing services',
        'Манікюрні послуги' => 'Nail services',
        'Послуги візажиста' => 'Makeup services',
        'Послуги лашмейкера' => 'Lash services',
    ];

    $name = $translation?->name ?? $service->name;
    $description = $translation?->description ?? $service->description;

    $category = $lang === 'en'
        ? ($categoryTranslations[$service->category] ?? $service->category)
        : $service->category;
@endphp

<h1>{{ $name }}</h1>

<p>
    <a href="{{ route('services.show', ['service' => $service, 'lang' => 'uk']) }}">
        Українська
    </a>
    |
    <a href="{{ route('services.show', ['service' => $service, 'lang' => 'en']) }}">
        English
    </a>
</p>

<p>
    {{ $lang === 'en' ? 'Category' : 'Категорія' }}:
    {{ $category }}
</p>

<p>
    {{ $lang === 'en' ? 'Master price' : 'Ціна майстра' }}:
    {{ $service->price_master }} UAH
</p>

<p>
    {{ $lang === 'en' ? 'Top master price' : 'Ціна топмайстра' }}:
    {{ $service->price_top_master }} UAH
</p>

<p>
    {{ $lang === 'en' ? 'Description' : 'Опис' }}:
    {{ $description }}
</p>

<p>
    <a href="{{ route('services.edit', $service) }}">
        {{ $lang === 'en' ? 'Edit service' : 'Редагувати послугу' }}
    </a>
</p>

<form action="{{ route('services.destroy', $service) }}"
      method="POST"
      onsubmit="return confirm('Ви впевнені, що хочете видалити послугу?');">
    @csrf
    @method('DELETE')

    <button type="submit">
        {{ $lang === 'en' ? 'Delete service' : 'Видалити послугу' }}
    </button>
</form>

<p>
    <a href="{{ route('services.index', ['lang' => $lang]) }}">
        {{ $lang === 'en' ? 'Back to list' : 'Назад до списку' }}
    </a>
</p>

@endsection
