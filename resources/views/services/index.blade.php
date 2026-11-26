@extends('layouts.app')

@section('title', $lang === 'en' ? 'Our services' : 'Наші послуги')

@section('content')

<h1>{{ $lang === 'en' ? 'Our services' : 'Наші послуги' }}</h1>

<p>
    <a href="{{ route('services.index', ['lang' => 'uk']) }}">
        Українська
    </a>
    |
    <a href="{{ route('services.index', ['lang' => 'en']) }}">
        English
    </a>
</p>

<table class="services-table">
    <thead>
        <tr>
            <th>{{ $lang === 'en' ? 'Service' : 'Назва послуги' }}</th>
            <th>{{ $lang === 'en' ? 'Description' : 'Опис' }}</th>
            <th>{{ $lang === 'en' ? 'Category' : 'Категорія' }}</th>
            <th>{{ $lang === 'en' ? 'Master, UAH' : 'Майстер, грн' }}</th>
            <th>{{ $lang === 'en' ? 'Top master, UAH' : 'Топмайстер, грн' }}</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($services as $service)
            @php
                $translation = $service->translations->first();

                $name = $translation?->name ?? $service->name;
                $description = $translation?->description
                    ?? $service->description;
            @endphp

            <tr>
                <td>
                    <a href="{{ route('services.show', ['service' => $service, 'lang' => $lang]) }}">
                        {{ $name }}
                    </a>
                </td>

                <td>{{ $description }}</td>

@php
    $categoryTranslations = [
        'Перукарські послуги' => 'Hairdressing services',
        'Манікюрні послуги' => 'Nail services',
        'Послуги візажиста' => 'Makeup services',
        'Послуги лашмейкера' => 'Lash services',
    ];
@endphp

<td>
    {{ $lang === 'en'
        ? ($categoryTranslations[$service->category] ?? $service->category)
        : $service->category }}
</td>

                <td>{{ $service->price_master }}</td>
                <td>{{ $service->price_top_master }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p>
    {{ $lang === 'en' ? 'Page' : 'Сторінка' }}
    {{ $services->currentPage() }}
    {{ $lang === 'en' ? 'of' : 'з' }}
    {{ $services->lastPage() }}
</p>

@if ($services->previousPageUrl())
    <a href="{{ $services->previousPageUrl() }}">
        {{ $lang === 'en' ? 'Previous' : 'Попередня' }}
    </a>
@endif

@if ($services->nextPageUrl())
    <a href="{{ $services->nextPageUrl() }}">
        {{ $lang === 'en' ? 'Next' : 'Наступна' }}
    </a>
@endif

@endsection