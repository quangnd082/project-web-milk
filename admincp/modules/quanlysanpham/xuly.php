<?php
include('../../config/config.php');
    $tensanpham = $_POST['tensanpham'];
    $masanpham = $_POST['masanpham'];
    $giasanpham = $_POST['giasanpham'];
    $soluong = $_POST['soluong'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $danhmuc = $_POST['danhmuc'];
    $giamgia = $_POST['giamgia'];

    if(isset($_POST['themsanpham'])){
        $sql_them = "INSERT INTO tbl_sanpham(ten_sanpham, ma_sanpham, gia_sanpham, soluong_sanpham, hinhanh_sanpham, tomtat_sanpham, noidung_sanpham, tinhtrang_sanpham, giamgia_sanpham, id_danhmuc) VALUE ('".$tensanpham."','".$masanpham."','".$giasanpham."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."', '".$giamgia."','".$danhmuc."')";
        mysqli_query($conn, $sql_them);
        move_uploaded_file($hinhanh_tmp, 'Upload/'.$hinhanh);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }elseif(isset($_POST['suasanpham'])){
        if($hinhanh!=''){
            move_uploaded_file($hinhanh_tmp, 'Upload/'.$hinhanh);
            $sql_update = "UPDATE tbl_sanpham SET ten_sanpham = '".$tensanpham."'
            , ma_sanpham = '".$masanpham."', gia_sanpham = '".$giasanpham."', soluong_sanpham = '".$soluong."'
            , hinhanh_sanpham = '".$hinhanh."', tomtat_sanpham = '".$tomtat."', noidung_sanpham = '".$noidung."'
            , tinhtrang_sanpham = '".$tinhtrang."', giamgia_sanpham = '".$giamgia."', id_danhmuc = '".$danhmuc."' WHERE id_sanpham = '$_GET[id_sanpham]'";
            $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[id_sanpham]' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($query)){
                unlink('Upload/'.$row['hinhanh_sanpham']);
            }
        }else{
            $sql_update = "UPDATE tbl_sanpham SET ten_sanpham = '".$tensanpham."'
            , ma_sanpham = '".$masanpham."', gia_sanpham = '".$giasanpham."', soluong_sanpham = '".$soluong."'
            , tomtat_sanpham = '".$tomtat."', noidung_sanpham = '".$noidung."'
            , tinhtrang_sanpham = '".$tinhtrang."', giamgia_sanpham = '".$giamgia."', id_danhmuc = '".$danhmuc."' WHERE id_sanpham = '$_GET[id_sanpham]'";
        }
        
        mysqli_query($conn, $sql_update);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }else{
        $id = $_GET['id_sanpham'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
        $query = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('Upload/'.$row['hinhanh_sanpham']);
        }
        $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham = '".$id."'";
        mysqli_query($conn, $sql_xoa);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }

?>