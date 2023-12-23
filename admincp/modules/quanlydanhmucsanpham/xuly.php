<?php
include('../../config/config.php');
    $tenloaisp = $_POST['tendanhmuc'];
    if(isset($_POST['themdanhmucsanpham'])){
        $sql_them = "INSERT INTO tbl_danhmuc(ten_danhmuc) VALUE ('".$tenloaisp."')";
        mysqli_query($conn, $sql_them);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }elseif(isset($_POST['suadanhmuc'])){
        $sql_update = "UPDATE tbl_danhmuc SET ten_danhmuc = '".$tenloaisp."' WHERE id_danhmuc = '$_GET[id_danhmuc]'";
        mysqli_query($conn, $sql_update);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }else{
        $id = $_GET['id_danhmuc'];
        $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc = '".$id."'";
        mysqli_query($conn, $sql_xoa);
        $sql_xoasp = "DELETE FROM tbl_sanpham WHERE id_danhmuc = '".$id."'";
        mysqli_query($conn, $sql_xoasp);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }

?>