<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
      switch ($this->method()) {
        case 'POST':
          {
            return [
              'name'      => 'required|string|max:255',
              'email'     => 'required|string|email|max:255|unique:users',
              'role_id'   => 'required|integer|max:3|min:1',
              'password'  => 'required|string|min:6|confirmed',
              'is_active' => 'integer|max:1|min:0',
            ];
          }
          break;
        case 'PATCH':
           {
             return [
               'name'      => 'required|string|max:255',
               'email'     => 'required|email|string|max:255|unique:users,email,'.$this->get('id'),
               'role_id'   => 'required|integer|max:3|min:1',
               'password'  => 'confirmed',
               'is_active' => 'integer|max:1|min:0',
             ];
           }
           break;
        case 'DELETE':
          {
            return [];
          }
          break;
        default:break;
      }
    }
}
