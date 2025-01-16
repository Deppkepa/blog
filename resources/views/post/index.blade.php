@extends('layouts.app') 

@section('content') 
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 20px;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        background: #ffffff;
        margin: 10px 0;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    form {
        margin: 0;
    }

    button {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

<a href="{{ route('post.create') }}" class="btn btn-primary">Создать новый пост</a> 
<ul>  
    @foreach ($posts as $post)  
        <li>  
            <a href="{{ route('post.edit', $post->id) }}">{{ $post->title }}</a>  
            <form action="{{ route('posts.togglePublish', $post) }}" method="POST" style="display:inline;">  
                @csrf  
                <button type="submit">{{ $post->is_published ? 'Снять с публикации' : 'Опубликовать' }}</button>  
            </form>  
            <form action="{{ route('post.destroy', $post) }}" method="POST" style="display:inline;">  
                @csrf  
                @method('DELETE')  
                <button type="submit">Удалить</button>  
            </form>  

            <!-- Секция комментариев -->
            <h4>Комментарии:</h4>
            <ul>
                @if ($comments)
                    @foreach ($comments as $comment)
                        <li>{{ $comment->content }} <strong>- {{ $comment->created_at->diffForHumans() }}</strong></li>
                    @endforeach
                @endif
            </ul>

            <!-- Форма для добавления комментария -->
            <form action="{{ route('post.comments.create', $post->id) }}" method="POST">
                @csrf
                
                <input name="author" placeholder="Добавьте свой ник" required>

                <textarea name="content" placeholder="Добавьте свой комментарий" required></textarea>
                <button type="submit">Добавить комментарий</button>
            </form>
        </li>  
    @endforeach  
</ul>
@endsection 