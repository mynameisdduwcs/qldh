<div class="container">
      <h3>THÊM SINH VIÊN</h3>
      <form action="index.php?module=student&action=insert" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <div class="mb-3 row">
            <label for="inputFullname" class="col-sm-2 col-form-label">Họ tên</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputFullname" name="fullname" value="">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="inputDOB" class="col-sm-2 col-form-label">Ngày sinh</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="inputDOB" name="DOB" value="">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputSex" class="col-sm-2 col-form-label">Giới tính</label>

            <div class="col-sm-10">

              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="inlineSex1" value="1">
                <label class="form-check-label" for="inlineSex1">Nam</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="inlineSex2" value="0">
                <label class="form-check-label" for="inlineSex2">Nữ</label>
              </div>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="inputAvatar" class="col-sm-2 col-form-label">Ảnh thẻ</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="inputAvatar" name="avatar" value="">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="inputHometown" class="col-sm-2 col-form-label">Quê quán</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputHometown" name="hometown" value="">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputAddess" class="col-sm-2 col-form-label">Địa chỉ</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputAddess" name="address" value="">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail" name="email" value="">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputPhone" class="col-sm-2 col-form-label">Điện thoại</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPhone" name="phone" value="">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputHobbies" class="col-sm-2 col-form-label">Sở thích</label>
            <div class="col-sm-10">

              <div class="form-check form-check-inline">
                <input name="hobbies[]" class="form-check-input" type="checkbox" id="inlineHobbies1" value="1">
                <label class="form-check-label" for="inlineHobbies1">Thể thao</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="hobbies[]" class="form-check-input" type="checkbox" id="inlineHobbies2" value="2">
                <label class="form-check-label" for="inlineHobbies2">Du lịch</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="hobbies[]" class="form-check-input" type="checkbox" id="inlineHobbies1" value="4">
                <label class="form-check-label" for="inlineHobbies1">Phim ảnh</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="hobbies[]" class="form-check-input" type="checkbox" id="inlineHobbies2" value="8">
                <label class="form-check-label" for="inlineHobbies2">Ẩm thực</label>
              </div>

            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputEthnic" class="col-sm-2 col-form-label">Dân tộc</label>
            <div class="col-sm-10">

              <select class="form-select" aria-label="Chọn dân tộc" name="ethnic">
                <option value="1">Kinh</option>
                <option value="2">Tày</option>
                <option value="3">Mường</option>
                <option value="4">Nùng</option>
              </select>

            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputClass" class="col-sm-2 col-form-label">Lớp</label>
            <div class="col-sm-10">

              <select class="form-select" aria-label="Chọn lớp" name="class">
                <?php

                $c_rows = $classes;

                while ($c_row = mysqli_fetch_array($c_rows)) {
                ?>
                  <option value="<?php echo $c_row['id']; ?>"><?php echo $c_row['name']; ?></option>
                <?php
                }

                ?>

              </select>

            </div>
          </div>


          <div class="mb-3 row">
            <label for="inputDescription" class="col-sm-2 col-form-label">Mô tả</label>
            <div class="col-sm-10">
              <textarea id="inputDescription" class="form-control" name="description"></textarea>
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-sm-10">
              <input type="submit" class="form-control-inline" value="Thêm">
              <input type="reset" class="form-control-inline" value="Nhập lại">
            </div>
          </div>
      </form>
    </div>