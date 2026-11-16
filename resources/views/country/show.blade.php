
@extends('layouts.app')

@section('title', 'Інформація про країну')

@section('content')

<h1>{{ $country->name }}</h1>

<p>Код країни: {{ $country->code }}</p>
<p>Назва: {{ $country->name }}</p>
<p>Населення: {{ $country->population }}</p>

<p>
    <a href="{{ route('country.edit', $country) }}">Редагувати країну</a>
</p>

<form action="{{ route('country.destroy', $country) }}" method="POST"
      onsubmit="return confirm('Видалити цю країну?');">
    @csrf
    @method('DELETE')

    <button type="submit">Видалити країну</button>
</form>
<a href="{{ route('country.index') }}">Назад до списку</a>


@endsection
