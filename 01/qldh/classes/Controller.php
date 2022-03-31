<?php
class Controller
{

   public function index()
   {
   }

   public function new()
   {
   }

   public function insert()
   {
   }

   public function edit($id)
   {
   }

   public function update($id)
   {
   }

   public function delete($id)
   {
   }

   public function show($id)
   {
   }

   public function view($viewName, $data)
   {
      //$viewName="student_index"

      //$data["student"]=$students;    // =>$students= data["students"]
      //$data["classes"]=$classes;

      $arrName = explode("_", $viewName);

      $fileName = "./views/".implode("/",$arrName).".php"; //views/studen/index

      extract($data);//chuyển một mảng thànhh cách biến


      require_once("../views/templates/header.php");

      require_once($fileName);
      
      require_once("../views/templates/footer.php");

   }
}
