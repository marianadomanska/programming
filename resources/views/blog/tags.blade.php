@extends('layouts.app')
@section('title', 'Керування мітками')
@section('content')

<h1>Мітки: {{ $blog->title }}</h1>

<form method="POST"
      action="{{ route('blog.tags.store', $blog) }}">

    @csrf

    <p><label for="duallist">Оберіть мітки запису</label></p>

    <select id="duallist" name="filters[]" multiple>
        @foreach ($filters as $id => $name)
            <option value="{{ $id }}"
                @selected(in_array($id, old('filters', $selected)))>
                {{ $name }}
            </option>
        @endforeach
    </select>

    @error('filters')
        <p>{{ $message }}</p>
    @enderror

    @error('filters.*')
        <p>{{ $message }}</p>
    @enderror

    <p>
        <button type="submit">Зберегти мітки</button>
    </p>

</form>

<p>
    <a href="{{ route('blog.show', $blog) }}">
        Назад до запису
    </a>
</p>

@endsection
