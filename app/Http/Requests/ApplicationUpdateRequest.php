<?php

namespace App\Http\Requests;

use App\Rules\FurtherToday;

class ApplicationUpdateRequest extends AbstractApplicationRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:64',
            'image' => 'image|max:5000',
            'content' => 'required|string',
            'date' => ['required', 'date', new FurtherToday],
            'status' => 'required|exists:statuses,id',
        ];
    }
}