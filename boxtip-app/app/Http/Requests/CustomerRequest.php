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
            'name' => ['required'],
            'birth_date' => ['required'],
            'is_male' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'district' => ['required'],
            'is_new_to_taobao' => ['required'],
            'regular_bought_product_id' => ['required'],
            'service_consideration_id' => ['required'],
        ] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store()
    {
        return [];
    }

    protected function update()
    {
        return [];
    }
}
