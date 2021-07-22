<?php
$arr = mysqli_fetch_array($data["data"]);
$theloaiKH = $data["loaikhach"];
$fullname = $arr[3];
$name = $arr[1];
$pass = $arr[2];
$image = $arr[4];
$adress = $arr[5];
$email = $arr[6];
$nberphone = $arr[7];
$gtinh = $arr[8];
$diemTL = $arr[10];
$date = $arr[11];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/Public/All/css/styleIntroduce.css" rel="stylesheet" />
    <script src="/Public/All/js/jQuery.js"></script>
    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script>
        $(document).ready(function() {
            var img = "";
            var urlImg = "";
            var gt = $("input[name=gioi_tinh]:checked").val();
            $('input[name=sortpic]').change(function(e) {
                img = e.target.files[0].name;

                urlImg = $('input[name=fileanh]').val();
            });
            $("#submit").click(function() {
                gt = $("input[name=gioi_tinh]:checked").val();
                var fname = $("#ho_va_ten").val();
                /* 
                                var tuoi = $("#tuoi").val(); */
                var diachi = $("#adress").val();
                var sdt = $("#sdt").val();
                var email = $("#emai").val();
                var tk = $("#user").val();
                var mk = $("#pass").val();

                var file_data = "";
                if ($("#file").val() != '') {
                    file_data = $('#file').prop('files')[0];
                };
                var form_data = new FormData();
                form_data.append('img', file_data);
                form_data.append('fname', fname);
                /* form_data.append('tuoi', tuoi ); */
                form_data.append('diachi', diachi);
                form_data.append('gt', gt);
                form_data.append('sdt', sdt);
                form_data.append('email', email);
                form_data.append('tk', tk);
                form_data.append('mk', mk);
                $.ajax({
                    type: "POST",
                    url: "/Introduce/UpdateAccount",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(m) {
                        alert(m);
                    }
                })
                return false;
            })
        })
    </script>
</head>

<body>
    <div>
        <?php
        include_once "MVC/controllers/Header.php";
        $h = new Header();
        $h->index();
        ?>
    </div>
    <div style="height: 115px;" class="swiper-slide carousel-item-a intro-item bg-image"></div>
    <div class="than">
        <article>
            <section>
                <div class="nd_right">
                    <p class="ten_kh"> Chào mừng <lable style="color:black"><b><?= $fullname ?></b></lable>
                    </p>
                    <fieldset class="bang_thong_tin">
                        <legend class="TTCB"><b>Thông tin cơ bản </b></legend>
                        <form method="POST" role="form">
                            <table>
                                <tr>
                                    <td>Họ và tên: </td>
                                    <td>
                                        <input id="ho_va_ten" class="ho_va_ten" value="<?= $fullname ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Giới tính: </td>
                                    <td>
                                        <input type="radio" id="gioi_tinh" name="gioi_tinh" <?php if (isset($gtinh) && $gtinh == '1') echo "checked"; ?> value="1">Nam
                                        &ensp;
                                        <input type="radio" id="gioi_tinh" name="gioi_tinh" <?php if (isset($gtinh) && $gtinh == '0') echo "checked"; ?> value="0">Nữ
                                    </td>
                                </tr>

                                <tr>
                                    <td style="height: 35px">Địa chi: </td>
                                    <td style="height: 35px">

                                        <z class="adress" rows="1" id="adress" cols="24%"><?= $adress ?></z>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại: </td>
                                    <td>
                                        <input id="sdt" class="ho_sdtva_ten" value="<?= $nberphone ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gmail: </td>
                                    <td>
                                        <input id="emai" class="email" value="<?= $email ?>" />
                                    </td>
                                </tr>
                            </table>

                    </fieldset>
                    <div class="anh_tk">
                        <div class="anh_NGuoiDung">
                            <image id="img" style="width: 155px; height: 185px" src="/Public/images/AnhDaiDien/<?= $image ?>" />
                        </div>
                        <div class="nut_lenh_anh">
                            <input type="file" id="file" name="sortpic" required="" accept="image/*" onchange="loadFile(event)">

                        </div>
                    </div>
                </div>
                <img src="/Public/images/AnhChucNang/cay_but.gif" class="anh_cay_but" />
                <br />
                <div class="right_TTTK">
                    <fieldset>
                        <legend><b>Thông tin tài khoản</b></legend>
                        <table>
                            <tr>
                                <td>Tên đăng nhập: </td>
                                <td>
                                    <input id="user" class="user" value="<?= $name ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>Mật khẩu: </td>
                                <td>
                                    <input id="pass" class="pas" value="<?= $pass ?>" type="password" />
                                    <input type="button" value="Đổi" data-bs-toggle='modal' data-bs-target='#detailtFood' class="btn btn-outline-success">


                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Loại khách hàng:
                                </td>
                                <td>
                                    <lable><?= $theloaiKH ?></lable>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ngày đăng ký:
                                </td>
                                <td>
                                    <lable><?= $date ?></lable>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Điểm tích lũy:
                                </td>
                                <td>
                                    <lable><?= $diemTL ?></lable>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div class="nutlenhcuoi">
                    <button name="submit" id="submit" class="btn btn-outline-success">Lưu Sửa</button>

                </div>
                </form>
            </section>

            <aside>
                <div>
                    <p class="khuyen_dung">Khuyên dùng</p>
                    <p class="gc_thich"></p>
                    <div class="right-khuyen_dung">
                        <img src="/Public/images/AnhMasterPage/khuyen_dung.png" width="270" height="400" class="ah_khuyen_dung" />
                    </div>
                    <p class="ban_thich">Liên kết</p>
                    <p class="gc_thich"></p>
                </div>
                <div class="lk_trang">
                    <a href="http://www.thehinh.com/"><br />thehinh.com</a>
                    <a href="https://www.thenewgym.vn/vi"><br />thenewgame.com</a>
                    <a href="http://www.fit24.vn/"><br />fit24.vn</a>
                    <a href="https://citigym.com.vn/#"><br />citigym.com</a>
                </div>
            </aside>
        </article>

    </div>

    <div class="modal fade" id="detailtFood" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thay Đổi mật khẩu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <thead>
                            <tr>
                                <td>Mật khẩu cũ</td>
                                <td>
                                    <input id="pass" class="pas" value="<?= $pass ?>" type="password" readonly />

                                </td>
                            </tr>
                            <tr>
                                <td>Mật khẩu Mới</td>
                                <td>
                                    <input id="passNew" class="pas" type="password" />

                                </td>
                            </tr>
                            <tr>
                                <td>Nhập lại MK</td>
                                <td>
                                    <input id="enterPassNew" class="pas" type="password" />

                                </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    <input type="button" class="btn btn-outline-success" id="editPass" value="Xác nhận">

                </div>
            </div>
        </div>
        <script>
            $("#editPass").click(function() {
                let pas = $("#pass").val();
                let pasN = $("#passNew").val();
                let pasN2 = $("#enterPassNew").val();
                if (pasN == pas)
                    alert("Mật khẩu mới không được trùng với mạt khẩu cũ")
                if (pasN == '') {
                    alert("Chưa nhập mât khẩu mới")
                    $("#passNew").focus();
                } else {
                    if (pasN2 == '') {
                        alert("Chưa nhập mât khẩu lại")
                        $("#enterPassNew").focus();
                    }
                    else{ 
                        if(pasN2!=pasN)
                            alert("Nhập lại mật khẩu bị sai")
                        else{ 
                            $.post("/Introduce/UpdatePass",{
                                pass:pasN
                                },
                                function(msg){
                                    alert(msg)
                                }
                            )
                        }
                    }
                }


            })
        </script>
</body>

</html>