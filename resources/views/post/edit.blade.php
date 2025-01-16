
@extends('layouts.app')
<style>
    form {
    max-width: 600px; /* Максимальная ширина формы */
    margin: 20px auto; /* Центрирование формы */
    padding: 20px; /* Внутренние отступы */
    border: 1px solid #ccc; /* Обводка формы */
    border-radius: 5px; /* Закругленные углы */
    background-color: #f9f9f9; /* Цвет фона формы */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Тень для формы */
}

input[type="text"],
textarea {
    width: 100%; /* Ширина 100% окна родителя */
    padding: 10px; /* Внутренние отступы */
    margin: 10px 0; /* Внешние отступы */
    border: 1px solid #ccc; /* Обводка полей */
    border-radius: 4px; /* Закругленные углы */
}

input[type="text"]:focus,
textarea:focus {
    border-color: #66afe9; /* Цвет границы при фокусе */
    outline: none; /* Убираем стандартный контур */
}

button {
    background-color: #007bff; /* Цвет фона кнопки */
    color: white; /* Цвет текста кнопки */
    border: none; /* Убираем обводку */
    padding: 10px 15px; /* Внутренние отступы */
    border-radius: 4px; /* Закругленные углы */
    cursor: pointer; /* Курсор при наведении */
    font-size: 16px; /* Размер текста кнопки */
}

button:hover {
    background-color: #0056b3; /* Цвет фона кнопки при наведении */
}

/* Стили для заголовка формы */
h2 {
    text-align: center; /* Центрирование заголовка */
    color: #333; /* Цвет текста заголовка */
}
</style>
@section('content')
<form action="{{ route('post.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $post->title }}" required>
    <input type="datetime-local" name="time_start_pub" required>
    <textarea name="content" required>{{ $post->content }}</textarea>
    <button type="submit">Сохранить изменения</button>
</form>
@endsection