<?php

return [
    // ...existing validation messages...

    'password' => 'The :attribute must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.',

    'email' => 'The :attribute must be a valid email address.',
    'email.unique' => 'The :attribute has already been taken.',
    'email.exists' => 'The selected :attribute is invalid.',
    'email.required' => 'The :attribute field is required.',
];
