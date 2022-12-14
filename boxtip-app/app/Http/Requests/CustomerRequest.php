<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }

    // public function rules()
    // {
    //     return ['name' => 'required|min:3|max:50']
    //         +
    //         ($this->isMethod('POST') ? $this->store() : $this->update());
    // }

    protected function store()
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            //… more validation

        ];
    }

    protected function update()
    {
        return [
            'email' => 'required|email|unique:users,email,' . $this->user()->id,
            'logo' => 'nullable|image|max:1024',
            'bio' => 'nullable|max:300',
            'github_url' => 'nullable|url'
            //… more validation

        ];
    }
}
