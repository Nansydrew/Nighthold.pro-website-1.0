<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;

class VerifyEmailException extends ValidationException
{

    public static function forUser($user)
    {
        return static::withMessages([
            'email' => [__('You must :linkOpen verify :linkClose your email first.', [
                'linkOpen' => '<a href="/email/resend?email='.urlencode($user->email).'">',
                'linkClose' => '</a>',
            ])],
        ]);
    }
}
