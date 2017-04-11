<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompetitionRequest extends FormRequest
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
          'name'            => 'required',
          'start_date'      => 'required',
          'privacy'         => 'required',
          'min_user'        => 'required',
          'max_user'        => 'required',
          'entry_cost'      => 'required',
          'award'           => 'required',
          'sport'           => 'required',
          'championship'    => 'required',
          'type_journal'    => 'required',
          'type_play'       => 'required',
        ];
    }
}
