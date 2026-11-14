
@extends('layouts.app')

@section('title', 'Статистика відвідувань')

@section('content')

<h1>Статистика відвідувань</h1>

<p>
    <a href="{{ route('stats.pages', ['type' => 'page']) }}">
        За сторінками
    </a>

    <a href="{{ route('stats.pages', ['type' => 'ip']) }}">
        За IP-адресами
    </a>
	<a href="{{ route('stats.services') }}">
        Популярність послуг
    </a>
</p>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>{{ $type === 'page' ? 'Сторінка' : 'IP-адреса' }}</th>
            <th>Кількість звернень</th>
            <th>Останній візит</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($rows as $row)
            <tr>
                <td>
	<a href="{{ route('stats.detail', [
    'type' => $type,
    'item' => $row->{$type}
    ]) }}">
        {{ $row->{$type} }}
    </a>
	</td>
                <td>{{ $row->hits }}</td>
                <td>{{ $row->last_visit }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Даних поки немає.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
