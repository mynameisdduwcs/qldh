<h3>DANH SÁCH SINH VIÊN</h3>
<a href="index.php?module=student&action=new">THÊM SINH VIÊN</a>
<table class="table table-stripped table-bordered">
<?php

$count = 1;
while ($row = mysqli_fetch_array($students)) {
?>


      <tr>
         <td><?php echo $count++; ?></td>
         <td><?php echo $row['fullname']; ?></td>

         <td><?php
               if (file_exists("./uploads/" . $row['id'] . ".jpg")) {
               ?>
               <img src="<?php echo "./uploads/" . $row['id'] . ".jpg"; ?>" width="75" height="100">
            <?php
               } else {
            ?>
               <img src="./uploads/no_photo.png" width="75" height="100">

            <?php
               }

            ?>
         </td>


         <td><?php echo $row['sex'] ? "Nam" : "Nữ"; ?></td>
         <td><?php echo $row['name']; ?></td>
         <td><?php echo $row['address']; ?></td>
         <td><?php echo $row['age']; ?></td>
         <td>
            <a href="index.php?module=student&action=edit&id=<?php echo $row['id']; ?>">Sửa</a> |
            <a href="index.php?module=student&action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có thực sự muốn xoá sinh viên này?')">Xoá</a>
         </td>
      </tr>

   <?php
}
   ?>

   </table>