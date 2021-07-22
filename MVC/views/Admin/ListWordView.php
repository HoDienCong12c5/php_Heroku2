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
                    <li class="breadcrumb-item active">Danh sách bài tập </li>
                </ul>
            </div>
            <!-- Page Header-->
            <div class="page-header">
                <h1 class="page-heading">Danh sách bài tập</h1>
            </div>
            <section>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-heading">Danh sách bài tập - chi tiết</div>
                    </div>
                    
                    <div class="card-body text-muted">
                        <div><a href="/Admin/EditWork">Thêm mới bài tập</a></div>
                       
                        <div>
                            <label>Điểm tích lũy được cộng khi đăng ký 1 bài tập : </label>
                            <input type="number" id="downPoint"  value="<?= UpDownPoint_Sale::ExercisePointUp()?>">
                            <input type="submit" id="saveDownPoint" value="Lửa sửa">
                        </div>

                        <table class="table" id="datatable1">
                            <thead>
                                <tr>
                                    <th>Mã ID</th>
                                    <th>Tên</th>
                                    <th>Hình</th>
                                    <th>Giá</th>
                                    <th>Thời hạn</th>
                                    <th>Mã TB</th>
                                    <th>Lượt DK</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($r = mysqli_fetch_array($data['data'])) {
                                ?>

                                    <tr class="align-middle" style="background-color:<?= $i % 2 == 0 ? 'antiquewhite' : '' ?>;">
                                        <td><?= $r[0] ?><div id="<?= $i ?>"></div>
                                        </td>
                                        <td style="width: 100px;"><?= $r[2] ?></td>
                                        <td><img style="width: 100px;height: 100px;" src="/Public/images/AnhBaiTap/<?= $r[1] ?>"></td>
                                        <td><?= currency_format($r[4]) ?> </td>
                                        <td class="text-muted"><?= $r[5] ?><label>(Tháng)</label></td>
                                        <td>
                                            <?= $r[6] ?>
                                        </td>
                                        <td>
                                            <?= $r[7] ?>
                                        </td>
                                        <td><a class="me-3 text-lg text-success" href="/Admin/EditWork?idWork=<?= $r[0] ?>"><i class="far fa-edit"></i></a>
                                            <a class="text-lg text-danger" href="javascript:delet(<?= $r[0] ?>,<?= $i ?>)"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>

                                <?php $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                    </div>
                </div>
                <div class="card-footer text-end"><a class="btn btn-outline-dark" href="#!">See all orders</a></div>
        </div>
        </section>
    </div>
    <script src="/Public/All/js/jQuery.js"></script>
    <script src="/Public/All/js/bootrap.bunlder.min.js"></script>

    <script>
        function delet(id, line) {

            var result = confirm("Bạn có chắc chắn xóa ?");
            if (result) {

                $.ajax({
                    type: "POST",
                    url: "/Admin/ListWork/Delete",
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
                            alert("Không thể xóa vì đã có người đăng ký");

                        }
                    }
                })
            }
        }
        $(document).ready(function(){
            $("#saveDownPoint").click(function(){
                var point=$("#downPoint").val(); 
                if(point <0)
                    alert("Không thể nhỏ nhơn 0")
                else {
                    $.post("/Admin/ListWork/UpdatePoint",{
                        point:point
                    },
                    function(msg) {
                        alert("Cập nhật thành công");
                    }
                )
                }
                
            })
        })
    </script>
</body>

</html>