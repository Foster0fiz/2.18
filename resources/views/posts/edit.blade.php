@extends('layouts.app')

@section('title', 'Postni Tahrirlash')

@section('content')
    <div class="container">
        <h1>Postni Tahrirlash</h1>

        <form method="POST" action="{{ route('posts.update', $post->id) }}" class="mt-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Sarlavha</label>
                <input type="text" class="form-control" id="title" name="title" 
                       value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Mazmun</label>
                <textarea class="form-control" id="body" name="body" rows="5" required>{{ old('body', $post->body) }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Yangilash</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Orqaga</a>
            </div>
        </form>
    </div>
@endsection