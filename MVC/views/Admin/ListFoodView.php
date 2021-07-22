<?php
function currency_format($number, $suffix = '  VNĐ')
{
    if (!empty($number)) {
        return number_format($number, 0, ',', '.') . "{$suffix}";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        include_once "MVC/controllers/Admin/Master.php";
        $mt = new Master();
        $mt->index();
    ?>
    <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
            <!-- Breadcrumbs -->
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Admin/ListWork">Home</a></li>
                    <li class="breadcrumb-item active">Danh sách thực phẩm bổ sung </li>
                </ul>
            </div>
            <section>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-heading">Danh sách thực phẩm bổ sung - chi tiết</div>
                    </div>
                    <div class="card-body text-muted">
                        <div><a href="/Admin/Food/EditFood">Thêm mới thực phẩm bổ sung</a></div>
                        <div>
                            <label>Điểm tích lũy được công khi mua 1 sản phẩm trong của hàng : </label>
                            <input type="number" id="upPoint" value="<?= UpDownPoint_Sale::FoodPointUp() ?>">
                            <input type="submit" id="saveUpPoint" value="Lửa sửa">
                        </div>
                        <div style="width: 300px;">
                            <br>

                            <label><b>Lọc danh sách : </b></label>
                            <select id="type" name="type" class="form-select" aria-label="Default select example">
                                <option selected value="-1">Tất cả</option>
                                <?php

                                while ($l = mysqli_fetch_array($data['lkf'])) {
                                    echo "ok";
                                ?>
                                    <option value="<?= $l[0] ?>"> <?= $l[1] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <table class="table" id="datatable1">
                            <thead>
                                <tr>
                                    <th>Mã SP</th>
                                    <th>Tên</th>
                                    <th>Hình</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Đã bán</th>
                                    <th>Thể loại</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                                <?php
                                $i = 0;
                                while ($r = mysqli_fetch_array($data['data'])) {
                                ?>


                                    <tr class="align-middle" style="background-color:<?= $i % 2 == 0 ? 'antiquewhite' : '' ?>;">
                                        <td>
                                            <?= $r[0] ?>
                                            <div id="<?= $i ?>"></div>
                                        </td>
                                        <td style="width: 100px;"><?= $r[2] ?></td>
                                        <td><img style="width: 100px;height: 100px;" src="/Public/images/AnhSanPham/<?= $r[1] ?>"></td>
                                        <td><?= currency_format($r[3]) ?> </td>
                                        <td><?= $r[4] ?></td>
                                        <td>
                                            <?= $r[5] ?>
                                        </td>
                                        <td><label id="type"><?= $r[6] ?></label></td>
                                        <td><a class="me-3 text-lg text-success" href="/Admin/Food/EditFood?idFood=<?= $r[0] ?>"><i class="far fa-edit"></i></a>
                                            <a class="text-lg text-danger" href="javascript:delet(<?= $r[0] ?>,<?= $i ?>)"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>

                                <?php $i++;
                                }
                                ?>
                            </tbody>
                        </table>
            </section>
        </div>
        <script src="/Public/All/js/jQuery.js"></script>
        <script>
            $(document).ready(function() {
                let idTy = 1;
                $("select.form-select").change(function() {
                    var selectedCountry = $(this).children("option:selected").val();
                    idTy = selectedCountry;
                    $.ajax({
                        type: "POST",
                        url: "/Admin/Food/Search",
                        data: {
                            "idTy": idTy
                        },
                        success: function(msg) {
                            $("#content").html(msg)
                        }
                    })

                });
                $("#saveUpPoint").click(function() {
                    var point = $("#upPoint").val();
                    $.post("/Admin/Food/UpdatePoint", {
                            point: point
                        },
                        function(msg) {
                            alert("Cập nhật thành công")
                        }
                    )
                })
            })
        </script>
        <script>
            function delet(id, line) {
                var result = confirm("Bạn có chắc chắn xóa ?");
                if (result) {
                    $.ajax({
                        type: "POST",
                        url: "/Admin/Food/Remove",
                        data: {
                            "id": id
                        },
                        success: function(msg) {
                            if (msg == 1) {
                                alert("Xóa thành công");
                                $("table ").find("#" + line + "").each(function() {
                                    $(this).parents("tr").remove();
                                });
                            } else {
                                alert("Không thể xóa vì đã có người mua");

                            }
                        }
                    })
                }
            }
        </script>

</body>

</html>