<?php
session_start();
require("../../../pages/Password-reset/password-reset-code.php");
include('../../../admincp/config/config.php');
$city = '';
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$address = $_POST['address'];
$thanhpho = $_POST['city'];
$district = $_POST['district'];
$ward = $_POST['ward'];
$phone = $_POST['phone'];
$idkh = $_SESSION['id'];
$city = $ward . ', ' . $district . ', ' . $thanhpho;
if (isset($_POST['dathang'])) {
    $sql_them = "INSERT INTO tbl_donhang(ten_kh, email_kh, diachi_kh, thanhpho_kh, sdt_kh, tongtien_sanpham, id) VALUE ('" . $firstname . "','" . $email . "','" . $address . "','" . $city . "','" . $phone . "', '" . $_SESSION['tongtien'] . "','" . $idkh . "')";
    mysqli_query($conn, $sql_them);
    $iddh = mysqli_insert_id($conn);
    $sql_donhang = "SELECT * FROM tbl_donhang WHERE tbl_donhang.id = '" . $idkh . "' AND tbl_donhang.id_donhang = '" . $iddh . "'";
    $query_donhang = mysqli_query($conn, $sql_donhang);
    $row_donhang = mysqli_fetch_array($query_donhang);
    // header('Location:../../index.php?action=quanlysanpham&query=them');
    $sql_lietke_giohang = "SELECT * FROM tbl_giohang WHERE tbl_giohang.id = '" . $idkh . "'";
    $query_lietke_giohang = mysqli_query($conn, $sql_lietke_giohang);

    // Kiểm tra xem có dữ liệu trả về không
    if (mysqli_num_rows($query_lietke_giohang) > 0) {
        // Dùng vòng lặp để lấy từng dòng dữ liệu và insert vào bảng mới
        while ($row = mysqli_fetch_array($query_lietke_giohang)) {
            $sql_dathang = "INSERT INTO tbl_giohang_dathanhtoan(id, id_sanpham, ten_sanpham, soluong_dat, ma_sanpham, gia_sanpham, hinhanh_sanpham, id_donhang) VALUE ('" . $idkh . "','" . $row['id_sanpham'] . "','" . $row['ten_sanpham'] . "','" . $row['soluong_dat'] . "','" . $row['ma_sanpham'] . "','" . $row['gia_sanpham'] . "', '" . $row['hinhanh_sanpham'] . "', '" . $row_donhang['id_donhang'] . "')";
            mysqli_query($conn, $sql_dathang);
            $id_sanpham = $row['id_sanpham'];
           

            $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham = '" . $id_sanpham . "'";
            $query_sanpham = mysqli_query($conn, $sql_sanpham);
            $row_sanpham = mysqli_fetch_array($query_sanpham);
            $soluong_moi = $row_sanpham['soluong_sanpham'] - $row['soluong_dat'];
            $sql_update = "UPDATE tbl_sanpham SET soluong_sanpham = '" . $soluong_moi . "' WHERE id_sanpham ='" . $id_sanpham . "'";
            mysqli_query($conn, $sql_update);

            $sql_xoa = "DELETE FROM tbl_giohang WHERE id = '" . $idkh . "' AND id_sanpham = '" . $id_sanpham . "'";
            mysqli_query($conn, $sql_xoa);

        }
    }
    $sql_lietke_sanphamdonhang = "SELECT * FROM tbl_giohang_dathanhtoan WHERE id_donhang = '" . $row_donhang['id_donhang'] . "'";
    $query_lietke_sanphamdonhang = mysqli_query($conn, $sql_lietke_sanphamdonhang);
    $tieude = 'Đặt hàng sữa tại suatuoinguyenchat.com thành công!';
    $noidung = "Cảm ơn quý khách đã đặt hàng, chúng tôi sẽ liên lạc với bạn để xác nhận đơn hàng<br>";
    $noidung .= "<h3>Thông tin người nhận: </h3>";
    $noidung .= "<h4>".$row_donhang['ten_kh'];
    $noidung .= ", ".$row_donhang['diachi_kh'];
    $noidung .= ", ".$row_donhang['thanhpho_kh'];
    $noidung .= ", ".$row_donhang['sdt_kh']."</h4>";

    $noidung .= '<table class="table table-bordered border-primary" border="1" style="border-collapse: collapse; text-align: center;">';
    $noidung .= '<thead>';
    $noidung .= '<tr>';
    $noidung .= '<th scope="col">ID</th>';
    $noidung .= '<th scope="col">Tên sản phẩm</th>';
    $noidung .= '<th scope="col">Giá</th>';
    $noidung .= '<th scope="col">Số lượng</th>';
    $noidung .= '<th scope="col">Mã sản phẩm</th>';
    $noidung .= '</tr>';
    $noidung .= '</thead>';
    $noidung .= '<tbody>';

    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_sanphamdonhang)) {
        $i++;
        $noidung .= '<tr>';
        $noidung .= '<td>' . $i . '</td>';
        $noidung .= '<td>' . $row['ten_sanpham'] . '</td>';
        $noidung .= '<td>' . number_format($row['gia_sanpham']) . ' VNĐ</td>';
        $noidung .= '<td>' . $row['soluong_dat'] . '</td>';
        $noidung .= '<td>' . $row['ma_sanpham'] . '</td>';
        $noidung .= '</tr>';
    }

    $noidung .= '</tbody>';
    $noidung .= '</table>';
    $noidung .= "<h3>Tổng tiền phải trả: ".number_format($row_donhang['tongtien_sanpham'])." VNĐ</h3>";
    $maildathang = $row_donhang['email_kh'];
    $mail = new Mailer;
    $mail -> dathangmail($tieude, $noidung, $maildathang);
    echo '<script>
    alert("Bạn đã đặt hàng thành công, vui lòng quay về trang chủ");
    window.location.href="/TDQMilk/index.php";
</script>';
}
?>
