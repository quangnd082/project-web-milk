<p>Thêm sản phẩm</p>
<center>
  <form method="post" action="modules/quanlysanpham/xuly.php" enctype="multipart/form-data">
    <table class="table table-bordered border-primary" style="text-align: center;">
      <thead>
        <tr>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Mã sản phẩm</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col">Giá sản phẩm</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Tóm tắt</th>
          <th scope="col">Nội dung</th>
          <th scope="col">Danh mục sản phẩm</th>
          <th scope="col">Tình trạng</th>
          <th scope="col">Giảm giá</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="input-group flex-nowrap">
              <input type="text" class="form-control" placeholder="Tên sản phẩm" aria-label="Tên sản phẩm" name="tensanpham" aria-describedby="addon-wrapping">
            </div>
          </td>
          <td>
            <div class="input-group flex-nowrap">
              <input type="text" class="form-control" placeholder="Mã sản phẩm" aria-label="Mã sản phẩm" name="masanpham" aria-describedby="addon-wrapping">
            </div>
          </td>
          <td>
            <div class="input-group flex-nowrap">
              <input type="file" class="form-control" placeholder="Hình ảnh" aria-label="Hình ảnh" name="hinhanh" aria-describedby="addon-wrapping">
            </div>
          </td>
          <td>
            <div class="input-group flex-nowrap">
              <input type="text" class="form-control" placeholder="Giá sản phẩm" aria-label="Giá sản phẩm" name="giasanpham" aria-describedby="addon-wrapping">
            </div>
          </td>
          <td>
            <div class="input-group flex-nowrap">
              <input type="text" class="form-control" placeholder="Số lượng" aria-label="Số lượng" name="soluong" aria-describedby="addon-wrapping">
            </div>
          </td>
          <td>
            <textarea rows='5' name="tomtat" style="resize: none"></textarea>
          </td>
          <td>
            <textarea rows='5' name="noidung" style="resize: none"></textarea>
          </td>
          <td>
            <select name="danhmuc" id="">
              <?php
              $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
              $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
              while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
              ?>
                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['ten_danhmuc'] ?></option>
              <?php
              }
              ?>
            </select>
          </td>
          <td>
            <select name="tinhtrang" id="">
              <option value="0">Thường</option>
              <option value="1">Khuyến mãi</option>
              <option value="2">Nổi bật</option>
            </select>
          </td>
          <td>
            <div class="input-group flex-nowrap">
              <input type="text" class="form-control" placeholder="Giảm giá" aria-label="Giảm giá" name="giamgia" aria-describedby="addon-wrapping">
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="9">
            <div class="col-12">
              <button class="btn btn-primary" type="submit" name="themsanpham">Submit form</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</center>