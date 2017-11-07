<?php

namespace Jameron\Themes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeRequest extends FormRequest {

    public function messages()
    {
        return [];
    }

    public function authorize()
    {
        $this->request->add([
            'token'	=> sha1( time() . $this->request->get('email') )
        ]);
        return true;
    }

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
                'title'     => 'required|min:1',
                'subtitle'  => 'string',
                'text'      => 'string',
                'heroImage'      => 'image|required',
            ];
        }
        case 'PUT':
        case 'PATCH':
        {
            return [
                'title'     => 'required|min:1',
                'subtitle'  => 'string',
                'text'      => 'string|nullable',
                'heroImage'      => 'image',
            ];
        }
        default: break;
        }
    }
}
