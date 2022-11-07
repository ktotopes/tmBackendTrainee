<?php

namespace App\Rules;

use Illuminate\Support\Carbon;
use Illuminate\Contracts\Validation\Rule;

class DateFromLessThenDateTo implements Rule
{
    private Carbon $from;
    private Carbon $to;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($from , $to)
    {
        $this->from = Carbon::parse($from);
        $this->to = Carbon::parse($to);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->from >= $this->to){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'DateFrom should be less then dateTo';
    }
}
