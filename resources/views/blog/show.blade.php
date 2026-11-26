
@extends('layouts.app')

@section('title', $blog->title)

@section('content')
    <h1>{{ $blog->title }}</h1>

    <p>
        Категорія:
        {{ $blog->category?->category_name ?? 'Без категорії' }}
    </p>

    <p>
        Автор: {{ $blog->author?->name ?? 'Редакція' }}
    </p>

    <p>
        Дата публікації:
        {{ $blog->dt_created->format('d.m.Y') }}
    </p>

    <h3>Опис</h3>
    <p>{{ $blog->description }}</p>

	<h3>Мітки</h3>

<div class="tags">
    @forelse ($blog->filters as $filter)
        <span class="tag">
            {{ $filter->filter_name }}
        </span>
    @empty
        <span>Міток немає.</span>
    @endforelse
</div>


<h3>Пов'язані послуги</h3>

<div style="overflow-x: auto;">
    <table class="services-table" style="min-width: 800px;">
        <thead>
            <tr>
                <th>Назва послуги</th>
                <th>Опис</th>
                <th>Категорія</th>
                <th>Майстер, грн</th>
                <th>Топмайстер, грн</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($blog->services as $service)
                <tr>
                    <td>
                        <a href="{{ route('services.show', $service) }}">
                            {{ $service->name }}
                        </a>
                    </td>

                    <td>{{ $service->description }}</td>
                    <td>{{ $service->category }}</td>
                    <td>{{ $service->price_master }}</td>
                    <td>{{ $service->price_top_master }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        Пов'язаних послуг немає.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

    <h3>Повний текст</h3>
    <div style="white-space: pre-line;">{{ $blog->text }}</div>

    <p>
        <a href="{{ route('blog.edit', $blog) }}">
            Редагувати запис
        </a>
    </p>

    <p>
        <a href="{{ route('blog.index') }}">
            Назад до списку
        </a>
    </p>
@endsection
