<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;



class VerifyDate implements ValidationRule
{
   
    
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
       
        $date = Carbon::parse($value);

        
        if ($date->isFuture()) {
            $fail("The $attribute must not be a future date.");
        }

        
        $eighteenYearsAgo = now()->subYears(18);

       
        if ($date->greaterThan($eighteenYearsAgo)) {
            $fail("The $attribute must be at least 18 years ago.");
        }
    }
}
