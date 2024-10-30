<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Myrule implements ValidationRule
{
    public function __construct($n)
    {
        $this->num = $n;
    }
    public function passes($attribute,$value)
    {
        return $value % $this->num == 0;
    }
    public function message()
    {
        return $this->num . 'で割り切れる値が必要です。';
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
           if (!$this->passes($attribute, $value)) {
            $fail($this->message());
        }
    }
}
