
@extends('layouts.app')

@section('title', 'Заявку надіслано')

@section('content')

<div style="max-width: 600px; margin: 30px auto;
            padding: 35px; background: #fff8eb;
            border-radius: 15px; text-align: center;">

    <h1>Дякуємо за заявку!</h1>

    <p>Ваші дані успішно отримано.</p>

    <p><b>Ім'я:</b> {{ $name }}</p>
    <p><b>Email:</b> {{ $email }}</p>

    
<p><b>Обраний майстер:</b>
    {{ \App\Enums\MasterSpecialty::from($master)->label() }}
</p>


    <p><b>Повідомлення:</b> {{ $message }}</p>

    <a href="{{ route('site.masters') }}">
        Повернутися до майстрів
    </a>

</div>

@endsection
