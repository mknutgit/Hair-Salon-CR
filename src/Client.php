<?php
    class client
    {
        private $client_name
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
            $this->id - $id;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function setClientName()
        {
            $this->client_name = (string) $new_client_name;
        }

        function getPhone()
        {
            return $this->phone;
        }

        function setPhone()
        {
            $this->phone = $new_phone;
        }

        function getEmail()
        {
            return $this->email;
        }

        function setEmail()
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
    }


 ?>
