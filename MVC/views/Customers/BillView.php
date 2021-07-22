<?php
function currency_format($number, $suffix = 'VND')
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
    <link href="/Public/All/css/style.css" rel="stylesheet">

    <link href="/Public/css/styleTuChinh.css" rel="stylesheet">
    <link href="/Public/MasterPage/css/bootsrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/All/css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script src="/Public/All/js/jQuery.js"></script>
    <script src="/Public/All/js/popper.js"></script>
    <script src="/Public/All/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
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
    <div class="thanbill" id="thanbill">
        <div style="width: 40%;">
            <label>Tìm kiếm theo ngày: </label>
            <select id="type" name="type" class="form-select" aria-label="Default select example">
                <option value="0" selected> Hôm nay</option>
                <option value="1" selected> Tháng này</option>
                <option value="2" selected> Tất cả</option>
            </select>
        </div>
        <div id='than'>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Danh sách các thực phẩm, nước uống đã mua
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body ">
                            <div class="col-lg-10 m-auto">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Mã hóa đơn</th>
                                            <th>Tổng tiền</th>
                                            <th>Ngày mua</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;" id="food">
                                        <?php
                                        $i = 0;
                                        $an = 1;
                                        while ($arr2 = mysqli_fetch_array($data["dstp"])) {

                                            $idhd = $arr2[0];
                                            $total = $this->currency_format($arr2[1]);
                                            $dateBuy = $arr2[2];
                                            $i++;

                                            if ($an == 2)
                                                $an = 1;
                                        ?>
                                            <tr>

                                                <td id="<?= $i ?>"><?= $idhd ?></td>
                                                <td style="text-align: right;"><?= $total ?></td>
                                                <td><?= $dateBuy ?> </td>
                                                <td> <button data-bs-toggle='modal' data-bs-target='#detailtFood' class="btn btn-outline-success"><a href="javascript:Detailt(<?= $idhd ?>,<?= $i ?>)"> Chi tiết <i class="far fa-edit"></i></a> </td></button>
                                            </tr>
                                        <?php
                                            $an++;
                                        }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Danh sách các bài tập đã đăng ký
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table" id="ok">
                                    <thead>
                                        <tr style="background-color: #6b696b; color: white">
                                            <th scope="col">Mã hóa đơn</th>
                                            <th>Tên bài tập đã đăng ký</th>
                                            <th>Giá bài tập </th>
                                            <th>Ngày đăng ký</th>
                                            <th>Ngày hết hạn</th>
                                            <th>Mã thiết bị</th>
                                            <th>Tiền phải thanh toán</th>
                                        </tr>
                                    </thead>
                                    <tbody id="exersie">
                                        <?php
                                        $i = 0;
                                        $an = 1;
                                        while ($arr1 = mysqli_fetch_array($data["dsbt"])) {
                                            $i++;

                                            if ($an == 2)
                                                $an = 1;
                                        ?>
                                            <tr style="background-color: <?php if ($an == 1) echo "#f7f7de" ?>  ">
                                                <td><?= $arr1[0] ?></td>
                                                <td><?= $arr1[1] ?></td>
                                                <td><?= $arr1[2] ?></td>
                                                <td><?= $arr1[3] ?></td>
                                                <td><?= $arr1[4] ?></td>
                                                <td><?= $arr1[5] ?></td>
                                                <td><?= currency_format($arr1[6]) ?> VNĐ</td>
                                            </tr>
                                        <?php
                                            $an++;
                                        }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="detailtFood" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết hóa đơn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Mã SP</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Thể loại</th>
                                <th scope="col">Số lượng mua</th>
                                <th scope="col">Giá</th>
                            </tr>
                        </thead>
                        <tbody id="thanChitiet">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>

                </div>
            </div>
        </div>
        <script>
            let idTy = 1;
            $("select.form-select").change(function() {
                var selectedCountry = $(this).children("option:selected").val();
                idTy = selectedCountry;
                SearchE(idTy);
                $.ajax({
                    type: "POST",
                    url: "/Bill/SearchFood",
                    data: {
                        "idTy": idTy
                    },
                    success: function(msg) {
                        $("#food").html(msg)
                    }
                })

            });


            function SearchE(id) {
                $.ajax({
                    type: "POST",
                    url: "/Bill/SearchE",
                    data: {
                        "idTy": idTy
                    },
                    success: function(msg) {

                        $("#exersie").html(msg)
                    }
                })

            }

            function Detailt(idhd, line) {
                $.post("/Bill/Detailt", {
                        idhd: idhd
                    },
                    function(msg) {
                        $("#thanChitiet").html(msg);
                    }
                )
            }

            function ViewSearch() {
                $('#example').dataTable({
                    "language": {
                        "sProcessing": "Đang xử lý...",
                        "sLengthMenu": "Xem _MENU_ mục",
                        "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                        "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                        "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                        "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                        "sInfoPostFix": "",
                        "sSearch": "Tìm:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Đầu",
                            "sPrevious": "Trước",
                            "sNext": "Tiếp",
                            "sLast": "Cuối"
                        }
                    }
                });
            }

            function ViewButton() {
                $('#example').dataTable({
                    "language": {
                        "sProcessing": "Đang xử lý...",
                        "sLengthMenu": "Xem _MENU_ mục",
                        "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                        "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                        "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                        "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                        "sInfoPostFix": "",
                        "sSearch": "Tìm:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Đầu",
                            "sPrevious": "Trước",
                            "sNext": "Tiếp",
                            "sLast": "Cuối"
                        }
                    }
                });
            }

            function View() {
                $.post("/Bill/ViewAll", {},
                    function(msg) {
                        $("#thanChitiet").html(msg);
                    }
                )
            }
            $(document).ready(function() {
                ViewButton();
            });
        </script>


</body>

</html>