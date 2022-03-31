<?php

require_once("./classes/Database.php");

class StudentModel extends Databases{
   function __construct()
   {
      parent::__construct();
      $this-> table= 'student';

   }
}

?>