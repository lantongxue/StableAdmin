<?php

namespace App\Http\Admin\Request\CodeGenerator;

use Hyperf\Validation\Request\FormRequest;

final class PreviewAndGeneratorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer',
        ];
    }
}