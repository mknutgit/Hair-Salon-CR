<?php
    class Stylist
    {
        private $name;
        private $id;

        function __contstuct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function setName($new_name)
        {
            $this_name = (string) $new_name;
        }

        function getName()
        {
            return $this->type;
        }

        function getid()
        {
            return $this->id;
        }

        function save()
        
    }

 ?>
