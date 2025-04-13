<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoStoreRequest;
use App\Http\Requests\VideoUpdateRequest;
use App\Models\Video;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VideoController extends Controller
{
    public function index(): View
    {
        $videos = Video::latest()->get();
        return view('videos.index', compact('videos'));
    }

    public function create(): View
    {
        return view('videos.create');
    }

    public function store(VideoStoreRequest $request): RedirectResponse
    {
        Video::create($request->validated());
        return redirect()->route('videos.index')->with('success', 'Video yaratildi!');
    }

    public function show(Video $video): View
{
    $video->load('comments'); // Жадная загрузка комментариев
    return view('videos.show', compact('video'));
}

    public function edit(Video $video): View
    {
        return view('videos.edit', compact('video'));
    }

    public function update(VideoUpdateRequest $request, Video $video): RedirectResponse
    {
        $video->update($request->validated());
        return redirect()->route('videos.index')->with('success', 'Video updated!');
    }

    public function destroy(Video $video): RedirectResponse
    {
        $video->delete();
        return redirect()->route('videos.index')->with('success', 'Video deleted!');
    }
}