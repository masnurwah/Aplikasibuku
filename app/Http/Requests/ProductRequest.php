<?php

namespace App\Http\Requests;

use App\Language;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $languages = Language::get();
        $validate_array = array();

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                foreach($languages as $language)
                {
                    $validate_array = array_merge($validate_array,
                    [
                        $language->slug.'_name' => 'required|string|max:255',
                        $language->slug.'_description' => 'required'
                    ]);
                }

                return  $validate_array + [
                    'product_category_id' => 'required',
                    // 'number' => 'required|numeric',
                    'product_image' => 'required|mimes:jpg,png,jpeg',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                foreach($languages as $language)
                {
                    $validate_array = array_merge($validate_array,
                    [
                        $language->slug.'_name' => 'required|string|max:255',
                        $language->slug.'_description' => 'required'
                    ]);
                }
                return  $validate_array + [
                    'product_category_id' => 'required',
                    // 'number' => 'required|numeric',
                    'product_image' => 'mimes:jpg,png,jpeg',
                ];
            }
            default:break;
        }
    }
}
