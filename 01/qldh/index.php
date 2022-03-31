<?php
session_start();
/*

//if(!isset($_COOKIE['logged_in'])|| $_SESSION['logged_in'] != true)
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true)
  header('Location:login.php');
*/

require_once('./models/ClassModel.php');
require_once('./models/StudentModel.php');

// function Query($sql)
// {

//   $conn = mysqli_connect("localhost:3306", "root", "") or die("Lỗi kết nối!");

//   mysqli_select_db($conn, "qldh") or die("Lỗi CSDL!"); // Chọn CSDL

//   $result = mysqli_query($conn, $sql); // Truy vấn dữ liệu

//   mysqli_close($conn); //Đóng kết nối

//   return $result;
// }

if (isset($_GET['module']))
  $module = $_GET['module'];
else
  $module = "";

if (isset($_GET['action']))
  $action = $_GET['action'];
else
  $action = "";

if (isset($_GET['id']))
  $id = $_GET['id'];
else
  $id = 0;

  $module = ucfirst($module); // Student
  $controllerName = $module."Controller";// StudentController

  require_once("./controllers/$controllerName.php");

  $controller =new $controllerName();
  if(method_exists($controller, $action))
  $controller -> $action($id);
  else$controller ->index();
