@extends('layouts.app')
@section('title', 'Адміністрування блогу')
@section('content')
<style>

.admin-search {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    align-items: flex-end;
    padding: 20px;
    margin-top: 25px;
    background: rgba(255, 255, 255, 0.85);
    border: 1px solid #e7b9c5;
    border-radius: 10px;
}

.admin-search > div {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.admin-search label {
    color: black;
    font-weight: bold;
}

.admin-search input,
.admin-search select {
    padding: 10px;
    border: 1px solid #e7b9c5;
    border-radius: 6px;
    background: white;
    color: black;
    font-family: inherit;
    font-size: 16px;
    min-width: 170px;
    box-sizing: border-box;
}

.admin-search-actions {
    display: flex !important;
    flex-direction: row !important;
    align-items: center;
    gap: 15px;
}

.admin-search button {
    padding: 11px 20px;
    background: #FFD1DC;
    color: black;
    border: 1px solid #e7b9c5;
    border-radius: 6px;
    cursor: pointer;
    font-family: inherit;
    font-size: 16px;
}

.admin-search-actions a {
    color: #8b3651;
}

    .admin-table-wrap {
        width: 100%;
        overflow-x: auto;
        margin-top: 25px;
    }

    .admin-table {
        width: 100%;
        min-width: 1150px;
        table-layout: fixed;
        border-collapse: collapse;
        background: rgba(255, 255, 255, 0.9);
    }

    .admin-table th,
    .admin-table td {
        padding: 15px;
        border: 1px solid #e7b9c5;
        text-align: left;
        vertical-align: middle;
        overflow-wrap: anywhere;
    }

    .admin-table th {
        background: #FFD1DC;
        color: black;
        font-weight: bold;
    }

    .admin-table td {
        color: black;
    }

    .admin-table a {
        color: #8b3651;
    }

    .admin-table .tag {
        display: inline-block;
        padding: 5px 10px;
        margin: 3px;
        border-radius: 12px;
        background: #FFD1DC;
        color: black;
    }
</style>

<h1>Адміністрування блогу</h1>

<p>Перелік публікацій із категоріями та пов'язаними мітками.</p>

<form method="GET" action="{{ route('blog.admin') }}"
      class="admin-search">

    <div>
        <label for="title">Заголовок</label>
        <input type="text"
               id="title"
               name="title"
               value="{{ request('title') }}"
               placeholder="Пошук за заголовком">
    </div>

    <div>
        <label for="categoryName">Назва категорії</label>
        <input type="text"
               id="categoryName"
               name="categoryName"
               value="{{ request('categoryName') }}"
               placeholder="Назва категорії">
    </div>

    <div>
        <label for="category_id">Категорія</label>
        <select id="category_id" name="category_id">
            <option value="">Усі категорії</option>

            @foreach ($categories as $id => $name)
                <option value="{{ $id }}"
                    @selected(request('category_id') == $id)>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="filter_id">Мітка</label>
        <select id="filter_id" name="filter_id">
            <option value="">Усі мітки</option>

            @foreach ($filters as $id => $name)
                <option value="{{ $id }}"
                    @selected(request('filter_id') == $id)>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>

<div>
    <label for="serviceName">Назва послуги</label>
    <input type="text"
           id="serviceName"
           name="serviceName"
           value="{{ request('serviceName') }}"
           placeholder="Пошук за послугою">
</div>

<div>
    <label for="service_id">Послуга салону</label>
    <select id="service_id" name="service_id">
        <option value="">Усі послуги</option>

        @foreach ($services as $id => $name)
            <option value="{{ $id }}"
                @selected(request('service_id') == $id)>
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>

    <input type="hidden"
           name="sort"
           value="{{ request('sort') }}">

    <div class="admin-search-actions">
        <button type="submit">Застосувати</button>

        <a href="{{ route('blog.admin') }}">
            Скинути фільтри
        </a>
    </div>
</form>

<div class="admin-table-wrap">
    <table class="admin-table">
        <thead>
            <tr>

<th style="width: 28%;">
    @php
        $sortTitle = request('sort');
        $nextTitle = $sortTitle === 'title' ? '-title' : 'title';
    @endphp

    <a href="{{ route('blog.admin', array_merge(
        request()->except('sort', 'page'),
        ['sort' => $nextTitle]
    )) }}">
        Заголовок

        @if ($sortTitle === 'title')
            ↑
        @elseif ($sortTitle === '-title')
            ↓
        @endif
    </a>
</th>


@php
    $currentSort = request('sort');

    $nextSort = $currentSort === 'categoryName'
        ? '-categoryName'
        : 'categoryName';
@endphp

<th style="width: 18%;">
    <a href="{{ route('blog.admin', array_merge(
        request()->except('sort', 'page'),
        ['sort' => $nextSort]
    )) }}">
        Категорія

        @if ($currentSort === 'categoryName')
            ↑
        @elseif ($currentSort === '-categoryName')
            ↓
        @endif
    </a>
</th>

                <th style="width: 27%;">Мітки</th>

<th style="width: 20%;">Послуги салону</th>

<th style="width: 8%;">
    @php
        $nextServicesSort = request('sort') === 'servicesCount'
            ? '-servicesCount'
            : 'servicesCount';
    @endphp

    <a href="{{ route('blog.admin', array_merge(
        request()->except('sort', 'page'),
        ['sort' => $nextServicesSort]
    )) }}">
        Кількість

        @if (request('sort') === 'servicesCount')
            ↑
        @elseif (request('sort') === '-servicesCount')
            ↓
        @endif
    </a>
</th>


<th style="width: 17%;">Дата</th>
    @php
        $sortDate = request('sort');
        $nextDate = $sortDate === 'created' ? '-created' : 'created';
    @endphp

    <a href="{{ route('blog.admin', array_merge(
        request()->except('sort', 'page'),
        ['sort' => $nextDate]
    )) }}">

        @if ($sortDate === 'created')
            ↑
        @elseif ($sortDate === '-created')
            ↓
        @endif
    </a>
</th>

                <th style="width: 10%;">Дії</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($blogs as $blog)
                <tr>
                    <td>
                        <a href="{{ route('blog.show', $blog) }}">
                            {{ $blog->title }}
                        </a>
                    </td>

                    <td>
                        {{ $blog->category?->category_name ?? 'Без категорії' }}
                    </td>

                    <td>
                        @forelse ($blog->filters as $filter)
                            <span class="tag">
                                {{ $filter->filter_name }}
                            </span>
                        @empty
                            Немає міток
                        @endforelse
                    </td>

<td>
    @forelse ($blog->services as $service)
        <span class="tag">
            {{ $service->name }}
        </span>
    @empty
        Немає послуг
    @endforelse
</td>

<td>
    {{ $blog->services_count }}
</td>

                    <td>
                        {{ $blog->dt_created }}
                    </td>

                    <td>
                        <a href="{{ route('blog.edit', $blog) }}">
                            Редагувати
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        Публікацій не знайдено.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if ($blogs->hasPages())
    <div style="margin-top: 20px;">
        @if ($blogs->onFirstPage())
            <span>Попередня</span>
        @else
            <a href="{{ $blogs->previousPageUrl() }}">Попередня</a>
        @endif

        <span style="margin: 0 15px;">
            Сторінка {{ $blogs->currentPage() }}
            з {{ $blogs->lastPage() }}
        </span>

        @if ($blogs->hasMorePages())
            <a href="{{ $blogs->nextPageUrl() }}">Наступна</a>
        @else
            <span>Наступна</span>
        @endif
    </div>
@endif

@endsection