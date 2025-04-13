<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_name' => 'required|string|max:100',
            'content' => 'required|string|max:1000',
            'commentable_id' => 'required|integer|exists:videos,id',
            'commentable_type' => 'required|string|in:App\Models\Video'
        ];
    }
}