<?php

namespace App\Http\Requests;

use App\Models\Dashboard;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class DashboardRequest extends FormRequest
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
            "name" => 'string|min:1|max:50'
        ];
    }
}
