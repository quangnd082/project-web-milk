<div class="main">
<?php
            if(isset($_GET['action']) && $_GET['query']){
                $tam = $_GET['action'];
                $query = $_GET['query'];
            }else{
                $tam = '';
                $query = '';

            }
            if($tam == 'quanlydanhmucsanpham' && $query == 'them'){
                include("modules/quanlydanhmucsanpham/them.php");
                include("modules/quanlydanhmucsanpham/lietke.php");
            // }elseif($tam == 'quanlysanpham'){
            //     include("main/giohang.php");
            // }elseif($tam == 'quanlydanhmucbaiviet'){
            //     include("main/tintuc.php");
            // }elseif($tam == 'quanlybaiviet'){
            //     include("modules/quanlydanhmucsanpham/lienhe.php");
            }elseif($tam == 'quanlydanhmucsanpham' && $query == 'sua'){
                include('modules/quanlydanhmucsanpham/sua.php');
            }elseif($tam == 'quanlysanpham' && $query == 'them'){
                include('modules/quanlysanpham/them.php');
                include("modules/quanlysanpham/lietke.php");
            }elseif($tam == 'quanlysanpham' && $query == 'sua'){
                include('modules/quanlysanpham/sua.php');
            }elseif($tam == 'quanlytintuc' && $query == 'them'){
                include('modules/quanlytintuc/them.php');
                include("modules/quanlytintuc/lietke.php");
            }elseif($tam == 'quanlytintuc' && $query == 'sua'){
                include('modules/quanlytintuc/sua.php');
            }elseif($tam == 'quanlydonhang' && $query == 'lietke'){
                include('modules/quanlydonhang/lietkedonhang.php');
            }elseif($tam == 'quanlydonhang' && $query == 'lietkesanpham'){
                include('modules/quanlydonhang/lietkesanphamdonhang.php');
            }elseif($tam == 'dangxuat' && $query == 'dangxuat'){
                include('../pages/Logout/logout.php');
            }else{
                include("modules/dashboard.php");
            }
        ?>
</div>