<?php

namespace App\Http\Requests;

use App\Interfaces\ResourceModel;
use Illuminate\Foundation\Http\FormRequest;

class UpdateResource extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(ResourceModel $model)
    {
        return $this->user()->can($this->get('action'), $model);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(ResourceModel $model)
    {
        return ['action' => 'required|bail', 'resource_type' => 'required|bail|in:' . $model->resource_type] + ($model->rules[$this->get('action')] ?? []);
    }
}
