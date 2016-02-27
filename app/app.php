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

   /**shows single cuisine**/
   $app->get("/clients/{id}", function($id) use ($app){
       $this_stylist = Stylist::find($id);
       $stylists = $this_stylist->getClients();
       return $app['twig']->render('cuisines.html.twig', array('clients'=> $clients, 'stylist' => $this_stylist));
   });
   return $app;
?>
