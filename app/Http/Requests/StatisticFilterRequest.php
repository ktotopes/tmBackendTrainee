<?php

namespace App\Http\Requests;

use App\Rules\DateFromLessThenDateTo;
use Illuminate\Foundation\Http\FormRequest;

class StatisticFilterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'from' => [
                'required',
                'date',
                new DateFromLessThenDateTo($this->input('from'),$this->input('to'))
            ],
            'to'   => 'required|date',

        ];
    }
}
