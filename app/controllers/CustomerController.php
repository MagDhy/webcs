<?php

namespace App\Controllers;

use App\Models\Customer;


class CustomerController extends Controller
{
    public function index()
    {
        $titre = 'Customers';
        //$customers = Customer::select('Firstname', 'Lastname', 'City')->where('City','Oslo')->get(); 
        $customers = Customer::select('Firstname', 'Lastname', 'City', 'CustomerId')->orderBy('CustomerId', 'DESC')->get(); 
        //utilise le orm pour faire un select * from customers ...

        render('customer.index', ['titre'=>$titre, 'customers'=>$customers]); 
        // ou à la place du tableau: compact('titre', 'customers');
    }

    // ajouter un customer / créer
    // 1) créer méthode pour renvoyer vers une vue: un formulaire

    public function create()
    {
        $customer = new Customer(); //on crée un nouveau customer (add nouveau)
        //creer nouveau fichier dans vues  _form.blade.php
        render('customer.create', ['customer'=>$customer]);
    }

    
    // ajouter fonction pour récupérer les données de create dans la bdo
    // pas besoin de vue mais besoin de route
    public function store()
    {
        // request va permettre de valider les données
        // dd($_POST); //éviter car $_ ... ce sont des super global, on essaie de les utiliser car elles vont disparaitre plus tard
        // dd(request()->postData()); //doc de leaf est dans les méthodes
        // faudra enlever le token du tableau pour envoyer le tableau directment
        // noms dans formulaire et ici doivent tous etre les même que ceux de la DBO

        $data = request()->postData();
        $customer = new Customer(); //crée new customer, en renvoyant au modèle (donc à la classe de la table (une instance)
        $customer->Firstname = $data['Firstname'];
        $customer->Lastname = $data['Lastname'];
        $customer->City = $data['City'];
        $customer->Email = $data['Email'];
        // quand j'appelle save() alors il envoie dans la base de donnée (fait en sql INSERT INTO ... VALUES ...)
        $customer->save(); 
        // bien ajouté on le voit dans la vue  des customers 
        response()->redirect('/customers'); // response methode crée des singletons ou factories de la class Response

    }

    // first faire route edit, puis ajouter dans customers/index.blade.php un boutton edit avec route avec id
    public function edit(int $CustomerId){
       $customer = Customer::find($CustomerId);
       //dd($customer); //debug pour voir si customer est bien trouvé
    //    if(!$customer){
    //        response()->redirect('/customers');
    //    }
       render('customer.edit', compact('customer')); 
       // render('customer.edit', ['customer'=>$customer]);  // mm chose

       // add save no becaause il faut vérifier data dans method update()
        // add redirect to customers no car we don't handle the data here
        // dans travail ajouter la partie 'if not customer' pour prendre en compte les erreurs sans planter le site
    }

    public function update(){
        $data = request()->postData();
        $customer = Customer::find($data['CustomerId']);
        $customer->Firstname = $data['Firstname'];
        $customer->Lastname = $data['Lastname'];
        $customer->City = $data['City'];
        $customer->Email = $data['Email'];
        $customer->save();
        response()->redirect(route('customers.index')); // redirect to customers page after updating a customer.
    }

    // delete: first make route in _app.php then make form in customers/index.blade.php with route 
    // then make method in CustomerController.php
    // quand utilise un post plutot qu'un get pour ne pas mettre parametre dans la route, besoin d'un formulaire pour récupérer le customerId
    public function destroy(){
        $data = request()->postData();
        //dd($data);
        $customer = Customer::find($data['CustomerId']);
        //dd($customer);

        //if($customer){
        $customer->delete(); // == delete FROM customers WHERE customerId = $data['CustomerId']
        //}
        response()->redirect(route('customers.index'));  // redirect to customers page after deleting a customer.  
        //response methode crée des singletons ou factories de la class Response
    }
}
