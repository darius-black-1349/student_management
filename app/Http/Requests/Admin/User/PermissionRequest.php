<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermissionRequest extends FormRequest
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
        if ($this->isMethod('post')) {


            return [

                'name' => 'required|min:4|string',
                'label' => 'required|string',

            ];
        } else {


            return [


                'name' => 'required|min:4|string',
                'label' => 'required|string',


            ];
        }
    }

}
