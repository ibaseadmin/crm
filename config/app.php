<?php

return [
    Illuminate\Foundation\Providers\FoundationServiceProvider::class,

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    /*
    |--------------------------------------------------------------------------
    | Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Available Locales
    |--------------------------------------------------------------------------
    |
    | Here you may specify the locales that your application supports.
    |
    */
    'available_locales' => [
        'en' => 'English',
        'ro' => 'Română',
        // Adaugă alte limbi aici
    ],
    
    

    'providers' => [
        // Laravel Framework Service Providers...
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,   

         // Service Provider pentru DomPDF
         Barryvdh\DomPDF\ServiceProvider::class,
        ],

        'aliases' => [
            // Alte alias-uri...
 
            'App' => Illuminate\Support\Facades\App::class,
            'Arr' => Illuminate\Support\Arr::class,
            'Artisan' => Illuminate\Support\Facades\Artisan::class,
            'Auth' => Illuminate\Support\Facades\Auth::class,
            'Blade' => Illuminate\Support\Facades\Blade::class,
            'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
            'Bus' => Illuminate\Support\Facades\Bus::class,
            'Cache' => Illuminate\Support\Facades\Cache::class,
            'Config' => Illuminate\Support\Facades\Config::class,
            'Cookie' => Illuminate\Support\Facades\Cookie::class,
            'Crypt' => Illuminate\Support\Facades\Crypt::class,
            'DB' => Illuminate\Support\Facades\DB::class,
            'Eloquent' => Illuminate\Database\Eloquent\Model::class,
            'Event' => Illuminate\Support\Facades\Event::class,
            'File' => Illuminate\Support\Facades\File::class,
            'Gate' => Illuminate\Support\Facades\Gate::class,
            'Hash' => Illuminate\Support\Facades\Hash::class,
            'Http' => Illuminate\Support\Facades\Http::class,
            'Lang' => Illuminate\Support\Facades\Lang::class,
            'Log' => Illuminate\Support\Facades\Log::class,
            'Mail' => Illuminate\Support\Facades\Mail::class,
            'Notification' => Illuminate\Support\Facades\Notification::class,
            'Password' => Illuminate\Support\Facades\Password::class,
            'Queue' => Illuminate\Support\Facades\Queue::class,
            'Redirect' => Illuminate\Support\Facades\Redirect::class,
            'Request' => Illuminate\Support\Facades\Request::class,
            'Response' => Illuminate\Support\Facades\Response::class,
            'Route' => Illuminate\Support\Facades\Route::class,
            'Schema' => Illuminate\Support\Facades\Schema::class,
            'Session' => Illuminate\Support\Facades\Session::class,
            'Storage' => Illuminate\Support\Facades\Storage::class,
            'Str' => Illuminate\Support\Str::class,
            'URL' => Illuminate\Support\Facades\URL::class,
            'Validator' => Illuminate\Support\Facades\Validator::class,
            'View' => Illuminate\Support\Facades\View::class,
 
            // Alias pentru DomPDF
            'PDF' => Barryvdh\DomPDF\Facade::class,
        ],
 
];
