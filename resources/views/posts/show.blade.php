@extends('layouts.app')

@section('title', 'Post Tafsilotlari')

@section('content')
<div class="container mt-5">
    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- VALIDATION ERRORS --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="text-center">Post Tafsilotlari</h1>
    <div class="card mb-5">
        <div class="card-header">
            {{ $post->title }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Post sarlavhasi: {{ $post->title }}</h5>
            <p class="card-text">
                {{ $post->body }}
            </p>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Orqaga</a>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Tahrirlash</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Haqiqatan ham o\'chirmoqchimisiz?')">O'chirish</button>
            </form>
        </div>
    </div>

    <!-- Izohlar qismi -->
    <div class="comments-section">
        <!-- Izoh qo'shish formasi -->
        <h4 class="mt-4">Izoh qoldirish</h4>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="commentable_id" value="{{ $post->id }}">
            <input type="hidden" name="commentable_type" value="App\Models\Post">

            <div class="mb-3">
                <label for="user_name">Ismingiz</label>
                <input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" required>
                @error('user_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content">Izohingiz</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="3" required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Izoh qoldirish</button>
        </form>

        <br>
        <h2>Izohlar</h2>

        @forelse($post->comments as $comment)
            <div class="comment mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comment->user_name }}</h5>
                        <p class="card-text">{{ $comment->content }}</p>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Izohni o\'chirmoqchimisiz?')">O'chirish</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>Hozircha izohlar mavjud emas</p>
        @endforelse
    </div>
</div>
@endsection
