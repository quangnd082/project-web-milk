<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/thanhtoan.css">
</head>
<?php
$idkh = $_SESSION['id'];
$sql_lietke_giohang = "SELECT * FROM tbl_giohang WHERE tbl_giohang.id = '" . $idkh . "'";
$query_lietke_giohang = mysqli_query($conn, $sql_lietke_giohang);
?>

<body>
    <div class="headline">
        <h3>Thông tin thanh toán</h3>
    </div>
    <div class="row">
        <div class="col-25">
            <div class="container">
                <h4 style="font-weight: 600;color: red">Giỏ hàng <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
            </div>
            <?php
            $i = 0;
            $tongtien = 0;
            while ($row = mysqli_fetch_array($query_lietke_giohang)) {
                $i++;
            ?>
                <?php
                // Lấy giá sản phẩm và số lượng từ cơ sở dữ liệu

                $gia_sanpham = $row['gia_sanpham'];
                $soluong_dat = $row['soluong_dat'];

                // Ép kiểu dữ liệu về kiểu số
                $gia_sanpham = floatval(str_replace(',', '', $gia_sanpham)); // Chuyển đổi giá sản phẩm về kiểu số
                $soluong_dat = intval($soluong_dat); // Chuyển đổi số lượng về kiểu số nguyên

                // Tính toán thành tiền
                $thanhtien = $gia_sanpham * $soluong_dat;
                $tongtien += $thanhtien;

                ?>

                <div class="container">
                    <p><?php echo $row['ten_sanpham'] ?>: <?php echo $row['soluong_dat'] ?> Sản phẩm <span class="price"><?php echo number_format($thanhtien) . 'VNĐ' ?></span></p>
                </div>
            <?php
            }
            $_SESSION['tongtien'] = $tongtien;
            ?>
            <div class="container">
                <p>Tổng cộng <span class="price" style="color:black"><b><?php echo number_format($tongtien) . 'VNĐ' ?></b></span></p>
            </div>
        </div>

        <div class="col-75">
            <div class="container">
                <form action="/TDQMilk/danhmuc/main/Thanhtoan/quanlythanhtoan.php" method="POST">
                    <div class="row">
                        <div class="col-50">
                            <label for="fname" style="margin-top: 20px;"><i class="fa fa-user"></i> Họ và tên</label>
                            <input type="text" id="fname" name="firstname" placeholder="Nguyễn Mạnh Trung" style="margin-bottom: 20px;" required>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="nguyenmanhtrung_t65@hus.edu.vn" style="margin-bottom: 20px;" required>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ cụ thể</label>
                            <input type="text" id="adr" name="address" placeholder="334 Nguyễn Trãi, Thanh Xuân" style="margin-bottom: 20px;" required>
                            <?php
                            include("tinhthanh.php")
                            ?>
                            <label for="phone"><i class="fa fa-phone"></i> Số điện thoại</label>
                            <input type="text" id="phone" name="phone" placeholder="0327103128" style="margin-bottom: 20px;" required>
                        </div>
                    </div>
                    <input type="submit" value="Đặt hàng" class="btn1" name="dathang" onclick="return validateForm()">
                </form>
            </div>
        </div>

    </div>

