
@extends('layouts.app')

@section('title', 'Наші майстри')

@section('content')

<style>
    .masters-page {
        max-width: 950px;
        margin: 0 auto;
        padding: 30px;
        background: rgba(255, 248, 235, 0.93);
        border-radius: 15px;
        color: #382b23;
    }

    .masters-page h1,
    .masters-page h2 {
        text-align: center;
    }

    .masters-list {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        margin: 30px 0;
    }

    .master-card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        text-align: center;
        width: 210px;
    }

    .master-card h3 {
        margin-bottom: 8px;
    }

    .booking-form {
        max-width: 500px;
        margin: 30px auto;
    }

    .booking-form label {
        display: block;
        margin-top: 15px;
    }

    .booking-form input,
    .booking-form select,
    .booking-form textarea {
        width: 100%;
        box-sizing: border-box;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #c9b9a0;
        border-radius: 5px;
        font: inherit;
    }

    .booking-form button {
        background: #ECD59B;
        border: none;
        padding: 12px 25px;
        margin-top: 20px;
        cursor: pointer;
        font: inherit;
    }

    .error {
        color: #b00020;
        font-size: 14px;
    }
</style>

<div class="masters-page">

    <h1>Наші майстри</h1>
    <p style="text-align: center;">
        Познайомтеся з нашими спеціалістами та оберіть свого майстра.
    </p>

    <div class="masters-list">
        @foreach ($masters as $master)
            <div class="master-card">
                <h3>{{ $master['name'] }}</h3>
                <p>{{ $master['specialty'] }}</p>
            </div>
        @endforeach
    </div>

    <h2>Записатися до майстра</h2>

    <form class="booking-form"
          method="POST"
          action="{{ route('masters.booking') }}">

        @csrf

        <label for="name">Ваше ім'я</label>
        <input type="text" id="name" name="name"
               value="{{ old('name') }}">
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="email">Електронна пошта</label>
        <input type="text" id="email" name="email"
               value="{{ old('email') }}">
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="master">Оберіть майстра</label>
        <select id="master" name="master">
            <option value="">Оберіть майстра</option>
            @foreach ($masters as $master)
                <option value="{{ $master['id'] }}"
                    @selected(old('master') == $master['id'])>
                    {{ $master['name'] }} —
                    {{ $master['specialty'] }}
                </option>
            @endforeach
        </select>
        @error('master')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="message">Ваше повідомлення</label>
        <textarea id="message" name="message"
                  rows="4">{{ old('message') }}</textarea>
        @error('message')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit">Надіслати заявку</button>

    </form>

</div>

@endsection
