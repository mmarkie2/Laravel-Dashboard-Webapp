<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class DashboardChoseRequest extends FormRequest
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
        $dashboards=DB::table('dashboards') ->where('user_id', '=',  \Auth::user()->id)->get();
        $idsString="";
        foreach ($dashboards as $value)
        {
            $idsString.= $value->id.'|';
        }
        $idsString=   substr($idsString, 0, -1);
        return [
            "dashboard_id" =>  ['required', 'regex:/('.$idsString.')/']
        ];
    }
}
