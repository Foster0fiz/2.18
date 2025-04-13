@extends('layouts.app')

@section('title', 'Yangi Post Qo\'shish')

@section('content')
    <h1 class="text-center">Yangi Post Qo'shish</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Sarlavha</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Mazmun</label>
            <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Saqlash</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Orqaga</a>
    </form>
@endsection
