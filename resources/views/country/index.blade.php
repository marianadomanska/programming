
@extends('layouts.app')

@section('title', 'Список країн')

@section('content')

<h1>Список країн</h1>
<p>
    <a href="{{ route('country.create') }}">Додати нову країну</a>
</p>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Код</th>
            <th>Країна</th>
            <th>Населення</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($countries as $country)
            <tr>
                <td>{{ $country->code }}</td>
                <td>
				<a href="{{ route('country.show', $country) }}">
        {{ $country->name }}
    </a>
	</td>
                <td>{{ $country->population }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p>Сторінка {{ $countries->currentPage() }} з {{ $countries->lastPage() }}</p>

@if ($countries->previousPageUrl())
    <a href="{{ $countries->previousPageUrl() }}">Попередня</a>
@endif

@if ($countries->nextPageUrl())
    <a href="{{ $countries->nextPageUrl() }}">Наступна</a>
@endif

@endsection
