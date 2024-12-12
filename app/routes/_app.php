<?php

use Leaf\Router;

Router::get('/',[
    'MainController@home',
    'name' => 'main.home'
]);

Router::get('/about', [
    'MainController@about',
    'name' => 'main.about'
]);
// pourquoi renommer routes ? Pour les différencier mieux ou pour quand un client veut que l'url soit spécifique, 
//il faut juste changer la route '/xxxx' et en gardant le nom il faut rien changer ailleurs

//ajouter css: au cours utilise le cdn (lien), dans application il faut télécharger sinon si pas internet l'application ne fonctionnera pas
//retélécharger css mais on le met où ? Dans public/css/... 
// dans formulaire <!--fonctionne aussi: <a href='{{route('main.home')}}'>Home</a>-->

//app()->csrf(); // résout problème de csrf dans formulaire create pas nécessaire si dans config/csrf.php on enable CSRF 
//(décommenter cnsrf = true) puis enlever du formulaire create.blade.php la ligne app()->csrf(); car générer automatiquement
//app()->get('/','MainController@home');

//app()->get('/about', 'MainController@about');

app()->get('customers', [
    'CustomerController@index',
    'name' => 'customers.index'
]); 
// avant: app()->get('/customers','CustomerController@index'); 
//et fonctionne aussi 
//Router::get('/customers',['CustomerController@index',
//'name' => 'customers.index
//]);

app()->get('customers/create', [
    'CustomerController@create',
    'name' => 'customers.create']
);
app()->post('customers/create', [
    'CustomerController@store',
    'name' => 'customers.store'
]);

Router::post('customers/delete',[
    'CustomerController@destroy',
    'name' => 'customers.destroy'
]);

Router::get('customers/{CustomerId}/edit', [
    'CustomerController@edit',
    'name' => 'customers.edit'
]); // route typique pour modifier un customer
// besoin d'un id dans la route pour identifier le customer à modifier
// ajouter un parametre en mettant un ?(slug) derriere id mais marche pas pour edit car besoin de id 
Router::post('customers/update/',[
    'CustomerController@update',
    'name' => 'customers.update'
]);
// CRUD de customers terminé

Router::get('employees', [
    'EmployeeController@index',
    'name' => 'employees.index'
]);

Router::get('employees/create', [
    'EmployeeController@create',
    'name' => 'employees.create'
]);

Router::post('employees/create', [
    'EmployeeController@store',
    'name' => 'employees.store'
]);

Router::post('employees/delete',[
    'EmployeeController@destroy',
    'name' => 'employees.destroy'
]);

Router::get('employees/{EmployeeId}/edit', [
    'EmployeeController@edit',
    'name' => 'employees.edit'
]);

Router::post('employees/update/',[
    'EmployeeController@update',
    'name' => 'employees.update'
]);
// CRUD de employees terminé