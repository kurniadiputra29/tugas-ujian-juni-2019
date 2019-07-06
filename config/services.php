<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],


    'github' => [
        'client_id' => '9fc8f111c47fa49eb990',
        'client_secret' => 'fc66f27806a74037160cdfb14b2c716c961981b9',
        'redirect' => 'http://localhost:8000/social-media/registered/github',
    ],

    'google' => [
        'client_id' => '533718613553-4js0ng9490d1djamc8584ei0tilpsjts.apps.googleusercontent.com',
        'client_secret' => 'APto9hy27N61tJCBRnUF4Vbr',
        'redirect' => 'http://localhost:8000/social-media/registered/google',
    ],

    'facebook' => [
        'client_id' => '855038064864592',
        'client_secret' => '2caf79b4201deec1fa589bbf1be3cf6a',
        'redirect' => 'http://localhost:8000/social-media/registered/facebook',
    ],

    'bitbucket' => [
        'client_id' => env('BITBUCKET_KEY'),
        'client_secret' => env('BITBUCKET_SECRET'),
        'redirect' => env('BITBUCKET_CALLBACK_URL'),
    ],

    'linkedin' => [
        'client_id' => env('LINKEDIN_KEY'),
        'client_secret' => env('LINKEDIN_SECRET'),
        'redirect' => env('LINKEDIN_CALLBACK_URL'),
    ],
];
