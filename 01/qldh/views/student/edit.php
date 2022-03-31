

    <div class="container">
      <h3>SỬA SINH VIÊN</h3>
      <form action="index.php?module=student&action=update&id=<?php echo $student['id']; ?>" method="POST">
        <div class="mb-3">
          <div class="mb-3 row">
            <label for="inputFullname" class="col-sm-2 col-form-label">Họ tên</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputFullname" name="fullname" value="<?php echo $student['fullname']; ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="inputDOB" class="col-sm-2 col-form-label">Ngày sinh</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="inputDOB" name="DOB" value="<?php echo $student['DOB']; ?>">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputSex" class="col-sm-2 col-form-label">Giới tính</label>

            <div class="col-sm-10">

              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="inlineSex1" value="1" <?php echo $student['sex'] ? "checked" : ""; ?>>
                <label class="form-check-label" for="inlineSex1">Nam</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="inlineSex2" value="0" <?php echo $student['sex'] ? "" : "checked"; ?>>
                <label class="form-check-label" for="inlineSex2">Nữ</label>
              </div>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="inputAvatar" class="col-sm-2 col-form-label">Ảnh thẻ</label>
            <div class="col-sm-10">
              <?php
              if (file_exists("./uploads/" . $student['id'] . ".jpg")) {
              ?>
                <img src="<?php echo "./uploads/" . $student['id'] . ".jpg"; ?>" width="75" height="100">
              <?php
              } else {
              ?>
                <img src="./uploads/no_photo.png" width="75" height="100">

              <?php
              }

              ?>
              <input type="file" class="form-control" id="inputAvatar" name="avatar" value="">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputHometown" class="col-sm-2 col-form-label">Quê quán</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputHometown" name="hometown" value="<?php echo $student['hometown']; ?>">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputAddess" class="col-sm-2 col-form-label">Địa chỉ</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputAddess" name="address" value="<?php echo $student['address']; ?>">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $student['email']; ?>">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputPhone" class="col-sm-2 col-form-label">Điện thoại</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPhone" name="phone" value="<?php echo $student['phone']; ?>">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputHobbies" class="col-sm-2 col-form-label">Sở thích</label>
            <div class="col-sm-10">

              <div class="form-check form-check-inline">
                <input name="hobbies[]" class="form-check-input" type="checkbox" id="inlineHobbies1" value="1" <?php echo $student['hobbies'] & 1 ? "checked" : ""; ?>>
                <label class="form-check-label" for="inlineHobbies1">Thể thao</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="hobbies[]" class="form-check-input" type="checkbox" id="inlineHobbies2" value="2" <?php echo $student['hobbies'] & 2 ? "checked" : ""; ?>>
                <label class="form-check-label" for="inlineHobbies2">Du lịch</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="hobbies[]" class="form-check-input" type="checkbox" id="inlineHobbies1" value="4" <?php echo $student['hobbies'] & 4 ? "checked" : ""; ?>>
                <label class="form-check-label" for="inlineHobbies1">Phim ảnh</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="hobbies[]" class="form-check-input" type="checkbox" id="inlineHobbies2" value="8" <?php echo $student['hobbies'] & 8 ? "checked" : ""; ?>>
                <label class="form-check-label" for="inlineHobbies2">Ẩm thực</label>
              </div>

            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputEthnic" class="col-sm-2 col-form-label">Dân tộc</label>
            <div class="col-sm-10">

              <select class="form-select" aria-label="Chọn dân tộc" name="ethnic">
                <option value="1" <?php echo $student['ethnic'] == 1 ? "selected" : ""; ?>>Kinh
                </option>
                <option value="2" <?php echo $student['ethnic'] == 2 ? "selected" : ""; ?>>Tày</option>
                <option value="3" <?php echo $student['ethnic'] == 3 ? "selected" : ""; ?>>Mường</option>
                <option value="4" <?php echo $student['ethnic'] == 4 ? "selected" : ""; ?>>Nùng</option>
              </select>

            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputClass" class="col-sm-2 col-form-label">Lớp</label>
            <div class="col-sm-10">

              <select class="form-select" aria-label="Chọn lớp" name="class">
                <?php

                //$c_rows = Query('Select * from class');
                $c_rows = $classes;

                while ($c_row = mysqli_fetch_array($c_rows)) {
                ?>
                  <option value="<?php echo $c_row['id']; ?>" <?php echo $student['class_id'] == $c_row['id'] ? "selected" : "" ?>>

                    <?php echo $c_row['name']; ?>

                  </option>
                <?php
                }

                ?>

              </select>

            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputDescription" class="col-sm-2 col-form-label">Mô tả</label>
            <div class="col-sm-10">
              <textarea id="inputDescription" class="form-control" name="description"><?php echo $student["description"]; ?></textarea>
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-sm-10">
              <input type="submit" class="form-control-inline" value="Sửa">
              <input type="reset" class="form-control-inline" value="Nhập lại">
            </div>
          </div>
      </form>
    </div>