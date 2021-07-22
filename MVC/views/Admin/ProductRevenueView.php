<?php
function currency_format($number, $suffix = '')
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
    <div>
        <canvas id="switcher" class="switcher"></canvas>
    </div>
    <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
            <section>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-heading"><b>DOANH THU SẢN PHẨM BÁN ĐƯỢC</b></div>
                    </div>
                    <div class=" container-fluid">
                        <div class=" row">
                            <div class="col-md-2">
                            
                            </div>
                            <div class="col-md-8">
                            <canvas id="chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class=" container-fluid">
                        <div class=" row">
                            <div class="col-md-8">
                                <lable>Từ: </lable><input id="ngBegin" type="date" />
                                <lable>Đến: </lable><input id="ngEnd" type="date" />
                                <button id="tim" class="btn btn-primary btn-sm">Duyệt</button>

                                <br>
                                <b><label id="doanhthu" style="color:red;"></label></b>                             
                            </div>
                            <div class="col-md-3">
                                <button id="xemALL" class="btn btn-info">Xem tất cả</button>
                            </div>
                        </div>
                    </div> 
                    <div class="card-body text-muted">

                        <table class="table" id="datatable1">
                            <thead>
                                <tr>
                                    <th>Mã HD</th>
                                    <th>Mã KH</th>
                                    <th>Tên người mua</th>
                                    <th>Tổng tiền thu</th>
                                    <th>Ngày mua</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody id="billFood">
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
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <th scope="col">Mã sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Số lượng mua</th>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/Public/All/js/jQuery.js"></script>
    <script>
        function ViewRevenue() {
            $.post("/Admin/ProductRevenue/Chartt",
                function(msg) {
                    $("#totalR").html(msg);
                    arr = <?= ProductRevenue::Chart()?>;
                    const ctx = document.getElementById("chart").getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4",
                                "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"
                            ],
                            datasets: [{
                                label: 'food Items',
                                backgroundColor: 'rgba(161, 198, 247, 1)',
                                borderColor: 'rgb(47, 128, 237)',
                                data: arr,
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                    }
                                }]
                            }
                        },
                    });
                }
            )
        }

        function view() {
            $.ajax({
                type: "POST",
                url: "/Admin/ProductRevenue/getDS",
                success: function(msg) {
                    $("#billFood").html(msg);
                }
            })
        }

        function DoanhThu() {
            var d1 = new Date($("#ngBegin").val());
            var d2 = new Date($("#ngEnd").val());
            var ngBegin = $("#ngBegin").val();
            var ngEnd = $("#ngEnd").val();
            $.post("/Admin/ProductRevenue/DoanhThu", {
                    ngBegin: ngBegin,
                    ngEnd: ngEnd
                },
                function(msg) { 
                    $("#doanhthu").html(msg)
                }
            )
        } 
        $(document).ready(function() {
            ViewRevenue();
            view(); 
            $("#tim").click(function() {
                if ($("#ngBegin").val() == '' || $("#ngEnd").val() == '') {
                    if ($("#ngBegin").val() == '') {
                        alert("Chưa chọn ngày bắt đầu?");
                    } else {
                        alert("Chưa chọn ngày kết thúc?");
                    }
                } else {
                    var d1 = new Date($("#ngBegin").val());
                    var d2 = new Date($("#ngEnd").val());
                    var ngBegin = $("#ngBegin").val();
                    var ngEnd = $("#ngEnd").val();
                    if (d1 <= d2) {

                        $.ajax({
                            type: "POST",
                            url: "./ProductRevenue/getTheoNgay",
                            data: {
                                "ngBegin": ngBegin,
                                "ngEnd": ngEnd,
                            },
                            success: function(msg) {
                                $("#billFood").html(msg)
                                DoanhThu( );
                            }
                        })
                    } else {
                        alert("Thời gian chọn chưa hớp lý!");
                    }

                }
                $("#xemALL").click(function() {
                    view();
                })
            })
        })
    </script>
    <script>
        function delet(id) {
            $.ajax({
                type: "POST",
                url: "/Admin/ProductRevenue/getDetail",
                data: {
                    "id": id
                },
                success: function(msg) {
                    $("#thanChitiet").html(msg);
                }
            })
        }
    </script>
    <script src="/Public/All/js/bootrap.bunlder.min.js"></script>
    <script src="/Public/Admin/js/chart.js"></script>
    <script src="/Public/Admin/js/chartNew.js"></script>
</body>

</html>