Compile Code

1. open git bash
2. Install Laravel 8 : composer create-project laravel/laravel POS1

. cd POS1

php artisan serve

3. edit connection .env to connect to your DB file on root laravel

4. using bootstrap UI install pacakge : composer require laravel/ui  -> npm install && npm run dev


	// Generate basic scaffolding...
php artisan ui bootstrap
php artisan ui vue
php artisan ui react

// Generate login / registration scaffolding...
php artisan ui bootstrap --auth
php artisan ui vue --auth
php artisan ui react --auth



if npm install error  follow & this script :


I don't know especially if it will fix your problem but you can try this, It worked for me:

Delete manually directory npm and npm-cache in ...AppData/Roaming
Run in your terminal npm cache clean --force
Install your package npm install -g @angular/cli
Good work =)


-- npm install && npm run dev

5. php artisan storage:link


// membuat cart system :

1. php artisan make:livewire Cart

CLASS: app/Http/Livewire//Cart.php
VIEW:  D:\web\LV\POS1\resources\views/livewire/cart.blade.php


2. Install Cart untuk POS1 pacakge
	link : https://github.com/darryldecode/laravelshoppingcart 
	composer require "darryldecode/cart"

	add to provider :

	Darryldecode\Cart\CartServiceProvider::class

	and alias :

	'Cart' => Darryldecode\Cart\Facades\CartFacade::class

	












