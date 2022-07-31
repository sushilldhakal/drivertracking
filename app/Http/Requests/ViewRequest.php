<?php

namespace App\Http\Requests;

use App\Interfaces\ResourceModel;
use Illuminate\Foundation\Http\FormRequest;

class ViewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(ResourceModel $model)
    {
        return $this->user()->can($this->resource_action, $this->route('resource') ?? $model);
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
}
