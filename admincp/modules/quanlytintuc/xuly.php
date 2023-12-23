<?php
include('../../config/config.php');
    $tieudetintuc = $_POST['tieudetintuc'];
    $lienket = $_POST['lienket'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

    if(isset($_POST['themtintuc'])){
        $sql_them = "INSERT INTO tbl_tintuc(tieude_tintuc, hinhanh_tintuc, lienket_tintuc) VALUE ('".$tieudetintuc."','".$hinhanh."','".$lienket."')";
        mysqli_query($conn, $sql_them);
        move_uploaded_file($hinhanh_tmp, 'Upload/'.$hinhanh);
        header('Location:../../index.php?action=quanlytintuc&query=them');
    }elseif(isset($_POST['suatintuc'])){
        if($hinhanh!=''){
            move_uploaded_file($hinhanh_tmp, 'Upload/'.$hinhanh);
            $sql_update = "UPDATE tbl_tintuc SET tieude_tintuc = '".$tieudetintuc."'
            , hinhanh_tintuc = '".$hinhanh."',lienket_tintuc = '".$lienket."' WHERE id_tintuc = '$_GET[id_tintuc]'";
            $sql = "SELECT * FROM tbl_tintuc WHERE id_tintuc = '$_GET[id_tintuc]' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($query)){
                unlink('Upload/'.$row['hinhanh_tintuc']);
            }
        }else{
            $sql_update = "UPDATE tbl_tintuc SET tieude_tintuc = '".$tieudetintuc."'
            ,hinhanh_tintuc = '".$hinhanh."',lienket_tintuc = '".$lienket."' WHERE id_tintuc = '$_GET[id_tintuc]'";
        }
        
        mysqli_query($conn, $sql_update);
        header('Location:../../index.php?action=quanlytintuc&query=them');
    }else{
        $id = $_GET['id_tintuc'];
        $sql = "SELECT * FROM tbl_tintuc WHERE id_tintuc = '$id' LIMIT 1";
        $query = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('Upload/'.$row['hinhanh_tintuc']);
        }
        $sql_xoa = "DELETE FROM tbl_tintuc WHERE id_tintuc = '".$id."'";
        mysqli_query($conn, $sql_xoa);
        header('Location:../../index.php?action=quanlytintuc&query=them');
    }

?>