<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";

    $app = new Silex\Application();
    $server = 'mysql:host=localhost;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    /**home page**/
   $app->get("/", function() use ($app) {
       return $app['twig']->render('index.html.twig', array('stylists'=> Stylist::getAll()));
   });

   /*post stylists*/
   $app->post("/stylists", function() use ($app){
       $stylist = new Stylist($_POST['name']);
       $stylist->save();
       return $app['twig']->render('index.html.twig', array('stylists'=> Stylist::getAll()));
   });

   /**shows single stylist**/
   $app->get("/stylists/{id}", function($id) use ($app){
       $this_stylist = Stylist::find($id);
       $clients = $this_stylist->getClients();
       return $app['twig']->render('stylists.html.twig', array('clients' => $clients, 'stylist' => $this_stylist));
   });

   /* add clients */
    $app->post("/clients/{id}", function($id) use ($app) {
        $client_name = $_POST['name'];
        $phone = $_POST['phone'];
        $email= $_POST['email'];
        $stylist_id = $id;
        $client = new Client($client_name, $phone, $email, $stylist_id);
        $client->save();
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylists.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });








   return $app;
?>
