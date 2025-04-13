@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Video tafsilotlari</h1>
    <div class="card mb-3">
        <div class="card-header">
            Video: {{ $video->title }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Video URL: <a href="{{ $video->url }}">{{ $video->url }}</a></h5>
            <h5 class="card-title">Video Sarlavhasi: {{ $video->title }}</h5>
            <a href="{{ route('videos.index') }}" class="btn btn-secondary">Orqaga</a>
            <!-- Исправленные маршруты -->
            <a href="{{ route('videos.edit', $video) }}" class="btn btn-warning">
    Tahrirlash
</a>
            <form action="{{ route('videos.destroy', $video) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">O'chirish</button>
            </form>
        </div>
    </div>

    <!-- Izohlar qismi -->
    <div class="comments-section mt-4">
    <h4>Izoh qoldirish</h4>
    
    @if(session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger mb-3">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="commentable_id" value="{{ $video->id }}">
        <input type="hidden" name="commentable_type" value="App\Models\Video">
        
        <div class="mb-3">
            <label for="user_name" class="form-label">Ismingiz</label>
            <input type="text" class="form-control" id="user_name" name="user_name" 
                   value="{{ old('user_name') }}" required>
        </div>
        
        <div class="mb-3">
            <label for="content" class="form-label">Izohingiz</label>
            <textarea class="form-control" id="content" name="content" 
                      rows="3" required>{{ old('content') }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Izoh qoldirish</button>
    </form>
    
    <h4 class="mt-4">Izohlar</h4>
    @forelse($video->comments as $comment)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $comment->user_name }}</h5>
                <p>{{ $comment->content }}</p>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @empty
        <p>Hozircha izohlar mavjud emas</p>
    @endforelse
</div>