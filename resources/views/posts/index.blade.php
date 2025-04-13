@extends('layouts.app')

@section('title', "Postlar Ro'yxati")

@section('content')
    <h1 class="text-center">Postlar Ro'yxati</h1>
    <div class="text-end mb-3">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Yangi Post Qo'shish</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sarlavha</th>
                <th>Mazmun</th>
                <th>Harakatlar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->body, 50) }}</td>
                    <td>
                        <!-- Исправленные маршруты -->
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">Ko'rish</a>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Tahrirlash</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Haqiqatan ham o\'chirmoqchimisiz?')">O'chirish</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }} <!-- Laravel pagination -->
@endsection