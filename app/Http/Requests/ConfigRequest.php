<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'name' => 'required|string',
            'slug' => 'required|string|unique:b_c_a_test_configs,slug|in:' . $this->processDataConfigSlug(),
            'value' => 'required|string',
        ];
    }

    /**
     * @return string
     */
    protected function processDataConfigSlug(){
        $stringSlug = '';
        foreach (switchStringSlugToArraySlug() as $key => $slug){
            $stringSlug .= ',' . $key;
        }
        return $stringSlug;
    }
}
