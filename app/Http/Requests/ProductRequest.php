<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
//            'cate_id' => 'required|exists:categories,common_id',
//            'price' => 'required|min:1|alpha_num',
//            'quantity' => 'integer',
//            'status' => 'integer',
//            'note' => 'string'
        ];
    }
}
