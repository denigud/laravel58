<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopItemCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required|min:3|max:200|unique:shop_items',
            'slug'        => 'max:200',
            'description' => 'required|string|min:5|max:1000',
            'category_id' => 'required|integer|exists:shop_categories,id',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
          'title.required'  => 'Введите название товара',
          'description.min' => 'Минимальная длинастатьи [:min] символов',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'Заголовок',
        ];
    }
}
