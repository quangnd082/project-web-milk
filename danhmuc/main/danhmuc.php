<?php
include("../pages/menu.php");

// Số sản phẩm trên mỗi trang
$products_per_page = 4;

// Xác định trang hiện tại từ tham số truyền vào URL hoặc sử dụng trang 1 nếu không có
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính offset (bắt đầu từ vị trí nào trong cơ sở dữ liệu)
$offset = ($current_page - 1) * $products_per_page;

$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]'
     ORDER BY id_sanpham DESC LIMIT $offset, $products_per_page";
$query_pro = mysqli_query($conn, $sql_pro);

$sql_count = "SELECT COUNT(*) AS total FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]'";
$query_count = mysqli_query($conn, $sql_count);
$row_count = mysqli_fetch_assoc($query_count);
$total_products = $row_count['total'];

$total_pages = ceil($total_products / $products_per_page);

// Hiển thị tiêu đề danh mục
$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($conn, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<div class="container main">
    <div class="headline">
        <h3><?php echo $row_title['ten_danhmuc'] ?></h3>
    </div>
    <div class="pagination-container">
        <div class="pagination">
            <?php
            if ($current_page > 1) {
                echo "<a href='/TDQMilk/danhmuc/index.php?quanly=danhmucsanpham&id=$_GET[id]&page=" . ($current_page - 1) . "'>&laquo;</a>";
            }else{
                echo "<a href='/TDQMilk/danhmuc/index.php?quanly=danhmucsanpham&id=$_GET[id]&page=" . ($current_page) . "'>&laquo;</a>";
            }

            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='/TDQMilk/danhmuc/index.php?quanly=danhmucsanpham&id=$_GET[id]&page=$i'";
                if ($i == $current_page) {
                    echo " class='active'";
                }
                echo ">$i</a>";
            }
            if ($current_page < $total_pages) {
                echo "<a href='/TDQMilk/danhmuc/index.php?quanly=danhmucsanpham&id=$_GET[id]&page=" . ($current_page + 1) . "'>&raquo;</a>";
            }else{
                echo "<a href='/TDQMilk/danhmuc/index.php?quanly=danhmucsanpham&id=$_GET[id]&page=" . ($current_page) . "'>&raquo;</a>";
            }
            ?>
        </div>
    </div>
    <ul class="products">
        <?php
        while ($row = mysqli_fetch_array($query_pro)) {
        ?>
            <li>
                <div class="product-item">
                    <div class="product-top">
                        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="product-thump">
                            <img src="../admincp/modules/quanlysanpham/Upload/<?php echo $row['hinhanh_sanpham'] ?>" alt="">
                        </a>
                        <a href="/TDQMilk/danhmuc/index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="buy-now">Chi tiết sản phẩm</a>
                    </div>
                    <div class="product-info">
                        <a href="/TDQMilk/danhmuc/index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>" class="product-cat"><?php echo $row_title['ten_danhmuc'] ?></a>
                        <a href="/TDQMilk/danhmuc/index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="product-name"><?php echo $row['ten_sanpham'] ?></a>
                        <?php
                        if($row['tinhtrang_sanpham'] ==1){
                        ?>
                        <div class="product-price" style="color: red;"><del><?php echo number_format($row['gia_sanpham']) . 'VNĐ' ?></del> <?php echo number_format($row['gia_sanpham']*(100-$row['giamgia_sanpham'])/100) . 'VNĐ' ?></div>
                        <?php
                        }else{
                        ?>
                        <div class="product-price"><?php echo number_format($row['gia_sanpham']) . 'VNĐ' ?></div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </li>
        <?php
        }
        ?>
    </ul>
</div>
<style>
    /* Pagination links */
    .pagination {
        text-align: center;
    }

    .pagination a {
        justify-content: center;
        color: black;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        display: inline-block;
    }

    /* Style the active/current link */
    .pagination a.active {
        background-color: dodgerblue;
        color: white;
    }

    /* Add a grey background color on mouse-over */
    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }

    .pagination-container {
        display: flex;
        justify-content: center;
        /* Điều chỉnh khoảng cách phân trang với phần còn lại của trang */
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const pages = document.querySelectorAll('.pagination .page');

        pages.forEach(page => {
            page.addEventListener('click', function(event) {
                event.preventDefault();
                const currentPage = document.querySelector('.pagination .active');
                currentPage.classList.remove('active');
                page.classList.add('active');
            });
        });

        const prev = document.querySelector('.pagination .prev');
        const next = document.querySelector('.pagination .next');

        prev.addEventListener('click', function(event) {
            event.preventDefault();
            const currentPage = document.querySelector('.pagination .active');
            const prevPage = currentPage.previousElementSibling;
            if (prevPage && !prevPage.classList.contains('prev')) {
                currentPage.classList.remove('active');
                prevPage.classList.add('active');
            }
        });

        next.addEventListener('click', function(event) {
            event.preventDefault();
            const currentPage = document.querySelector('.pagination .active');
            const nextPage = currentPage.nextElementSibling;
            if (nextPage && !nextPage.classList.contains('next')) {
                currentPage.classList.remove('active');
                nextPage.classList.add('active');
            }
        });
    });
</script>