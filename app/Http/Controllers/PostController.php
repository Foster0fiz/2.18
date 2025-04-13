<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;

class PostController extends Controller
{
    // Вывод списка постов с пагинацией
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // Показ формы создания нового поста
    public function create()
    {
        return view('posts.create');
    }

    // Сохранение нового поста в базу данных
    public function store(StorePostRequest $request)
    {
        // Валидация выполняется в PostStoreRequest
        $data = $request->validated();
        Post::create($data);
        return redirect()->route('posts.index')
            ->with('success', 'Пост успешно создан.');
    }

    // Отображение одного поста (при необходимости)
    // app/Http/Controllers/PostController.php
public function show(Post $post)
{
    $post->load('comments'); // Eager load comments
    return view('posts.show', compact('post'));
}

    // Показ формы редактирования существующего поста
   // app/Http/Controllers/PostController.php
   public function edit(Post $post)
   {
       return view('posts.edit', compact('post'));
   }
    // Обновление данных поста в базе
    public function update(PostUpdateRequest $request, Post $post)
    {
        $validated = $request->validated();
        $post->update([
            'title' => $validated['title'],
            'body' => $validated['body']
        ]);
        
        return redirect()->route('posts.show', $post)
            ->with('success', 'Post yangilandi!');
    }

    // Удаление поста из базы данных
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success', 'Пост успешно удалён.');
    }
}
