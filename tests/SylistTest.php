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

       function test_save()
       {
            //Arrange
            $name = "Sally";
            $test_Stylist = new Stylist($name);
            $test_Stylist->save();
            //Act
            $result = Stylist::getAll();
            //Assert
            $this->assertEquals($test_Stylist, $result[0]);
        }

        function test_getAll()
       {
           //Arrange
           $name = "Sally";
           $name2 = "Bill";
           $test_Stylist = new Stylist($name);
           $test_Stylist->save();
           $test_Stylist2 = new Stylist($name2);
           $test_Stylist2->save();
           //Act
           $result = Stylist::getAll();
           //Assert
           $this->assertEquals([$test_Stylist, $test_Stylist2], $result);
       }

       function test_deleteAll()
       {
            //Arrange
            $name = "Sally";
            $name2 = "Bill";
            $test_Stylist = new Stylist($name);
            $test_Stylist->save();
            $test_Stylist2 = new Stylist($name2);
            $test_Stylist2->save();
            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();
            //Assert
            $this->assertEquals([], $result);
        }

        function test_find()
       {
           //Arrange
           $name = "Sally";
           $name2 = "Bill";
           $test_stylist = new stylist($name);
           $test_stylist->save();
           $test_stylist2 = new stylist($name2);
           $test_stylist2->save();
           //Act
           $result = stylist::find($test_stylist->getId());
           //Assert
           $this->assertEquals($test_stylist, $result);
       }


    }


 ?>
