<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'slug' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
//            'image' => 'required|string',
//            'available' => 'required|boolean',
            'quantity' => 'required|integer',
//            'category_id' => 'required|exists:categories,id',
        ];
    }

    protected function prepareForValidation()
    {
         return $this->merge([
            'slug' => $this->slug ? Str::slug($this->slug) : Str::slug($this->name)
        ]);
    }
}
