<?php
    class Client
    {
        private $client_name;
        private $phone;
        private $email;
        private $stylist_id;
        private $id;

        function __construct($client_name, $phone, $email, $stylist_id, $id = null)
        {
            $this->client_name = $client_name;
            $this->phone = $phone;
            $this->email = $email;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function setClientName($new_client_name)
        {
            $this->client_name = $new_client_name;
        }

        function getPhone()
        {
            return $this->phone;
        }

        function setPhone($new_phone)
        {
            $this->phone = $new_phone;
        }

        function getEmail()
        {
            return $this->email;
        }

        function setEmail($new_email)
        {
            $this->email = $new_email;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
       {
           $GLOBALS['DB']->exec("INSERT INTO clients (name, phone, email, stylist_id) VALUES ('{$this->getClientName()}', '{$this->getPhone()}', '{$this->getEmail()}', {$this->getStylistId()});");
           $this->id = $GLOBALS['DB']->lastInsertId();
       }

       function update($new_client_name, $new_phone, $new_email)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET name = '{$new_client_name}', '{$new_phone}', '{$new_email}' WHERE id = {$this->getId()};");
            $this->setClientName($new_client_name);
            $this->setPhone($new_phone);
            $this->setEmail($new_email);
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $client_name = $client['name'];
                $phone = $client['phone'];
                $email = $client['email'];
                $stylist_id = $client['stylist_id'];
                $id = $client['id'];
                $new_client = new Client($client_name, $phone, $email, $stylist_id, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function find($search_id)
        {
            $found_client = null;
            $clients = Client::getAll();
            foreach ($clients as $client) {
                if ($client->getId() == $search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }

        static function deleteAll()
        {
           $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        function delete()
      {
          $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
      }


    }


 ?>
