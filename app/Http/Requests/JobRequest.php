<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Jobs;

class JobRequest extends FormRequest
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
                "title" => "required|string|max:255",
                "location" => "required|string|max:255",
                "salary" => "required|numeric|min:5000",
                "description" => "required|string",
                "category" => "required|in:". implode(",", Jobs::getCategories()),
                "experience" => "required|in:". implode(",", Jobs::getExperienceLevels()),
        ];
    }
}
