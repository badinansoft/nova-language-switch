## A Laravel Nova Tool to add language switcher to your application

This [Nova](https://nova.laravel.com) tool lets you:
  - Add switcher to header of the nova application.
  - Handel Swithch language and put current local to laravel cache for remember lanauge from multipe browser.
  - Switch dirction of the application based of RTL supported application that writed in config.
 
 ## Requirements
  - `php: >=8.0`
  - `laravel/nova: ^4.0`
  
	> 	   Note: This package dose't work with nova 3

## Features
- Add multipe languages from config
- Remember set local beased on cache no need save in database table
-  Auto inject to header of the application 
- Just 4 step to setup

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
