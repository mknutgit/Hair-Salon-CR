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
        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

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

        function test_save()
        {
            //Arrange
            $client_name = "Bill";
            $phone = "1234567890";
            $email = "m@gmail.com";
            $stylist_id = 1;
            $id = null;

            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);
            $test_client->save();
            //Act
            $result = Client::getAll();
            //Assert
            $this->assertEquals($test_client, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $client_name = "Bill";
            $phone = "1234567890";
            $email = "m@gmail.com";
            $stylist_id = 1;
            $id = null;
            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);
            $test_client->save();

            $client_name2 = "Jim";
            $phone2 = "1234567890";
            $email2 = "g@gmail.com";
            $stylist_id2 = 2;
            $id2 = 2;
            $test_client2 = new Client($client_name2, $phone2, $email2, $stylist_id2, $id2);
            $test_client2->save();
            //Act
            $result = Client::getAll();
            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Sally";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client_name = "Harry";
            $phone = "1234567890";
            $email = "m@gmail.com";
            $stylist_id = $test_stylist->getId();

            $client_name2 = "Tom";
            $phone2 = "1234567890";
            $email2 = "t@gmail.com";
            $stylist_id2 = $test_stylist->getId();

            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);
            $test_client->save();
            $test_client2 = new Client($client_name2, $phone2, $email2, $stylist_id, $id);
            $test_client2->save();
            //Act
            Client::deleteAll();
            //Assert
            $result = Client::getAll();

            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $name = "Sally";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client_name = "Harry";
            $phone = "1234567890";
            $email = "m@gmail.com";
            $stylist_id = $test_stylist->getId();

            $client_name2 = "Tom";
            $phone2 = "1234567890";
            $email2 = "t@gmail.com";
            $stylist_id2 = $test_stylist->getId();
            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);
            $test_client->save();
            $test_client2 = new Client($client_name2, $phone2, $email2, $stylist_id, $id);
            $test_client2->save();
            //Act
            $result = Client::find($test_client->getId());
            //Assert
            $this->assertEquals($test_client, $result);
        }

        function test_updateClientName()
       {
           //Arrange
           $client_name = "Harry";
           $phone = "1234567890";
           $email = "m@gmail.com";
           $stylist_id = 1;
           $id = null;

           $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);
           $test_client->save();

           $new_name = "Matt";
           //Act
           $test_client->updateClientName($new_name);
           //Assert
           $this->assertEquals("Matt", $test_client->getClientName());
       }


    }


 ?>
