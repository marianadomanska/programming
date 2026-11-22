@extends('layouts.app')

@section('title', 'Блог')

@section('content')
    <h1>Блог</h1>

    <div class="blog-grid">
        @forelse ($blogs as $blog)
            @include('blog._item', ['blog' => $blog])
        @empty
            <p>Записів поки немає.</p>
        @endforelse
    </div>


@if ($blogs->hasPages())
    <div style="margin-top: 20px;">

        @if ($blogs->onFirstPage())
            <span>Назад</span>
        @else
            <a href="{{ $blogs->previousPageUrl() }}">← Назад</a>
        @endif

        <span style="margin: 0 15px;">
            Сторінка {{ $blogs->currentPage() }} з {{ $blogs->lastPage() }}
        </span>

        @if ($blogs->hasMorePages())
            <a href="{{ $blogs->nextPageUrl() }}">Далі →</a>
        @else
            <span>Далі</span>
        @endif

    </div>
@endif

@endsection
