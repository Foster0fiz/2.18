<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CommentStoreRequest;
class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(CommentStoreRequest $request): RedirectResponse
    {
        Comment::create($request->validated());

        return back()->with('success', 'Комментарий успешно добавлен!');
    }
}