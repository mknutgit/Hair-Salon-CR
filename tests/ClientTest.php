<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Stylist.php';
    require_once 'src/Client.php';

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPunit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Client::deleteAll();
        // }

        function test_getClientName()
        {
            $client_name = "Bill";
            $phone = "1234567890";
            $email = "m@gmail.com";
            $stylist_id = 1;
            $id = 1;

            $test_client_name = new Client($client_name, $phone, $email, $stylist_id);

            $result = $test_client_name->getClientName();

            $this->assertEquals("Bill", $result);
        }

        function test_getId()
        {
            $name = "Sally";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client_name = "Bill";
            $phone = "1234567890";
            $email = "m@gmail.com";
            $stylist_id = 1;

            $test_client_name = new Client($client_name, $phone, $email, $stylist_id, $id);
            $test_client_name->save();

            $result = $test_client_name->getId();

            $this->assertEquals(true, is_numeric($result));


        }

    }


 ?>
