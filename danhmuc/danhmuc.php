<?php
            if(isset($_GET['quanly'])){
                $tam = $_GET['quanly'];
            }else{
                $tam = '';
            }
            if($tam == 'danhmucsanpham'){
                include("main/danhmuc.php");
            }elseif($tam == 'giohang'){
                include("main/Giohang/giohang.php");
            }elseif($tam == 'tintuc'){
                include("main/tintuc.php");
            }elseif($tam == 'thanhtoan'){
                include("main/Thanhtoan/thanhtoan.php");
            }elseif($tam == 'sanpham'){
                include("main/sanpham.php");
            }elseif($tam == 'timkiem'){
                include("main/timkiem.php");
            }else{
                include("main/index.php");
            }
        ?>