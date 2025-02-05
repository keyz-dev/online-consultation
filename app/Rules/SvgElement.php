<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SvgElement implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Regular expression to validate an SVG element
        $regex = '/^<svg\b[^>]*>(.*?)<\/svg>$/si';

        if (!is_string($value) || !preg_match($regex, $value)) {
            $fail('The :attribute must be a valid SVG element');
        }
    }
}
