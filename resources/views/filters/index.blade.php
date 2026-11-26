@extends('layouts.app')

@section('title', 'Мітки блогу')

@section('content')

<h1>Мітки блогу</h1>

<p>
    <a href="{{ route('filters.create') }}">Додати мітку</a>
</p>

<table class="services-table">
    <tr>
        <th>ID</th>
        <th>Назва</th>
        <th>Опис</th>
        <th>Дії</th>
    </tr>

    @forelse ($filters as $filter)
        <tr>
            <td>{{ $filter->filter_id }}</td>
            <td>{{ $filter->filter_name }}</td>
            <td>{{ $filter->filter_description }}</td>
            <td>
                <a href="{{ route('filters.edit', $filter) }}">
                    Редагувати
                </a>

                <form method="POST"
                      action="{{ route('filters.destroy', $filter) }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Видалити</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">Міток немає</td>
        </tr>
    @endforelse
</table>

@endsection
