<?php

namespace App\Http\Request;

class ValidationRule
{
    public function loginRules($data)
    {
        return [
            'name' => 'required',
            'password' => 'required',
        ];
    }

    public function registrationRules($data)
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ];
    }

    public function createPostRules($data)
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function updatePostRules($data)
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
        ];
    }
}
