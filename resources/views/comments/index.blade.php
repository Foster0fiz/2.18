@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Все комментарии</h1>
    
    <div class="mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">
            Назад
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Пользователь</th>
                    <th>Комментарий</th>
                    <th>Объект</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->user_name }}</td>
                    <td>{{ Str::limit($comment->content, 50) }}</td>
                    <td>
                        {{ class_basename($comment->commentable_type) }} #{{ $comment->commentable_id }}
                    </td>
                    <td>{{ $comment->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Удалить комментарий?')">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $comments->links() }}
</div>
@endsection