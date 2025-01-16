@extends('layouts.app') 
@section('content')
<div class="container">
    <h1>Модерация комментариев</h1>
	<a href="{{ route('post.index') }}" class="btn btn-primary">Главная</a> 
    @if ($comments->isEmpty())
        <p>Нет комментариев для модерации.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Автор</th>
                    <th>Комментарий</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->author }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>
                            <form action="{{ route('comments.modered', $comment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Одобрить</button>
                            </form>
                            <form action="{{ route('comments.modered', $comment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Отклонить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection