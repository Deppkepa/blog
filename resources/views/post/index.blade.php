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
		display:flex;
		flex-direction:column;
		width:60%;
		margin-left:auto;
		margin-right:auto;
		text-align:center;
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
		text-wrap:wrap;
    }

    form {
        margin: 5px;
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
<br>
<a href="{{ route('comments.index') }}" class="btn btn-primary">Комментарии</a> 
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
						@if($comment->post_id == $post->id)
							<li >{{ $comment->content }} <strong>- {{ $comment->created_at->diffForHumans() }}</strong></li>
						@endif
                    @endforeach
                @endif
            </ul>

            <!-- Форма для добавления комментария -->
            <form action="{{ route('post.comments.create', $post->id) }}" method="POST">
                @csrf
                
                <input id="author" name="author" placeholder="Добавьте свой ник" required>

                <textarea id="content" name="content" placeholder="Добавьте свой комментарий" required></textarea>
                <button type="submit">Добавить комментарий</button>
            </form>
        </li>  
    @endforeach  
</ul>
@endsection 