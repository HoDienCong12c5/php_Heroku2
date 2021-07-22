<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>EstateAgency Bootstrap Template - Index</title>
    <meta name="robots" content="noindex, nofollow">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="/Public/MasterPage/css/animate.animate.css" rel="stylesheet">
    <link href="/Public/MasterPage/css/bootsrap.min.css" rel="stylesheet">
    <link href="/Public/MasterPage/css/bootrap-icon.css" rel="stylesheet">
    <link href="/Public/MasterPage/css/swiper-bunlder.min.css" rel="stylesheet">
    <link href="/Public/MasterPage/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div>
        <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
            <div class="container">
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <a class="navbar-brand text-brand" href="index.html">NHÓM<span class="color-b">9</span></a>

                <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link active" href="/home">Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#">Bài tập</a>
                            <div class="dropdown-menu">
                                <?php
                                while ($row = mysqli_fetch_array($data["dsbt"])) {
                                ?>
                                    <a href='../ExerciseDetails?idExercise=<?php echo $row[0] ?>' class="dropdown-item "><?php echo $row[1] ?></a>
                                <?php
                                }
                                ?>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/ListFood">Thực phẩm</a>
                            <div class="dropdown-menu">
                                <?php
                                while ($row = mysqli_fetch_array($data["dstp"])) {
                                ?>
                                    <a class="dropdown-item " href='/FoodDetail?idFood=<?php echo $row[0] ?>'><?php echo $row[1] ?></a>

                                <?php
                                }
                                ?>
                            </div>
                        </li>
                        <li class="nav-item">
                        <?= isset($_SESSION['user_id']) ?'':'<a class="nav-link " href="/Regitster">Đăng ký</a>' ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " name="dangnhap" id="dangnhap" href="/<?= isset($_SESSION['user_id']) ? "Login/SignOut" : "Login" ?>"><?= isset($_SESSION['user_id']) ? "Đăng xuất" : "Đăng nhập" ?></a>
                        </li>

                        <?php
                        if (isset($_SESSION['user_id'])) {
                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" style="color: green;"><?= $_SESSION['fullName'] ?></a>
                                <div class="dropdown-menu">
                                    <span> <a class="dropdown-item" href="/Bill">Hóa đơn</a></span>
                                    <a class="dropdown-item" href="/Introduce">Thông tin cá nhân</a>
                                </div>
                            </li>
                        <?php
                        }

                        ?>
                    </ul>
                </div>
                <?php
                if (isset($_SESSION['user_id'])) {
                ?>
                    <span><a href="/Cart"> <i class="fa fa-shopping-cart" style="font-size:48px;color:Orange  "></i> </a></span>
                <?php
                }
                ?>
            </div>
        </nav>
    </div>
    <script data-cfasync="false" src="/Public/teamplate1/JS/email-decode.min.js"></script>
    <script src="/Public/MasterPage/JS/bootrap.bunlder.min.js"></script>
    <script src="/Public/MasterPage/JS/validate.js"></script>
    <script src="/Public/MasterPage/JS/swiper-bunlder.min.js"></script>

    <script src="/Public/MasterPage/JS/main.js"></script>
    <script>
        $(document).ready(function() {
            $("#account").click(function() {
                alert("ol")
                window.location.href("/Introduce")
            })
        })
    </script>

    -->
</body>

</html>