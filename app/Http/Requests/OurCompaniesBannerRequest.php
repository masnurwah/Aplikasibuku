<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OurCompaniesBannerRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'banner_image' => 'required|mimes:jpg,png,jpeg'
                    
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'banner_image' => 'mimes:jpg,png,jpeg'
                    
                ];
            }
            default:break;
        }
    }
}