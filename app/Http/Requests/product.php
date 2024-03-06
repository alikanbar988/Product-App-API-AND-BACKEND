<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class product extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required|string",
            "qty"=>"required|numeric",
            "price"=>"required|decimal:2",
            "description"=>"required|nullable"
        ];
    }
}
