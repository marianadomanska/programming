
@extends('layouts.app')

@section('title', 'Детальна статистика')

@section('content')

<h1>Детальна статистика</h1>

<p>
    Фільтр:
    <strong>{{ $type }}</strong> =
    <strong>{{ $item }}</strong>
</p>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Сторінка</th>
            <th>IP-адреса</th>
            <th>Статус</th>
            <th>Дата і час</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($rows as $row)
            <tr>
                <td>{{ $row->page }}</td>
                <td>{{ $row->ip }}</td>
                <td>{{ $row->status }}</td>
                <td>{{ $row->visited_at->format('d.m.Y H:i:s') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Записів не знайдено</td>
            </tr>
        @endforelse
    </tbody>
</table>


<div style="margin-top: 20px;">

    @if ($rows->previousPageUrl())
        <a href="{{ $rows->previousPageUrl() }}">
            ← Попередня
        </a>
    @endif

    <span style="margin: 0 15px;">
        Сторінка {{ $rows->currentPage() }}
        із {{ $rows->lastPage() }}
    </span>

    @if ($rows->nextPageUrl())
        <a href="{{ $rows->nextPageUrl() }}">
            Наступна →
        </a>
    @endif

</div>


<p>
    <a href="{{ route('stats.pages', ['type' => $type]) }}">
        Назад до статистики
    </a>
</p>

@endsection
