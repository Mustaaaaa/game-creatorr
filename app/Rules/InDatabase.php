<?php

namespace App\Rules;

use App\Models\Item;
use App\Models\Type;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;


class InDatabase implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // dump($value);
        foreach ($value as $array) {
            $id = $array['id'];

            $item_id = Item::where('id', '=', $id)->first();
            if ($item_id === null) {
                $fail('Invalid Item Id. Do not try to mess up with our code, please.');  
            }          
        }

    }
}


/* Fail

    $data_item = Item::find($id);
*/