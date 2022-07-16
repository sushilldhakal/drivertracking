<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResource extends FormRequest
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
        return ['resource_type' => 'required|bail|in:' . implode(',', array_keys(config('resource.types')))] + $this->pickSpecificRules($this->get('resource_type'));
    }

    public function pickSpecificRules($type)
    {
        return $this->setOfRules()[$type] ?? [];
    }

    public function setOfRules()
    {
        return [
            'log' => [
                'location_id' => 'nullable',
                'type' =>'required',
                'image' => 'nullable',
            ],
            'driver'=>[
                'pin'=>'unique:users',
                'email'=>'unique:users',
                'role'=>'in:driver',
            ]
        ];
    }
}
