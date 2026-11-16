
@extends('layouts.app')

@section('title', 'Інформація про послугу')

@section('content')

<h1>{{ $service->name }}</h1>

<p>Категорія: {{ $service->category }}</p>
<p>Ціна майстра: {{ $service->price_master }} грн</p>
<p>Ціна топмайстра: {{ $service->price_top_master }} грн</p>
<p>Опис: {{ $service->description }}</p>
<p>
    <a href="{{ route('services.edit', $service) }}">
        Редагувати послугу
    </a>
</p>
<form action="{{ route('services.destroy', $service) }}"
      method="POST"
      onsubmit="return confirm('Ви впевнені, що хочете видалити послугу?');">
    @csrf
    @method('DELETE')

    <button type="submit">Видалити послугу</button>
</form>
<a href="{{ route('services.index') }}">Назад до списку</a>

@endsection
