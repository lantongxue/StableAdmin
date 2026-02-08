<?php

namespace App\Http\Admin\Request\CodeGenerator;

use Hyperf\Validation\Request\FormRequest;

final class SaveTableSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'sometimes',
            'plan_name' =>  'required|string',
            'table_name' =>  'required|string',
            'fields'    =>  'required|array',
            'package_name'  =>  'sometimes|string',
            'menu_name' =>  'sometimes|string',
            'menu_parent_id'    =>  'sometimes',
            'database_connection'   =>  'required|string',
            'api_router_name' => 'string',
            'backend_child_path'=>'string',
            'front_child_path' => 'string',
            'menu_i18n'=>'required|string',
            'menu_router_name'=>'string',
            'is_swagger' => 'required|int'
        ];
    }
}