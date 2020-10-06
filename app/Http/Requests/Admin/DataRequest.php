<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method()) {
            case 'GET':
            case 'DELETE':
            return [];
            case 'POST':
                return [
                    'icon' => 'required|image',
                    'name' => 'required|min:5|max:255',
                    'email' => 'required|unique:data,email',
                    'photo' => 'required|image',
                    'domain' => 'required|min:5|max:255',
                    'file' => 'nullable'
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'icon' => 'nullable|image',
                    'name' => 'required|min:5|max:255',
                    'email' => 'required',
                    'photo' => 'nullable|image',
                    'domain' => 'required|min:5|max:255',
                    'file' => 'nullable'
                ];
            default: break;
        }
    }
}
