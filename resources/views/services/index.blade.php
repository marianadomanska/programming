
@extends('layouts.app')

@section('title', 'Наші послуги')

@section('content')

<h1>Наші послуги</h1>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Назва послуги</th>
            <th>Категорія</th>
            <th>Майстер, грн</th>
            <th>Топмайстер, грн</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($services as $service)
            <tr>
                <td>
    <a href="{{ route('services.show', $service) }}">
        {{ $service->name }}
    </a>
</td>
                <td>{{ $service->category }}</td>
                <td>{{ $service->price_master }}</td>
                <td>{{ $service->price_top_master }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p>
    Сторінка {{ $services->currentPage() }}
    з {{ $services->lastPage() }}
</p>

@if ($services->previousPageUrl())
    <a href="{{ $services->previousPageUrl() }}">Попередня</a>
@endif

@if ($services->nextPageUrl())
    <a href="{{ $services->nextPageUrl() }}">Наступна</a>
@endif

@endsection
