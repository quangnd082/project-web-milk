<?php
session_start();
include("../../../admincp/config/config.php");
if (isset($_GET['tru'])) {
    $idkh = $_SESSION['id'];
    $id = $_GET['tru'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham ='" . $id . "' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $tensanpham = $row['ten_sanpham'];

    // Lấy số lượng sản phẩm hiện tại trong giỏ hàng
    $sql_soluong = "SELECT soluong_dat FROM tbl_giohang WHERE id ='" . $idkh . "' AND ten_sanpham = '" . $tensanpham . "'";
    $query_soluong = mysqli_query($conn, $sql_soluong);
    $row_soluong = mysqli_fetch_array($query_soluong);
    $soluong_hientai = $row_soluong['soluong_dat'];

    // Giảm số lượng đi 1
    if ($soluong_hientai > 1) {
        $soluong_moi = $soluong_hientai - 1;

        // Cập nhật số lượng mới vào giỏ hàng
        $sql_them = "UPDATE tbl_giohang SET soluong_dat = '" . $soluong_moi . "' WHERE id ='" . $idkh . "' AND ten_sanpham = '" . $tensanpham . "'";
        mysqli_query($conn, $sql_them);
    } else {
        $sql_xoa = "DELETE FROM tbl_giohang WHERE tbl_giohang.id ='" . $idkh . "' AND tbl_giohang.id_sanpham = '" . $id . "'";
        mysqli_query($conn, $sql_xoa);
    }
    header('Location: /TDQMilk/danhmuc/index.php?quanly=giohang');
}
if (isset($_GET['cong'])) {
    $idkh = $_SESSION['id'];
    $id = $_GET['cong'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham ='" . $id . "' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $tensanpham = $row['ten_sanpham'];

    // Lấy số lượng sản phẩm hiện tại trong giỏ hàng
    $sql_soluong = "SELECT soluong_dat FROM tbl_giohang WHERE id ='" . $idkh . "' AND ten_sanpham = '" . $tensanpham . "'";
    $query_soluong = mysqli_query($conn, $sql_soluong);
    $row_soluong = mysqli_fetch_array($query_soluong);
    $soluong_hientai = $row_soluong['soluong_dat'];

    if ($soluong_hientai < $row['soluong_sanpham']) {
        // Tăng số lượng lên 1
        $soluong_moi = $soluong_hientai + 1;

        // Cập nhật số lượng mới vào giỏ hàng
        $sql_them = "UPDATE tbl_giohang SET soluong_dat = '" . $soluong_moi . "' WHERE id ='" . $idkh . "' AND ten_sanpham = '" . $tensanpham . "'";
        mysqli_query($conn, $sql_them);
    }
    header('Location: /TDQMilk/danhmuc/index.php?quanly=giohang');
}

if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $idkh = $_SESSION['id'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham ='" . $id . "' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $tensanpham = $row['ten_sanpham'];
    $sql_xoa = "DELETE FROM tbl_giohang WHERE tbl_giohang.id ='" . $idkh . "' AND tbl_giohang.id_sanpham = '" . $id . "'";
    mysqli_query($conn, $sql_xoa);
    header('Location: /TDQMilk/danhmuc/index.php?quanly=giohang');
}
if (isset($_POST['themgiohang'])) {
    $id = $_GET['idsanpham'];
    $idkh = $_SESSION['id'];
    $soluong = 1;

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $sql_check = "SELECT * FROM tbl_giohang WHERE id = '" . $idkh . "' AND id_sanpham = '" . $id . "'";
    $query_check = mysqli_query($conn, $sql_check);
    $row_check = mysqli_fetch_array($query_check);

    if ($row_check) {
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham ='" . $id . "' LIMIT 1";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        $giasanpham = $row['gia_sanpham'];
        // Nếu sản phẩm đã tồn tại, cập nhật số lượng
        $soluong_dat_moi = $row_check['soluong_dat'] + $soluong;
        if ($soluong_dat_moi >= $row['soluong_sanpham']) {
            $soluong_dat_moi = $row['soluong_sanpham'];
        }
        if ($row['tinhtrang_sanpham'] == 1) {
            $giasanpham = $row['gia_sanpham'] * (100 - $row['giamgia_sanpham']) / 100;
        }
        $sql_update = "UPDATE tbl_giohang SET soluong_dat = '" . $soluong_dat_moi . "' WHERE id = '" . $idkh . "' AND id_sanpham = '" . $id . "'";
        mysqli_query($conn, $sql_update);
    } else {
        // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham ='" . $id . "' LIMIT 1";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        $giasanpham = $row['gia_sanpham'];
        if ($row['tinhtrang_sanpham'] == 1) {
            $giasanpham = $row['gia_sanpham'] * (100 - $row['giamgia_sanpham']) / 100;
        }
        $sql_kh = "INSERT INTO tbl_giohang(id, id_sanpham, ten_sanpham, soluong_dat, ma_sanpham, gia_sanpham, hinhanh_sanpham) VALUE ('" . $idkh . "','" . $row['id_sanpham'] . "','" . $row['ten_sanpham'] . "','" . $soluong . "','" . $row['ma_sanpham'] . "','" . $giasanpham . "','" . $row['hinhanh_sanpham'] . "')";
        mysqli_query($conn, $sql_kh);
    }
}

header('Location: /TDQMilk/danhmuc/index.php?quanly=giohang');
print_r($_SESSION['cart']);
