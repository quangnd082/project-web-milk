<p>Thêm tin tức</p>
<center>
  <form method="post" action="modules/quanlytintuc/xuly.php" enctype="multipart/form-data">
    <table class="table table-bordered border-primary" style="width:50%; text-align: center;">
      <thead>
        <tr>
          <th scope="col">Tiêu đề tin tức</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col">Liên kết</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="input-group flex-nowrap">
              <input type="text" class="form-control" placeholder="Tiêu đề tin tức" aria-label="Tiêu đề tin tức" name="tieudetintuc" aria-describedby="addon-wrapping">
            </div>
          </td>
          <td>
            <div class="input-group flex-nowrap">
              <input type="file" class="form-control" placeholder="Hình ảnh" aria-label="Hình ảnh" name="hinhanh" aria-describedby="addon-wrapping">
            </div>
          </td>
          <td>
            <div class="input-group flex-nowrap">
              <input type="text" class="form-control" placeholder="Liên kết" aria-label="Liên kết" name="lienket" aria-describedby="addon-wrapping">
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="4">
            <div class="col-12">
              <button class="btn btn-primary" type="submit" name="themtintuc">Thêm</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</center>