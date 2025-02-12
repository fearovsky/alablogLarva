<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    // messages
    public function messages()
    {
        return [
            '*.required' => 'article.error.:attribute.required',
            '*.string' => 'article.error.:attribute.string',
            '*.max' => 'article.error.:attribute.max',
        ];
    }
}
