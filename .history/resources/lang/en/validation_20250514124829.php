<?php

return [
    'name' => 'The :attribute must be at least 3 characters long and cannot exceed 50 characters.',
    'name.required' => 'The name field is required.',
    'name.string' => 'The name must be a valid string.',
    'name.min' => 'The name must be at least 3 characters long.',
    'name.max' => 'The name must not exceed 50 characters.',

    'password' => 'The :attribute must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
    'password.required' => 'The password field is required.',
    'password.confirmed' => 'The password confirmation does not match.',
    'password.min' => 'The password must be at least 8 characters long.',
    'password.mixedCase' => 'The password must contain at least one uppercase and one lowercase letter.',
    'password.letters' => 'The password must contain at least one letter.',
    'password.numbers' => 'The password must contain at least one number.',
    'password.symbols' => 'The password must contain at least one special character.',
    'password.uncompromised' => 'The password has been found in a data breach. Please choose a different password.',

    'email' => 'The :attribute must be a valid email address.',
    'email.required' => 'The email field is required.',
    'email.email' => 'The email must be a valid email address.',
    'email.max' => 'The email must not exceed 50 characters.',
    'email.unique' => 'The email has already been taken.',
    'email.exists' => 'The selected :attribute is invalid.',
];
