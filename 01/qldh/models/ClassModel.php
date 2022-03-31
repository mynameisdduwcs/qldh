<?php

require_once("./classes/Database.php");

class ClassModel extends Databases{
   function __construct()
   {
      parent::__construct();
      $this-> table= 'class';

   }
}

?>