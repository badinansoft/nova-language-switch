
## A Laravel Nova Tool to add language switcher to your application
[![Latest Version on Packagist](https://img.shields.io/packagist/v/badinansoft/nova-language-switch.svg?style=flat-square)](https://packagist.org/packages/badinansoft/nova-language-switch)
[![Total Downloads](https://img.shields.io/packagist/dt/badinansoft/nova-language-switch.svg?style=flat-square)](https://packagist.org/packages/badinansoft/nova-language-switch)

This [Nova](https://nova.laravel.com) tool lets you:
  - Add a Language switcher to the header of the nova application.
  - Handle Switch language and put the current locale to Laravel cache to remember language from multiple browsers.
  - Switch the direction of the application based on the RTL-supported application written in config.
 
 ## Requirements
  - `php: >=8.0`
  - `laravel/nova: ^4.0`
  
	> 	   Note: This package dose't work with nova 3

## Features
- Add multiple languages from the config.
- Remember set local based on cache no need to save in the database table
-  Auto inject to the header of the application 
- Just 4 steps to setup

## Screenshot
|![enter image description here](https://raw.githubusercontent.com/badinansoft/nova-language-switch/master/docs/en-screenshot.png)  |![enter image description here](https://raw.githubusercontent.com/badinansoft/nova-language-switch/master/docs/ar-screenshot.png) |


## Installation

You can install the nova tool in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require badinansoft/nova-language-switch
```

Next up, you must register the tool with Nova. This is typically done in the `tools` method of the `NovaServiceProvider`.
  
```php
// in app/Providers/NovaServiceProvider.php

// ...

public function tools()
{
    return [
        // ...
        new \Badinansoft\LanguageSwitch\LanguageSwitch(),
    ];
}
```


Next up,  must you publish the config file with for add your languages:
```bash
php artisan vendor:publish --provider="Badinansoft\LanguageSwitch\ToolServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php

<?php  
  
return [  
  
	/**  
	 * List of languages that your application supports 
	 * array <string,  string>  
	 */  
	 'supported-languages' => [  
		  'en' => 'English',  
		  'ar' => 'Arabic',  
		  //here you can add new lanaguage or remove language that you need by 'local'=>'Label'
	 ],  
  
	/**  
	 * Languages That need RTL support 
	 *  string 
	 * */  
	'rtl-languages' => [  
		  'ar'  
		  //here put that language that need support RTL just put local of the language like this example for arabic 
		 
	 ],  
  
];
```


Finally you should register middleware This is typically done in the `$middlewareGroups` property of the `Http/Kernel` in **web** group.
 
 ```php
	/**  
	*  The application's route middleware groups. 
	*  @var array<string, array<int, class-string|string>>  
	*/  
	protected $middlewareGroups = [  
	  'web' => [  
			  //...
			  \Badinansoft\LanguageSwitch\Http\Middleware\LanguageSwitch::class  
	  ],
	  //...
	];
```

## Credits

- [Shahab Zebari](https://github.com/shahabzebare)
- [All Contributors](../../contributors)
 

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
