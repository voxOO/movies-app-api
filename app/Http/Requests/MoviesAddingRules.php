<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class MoviesAddingRules extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                Rule::unique('movies')->where('releaseDate', request('releaseDate'))
            ],
            'director' => 'required',
            'image_url' => 'url',
            'duration' => 'required|numeric|min:1|max:500',
            'releaseDate' => 'required'
        ];
    }
}
