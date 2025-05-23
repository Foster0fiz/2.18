@extends('layouts.app')

@section('title', "Videolar ro'yxati")

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Videolar ro'yxati</h1>
        <a href="{{ route('videos.create') }}" class="btn btn-primary mb-3">Yangi video qo'shish</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Video Sarlavhasi</th>
                    <th>URL</th>
                    <th>Harakatlar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videos as $video)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $video->title }}</td>
                        <td><a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a></td>
                        <td>
                            <a href="{{ route('videos.show', $video->id) }}" class="btn btn-info btn-sm">Ko'rish</a>
                            <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-warning btn-sm">Tahrirlash</a>
                            <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Haqiqatan o\'chirmoqchimisiz?')">O'chirish</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
