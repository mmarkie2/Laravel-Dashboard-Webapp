<?php

namespace App\Http\Requests;

use App\Models\Dashboard;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $dashboard_id = $this->input("dashboard_id");

        return Dashboard::find($dashboard_id)->user_id == $this->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "dashboard_id"=>"integer",
            "title" => 'string|min:1|max:50',
            "contents" => 'string|min:1|max:50'
        ];
    }
}
