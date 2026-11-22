
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
