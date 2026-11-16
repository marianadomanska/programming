@extends('layouts.app')

@section('title', 'Популярність послуг')

@section('content')

<h1>Популярність послуг салону</h1>

<p>Статистика переглядів окремих послуг.</p>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Назва послуги</th>
            <th>Кількість переглядів</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($rows as $row)
            <tr>
                <td>
                    <a href="{{ route('services.show', $row['id']) }}">
                        {{ $row['name'] }}
                    </a>
                </td>

                <td>{{ $row['hits'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2">
                    Переглядів послуг поки немає.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<p>
    <a href="{{ route('stats.pages') }}">
        Назад до статистики
    </a>
</p>

@endsection
