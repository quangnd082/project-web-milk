<!DOCTYPE html>
<html lang="en">

<head>
    <title>TDQMILK</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tintuc.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/buttontop.css">

</head>

<body>
    <div class="wrapper">
        <?php
        session_start();
        include("admincp/config/config.php");
        include("pages/navbar.php");
        include("pages/banner.php");
        include("pages/sanpham.php");
        include("pages/khuyenmai.php");
        include("pages/cuahang.php");
        include("pages/tintuc.php");
        include("pages/footer.php");
        include("pages/buttontop.php");
        ?>
        
    </div>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop()) {
                    $('header').addClass('sticky');
                } else {
                    $('header').removeClass('sticky');
                }
            });
        });
    </script>
    <script>
        function myFunction(x) {
            x.classList.toggle("change");
        }
    </script>
</body>

</html>