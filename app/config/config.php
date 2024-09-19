<?php

return [

    /*
    |---------------------------------------------------------------------------
    | Application Name
    |---------------------------------------------------------------------------
    |
    | The name of your application.
    |
    */

    'name' => 'Example name client',

    /*
    |---------------------------------------------------------------------------
    | Application Debug Mode
    |---------------------------------------------------------------------------
    |
    | Debug mode for your application, useful for development.
    |
    */

    'debug' => 'TRUE',

    /*
    |---------------------------------------------------------------------------
    | Application Timezone
    |---------------------------------------------------------------------------
    |
    | Default timezone for your application.
    |
    */

    'timezone' => 'UTC',

    /*
    |---------------------------------------------------------------------------
    | Application Locale Configuration
    |---------------------------------------------------------------------------
    |
    | Default locale for your application.
    |
    */

    'locale' => 'pt-br',

    /*
    |---------------------------------------------------------------------------
    | Application Fallback Locale
    |---------------------------------------------------------------------------
    |
    | Fallback locale in case the primary locale is unavailable.
    |
    */

    'fallback_locale' => 'en',

    /*
    |---------------------------------------------------------------------------
    | Encryption Key
    |---------------------------------------------------------------------------
    |
    | Key used for encryption. Should be a random, 32-character string.
    |
    */

    'key' => '6ds5fu6sd5f76gsdf8sd7f56ds765sf7ds76f5sd785',

    'cipher' => 'AES-256-CBC',

    /*
    |---------------------------------------------------------------------------
    | Client Information
    |---------------------------------------------------------------------------
    |
    | Configuration settings specific to the client.
    |
    */

    'client' => [
        'name' => 'Nome do Cliente',
        'contact_email' => 'email@example.com',
        'website' => 'https://example.com.br',
    ],


    /*
    |---------------------------------------------------------------------------
    | Autoloaded Service Providers
    |---------------------------------------------------------------------------
    |
    | List of service providers to be automatically loaded.
    |
    */

    'providers' => [
        // List your service providers here
    ],

    /*
    |---------------------------------------------------------------------------
    | Class Aliases
    |---------------------------------------------------------------------------
    |
    | Array of class aliases to be registered.
    |
    */

    'aliases' => [
        // List your class aliases here
    ],

];
