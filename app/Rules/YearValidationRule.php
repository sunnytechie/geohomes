<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class YearValidationRule implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/^\d{4}$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid year format (YYYY).';
    }
}
