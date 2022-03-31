<?php
require_once('../classes/Controller.php');
require_once('../models/ClassModel.php');
require_once('../models/StudentModel.php');

class StudentController extends Controller
{

   public function index($id = 0)
   {
      $sql = "select s.id, s.fullname, s.sex, c.name, s.address, year(now())-year(s.DOB) as age from student s inner join class c on s.class_id = c.id;";
      $student = new StudentModel();
      $rows = $student->Query($sql);

      $data["students"] = $rows;

      return $this->view("student_index", $data);
   }

   public function new($id = 0)
   {
      $class = new ClassModel();
      $data["classes"] = $class->getAll();

      return $this->view("student_new", $data);
   }

   public function insert($id = 0)
   {
      $fullname = $_POST["fullname"];
      $DOB = $_POST["DOB"];
      $sex = $_POST["sex"];
      $hometown = $_POST["hometown"];
      $address = $_POST["address"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];

      $hobbies = 0;
      if (isset($_POST["hobbies"]))
         foreach ($_POST["hobbies"] as $value) {
            $hobbies += $value;
         }

      $ethnic = $_POST["ethnic"];
      $class_id = $_POST["class"];
      $description = $_POST["description"];


      //$sql = "insert into student (fullname, DOB, sex, hometown, address, email, phone, hobbies, ethnic, class_id, description) values('$fullname', '$DOB', $sex, '$hometown', '$address', '$email', '$phone', $hobbies, $ethnic, $class_id, '$description')";

      //Query($sql);

      $field[] = 'fullname';
      $field[] = ' DOB';
      $field[] = ' sex';
      $field[] = ' hometown';
      $field[] = ' address';
      $field[] = ' email';
      $field[] = ' phone';
      $field[] = ' hobbies';
      $field[] = ' ethnic';
      $field[] = ' class_id';
      $field[] = ' description';



      $values[] = $fullname;
      $values[] = $DOB;
      $values[] = $sex;
      $values[] = $hometown;
      $values[] = $address;
      $values[] = $email;
      $values[] = $phone;
      $values[] = $hobbies;
      $values[] = $ethnic;
      $values[] = $class_id;
      $values[] = $description;

      $student = new StudentModel();
      $new_id = $student->insert($field, $values);
      //Lấy id của sinh viên vừa được thêm
      // $sql = "select max(id) as id from student";
      // $rows = Query($sql);
      // $row = mysqli_fetch_array($rows);
      // $new_id = $row["id"];

      // Dùng id làm tên ảnh thẻ
      if (isset($_FILES['avatar']))
         move_uploaded_file($_FILES['avatar']["tmp_name"], "./uploads/$new_id.jpg");
      $this->index();
   }

   public function edit($id)
   {
      $student = new StudentModel();
      $data["student"] = $student->getOne($id);

      $class = new ClassModel();
      $data["classes"] = $class->getAll();

      return $this->view("student_edit", $data);
   }

   public function update($id)
   {
      $fullname = $_POST["fullname"];
      $DOB = $_POST["DOB"];
      $sex = $_POST["sex"];
      $hometown = $_POST["hometown"];
      $address = $_POST["address"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];

      $hobbies = 0;
      if (isset($_POST["hobbies"]))
         foreach ($_POST["hobbies"] as $value) {
            $hobbies += $value;
         }

      $ethnic = $_POST["ethnic"];
      $class_id = $_POST["class"];
      $description = $_POST["description"];

      $field[] = 'fullname';
      $field[] = ' DOB';
      $field[] = ' sex';
      $field[] = ' hometown';
      $field[] = ' address';
      $field[] = ' email';
      $field[] = ' phone';
      $field[] = ' hobbies';
      $field[] = ' ethnic';
      $field[] = ' class_id';
      $field[] = ' description';

      $values[] = $fullname;
      $values[] = $DOB;
      $values[] = $sex;
      $values[] = $hometown;
      $values[] = $address;
      $values[] = $email;
      $values[] = $phone;
      $values[] = $hobbies;
      $values[] = $ethnic;
      $values[] = $class_id;
      $values[] = $description;

      $student = new StudentModel();
      $student->update($id, $field, $values);
      if (isset($_FILES['avatar']))
         move_uploaded_file($_FILES['avatar']["tmp_name"], "./uploads/$id.jpg");
      $this->index();
   }

   public function delete($id)
   {
      $student = new StudentModel();

      $student->delete($id);

      if (file_exists("../uploads/$id.jpg"))
         unlink("../uploads/$id.jpg");
      $this->index();
   }

   public function show($id)
   {
   }
}
