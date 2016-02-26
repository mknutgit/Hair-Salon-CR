<<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    require_once 'src/Stylist.php';

    class StylistTest extends PHPunit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
        }

        function test_getName()
        {
            $name = "Sally";
            $test_name = new Stylist($name);

            $result = $test_name->getName();

            $this->assertEquals("Sally", $result);
        }

        function test_getId()
       {
           //Arrange
           $name = "Sally";
           $id = 1;
           $test_stylist = new Stylist($name, $id);
           //Act
           $result = $test_stylist->getId();
           //Assert
           $this->assertEquals(true, is_numeric($result));
       }

    }


 ?>
