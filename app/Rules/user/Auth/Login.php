<?php
namespace App\Rules\user\Auth;


use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class Login implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $User = User::where('email',$value)->first();
        if($User->status ?? '' == User::STATUS[0]){
           return true;
        }else{
           return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Status Is Not Active';
    }
}
