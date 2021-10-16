<?php

namespace App\Http\Requests;

use App\Language;
use Illuminate\Foundation\Http\FormRequest;

class OurCompaniesRequest extends FormRequest
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
                        $language->slug.'_title' => 'required|string|max:255',
                        $language->slug.'_description' => 'required',
                        $language->slug.'_map_title' => 'required|string|max:255',
                        $language->slug.'_map_address' => 'required',
                    ]);
                }

                return  $validate_array + [
                    'icon_company' => 'required|mimes:jpg,png,jpeg',
                    'description_image' => 'required|mimes:jpg,png,jpeg',
                    'map_image' => 'required|mimes:jpg,png,jpeg',
                    'map_link' => 'required|string|max:255',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                foreach($languages as $language)
                {
                    $validate_array = array_merge($validate_array,
                    [
                        $language->slug.'_title' => 'required|string|max:255',
                        $language->slug.'_description' => 'required',
                        $language->slug.'_map_title' => 'required|string|max:255',
                        $language->slug.'_map_address' => 'required',
                    ]);
                }
                return  $validate_array + [
                    'icon_company' => 'mimes:jpg,png,jpeg',
                    'description_image' => 'mimes:jpg,png,jpeg',
                    'map_image' => 'mimes:jpg,png,jpeg',
                    'map_link' => 'string|max:255',
                ];
            }
            default:break;
        }
    }
}
