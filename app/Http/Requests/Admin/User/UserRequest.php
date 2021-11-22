<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => 'required|min:9|confirmed|string',
                'status' => 'required|numeric|in:0,1'

            ];
        } else {


            return [


                'name' => 'required|min:4|string',
                'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)],
                'password' => 'sometimes|required|min:9|confirmed|string',
                'status' => 'required|numeric|in:0,1'


            ];
        }
    }


    protected function prepareForValidation()
    {
        if ($this->password == null) {
            $this->request->remove('password');
        }
    }
}
