<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
                  'title' => 'required|string|max:255|',
                  'content' => 'required|string|max:10000'
              ];
            }
            break;
          case 'PATCH':
            {
              return [
                  'title' => 'required|string|max:255|',
                  'content' => 'required|string|max:10000'
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
