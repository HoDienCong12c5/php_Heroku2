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
    <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">

            <section>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-heading"><b>DOANH THU CÁC BÀI TẬP</b></div>
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
                                <lable>Từ: </lable> <input id="txtngayBD" type="date">
                                <lable>Đến: </lable> <input id="txtngayKT" type="date" value="">
                                <input type="submit" class="btn btn-primary btn-sm" id="ok" value="Tìm" />

                                <br>
                                <b><label id="doanhthu" style="color:red;"></label></b>
                            </div>
                            <div class="col-md-3">
                                <button id="btnDuyet" class="btn btn-info">Xem tất cả</button>
                            </div>
                        </div>
                    </div>
                    <table class="table" id="datatable1">
                        <thead>
                            <tr>
                                <th>Mã ID</th>
                                <th>Tên người đăng ký</th>
                                <th>Tên bài tập</th>
                                <th>Giá bài tập</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody id="bill">
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="/Public/All/js/jQuery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        function ViewRevenue() {
            $.post("/Admin/ExerciseRevenue/ChartE",
                function(msg) { 
                    let arr = <?= ExerciseRevenue::Chart()?>;
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

        function DoanhThu() {
            var d1 = new Date($("#txtngayBD").val());
            var d2 = new Date($("#txtngayBD").val());
            var ngayBD = $("#txtngayBD").val();
            var ngayKT = $("#txtngayKT").val();
            $.post("/Admin/ExerciseRevenue/DoanhThu", {
                    ngBegin: ngayBD,
                    ngEnd: ngayKT, 
                },
                function(msg) {
                    $("#doanhthu").html(msg)
                }
            )
        }

        function view() {
            $.ajax({
                type: "POST",
                url: "/Admin/ExerciseRevenue/getDuyet",
                success: function(msg) {
                    $("#bill").html(msg);
                }
            })
        }
        $(document).ready(function() {
            ViewRevenue();
            view();

            $("#ok").click(function() {
                if ($("#txtngayKT").val() == '' || $("#txtngayBD").val() == "") {
                    if ($("#txtngayBD").val() == "") {
                        alert("Bạn chưa chọn ngày bắt đầu ?");
                    } else
                    if ($("#txtngayKT").val() == "") {
                        alert("Bạn chưa chọn ngày kết thúc ? ");
                    }
                } else {
                    var bd = new Date($("#txtngayBD").val());
                    var kt = new Date($("#txtngayKT").val());
                    var ngayBD = $("#txtngayBD").val();
                    var ngayKT = $("#txtngayKT").val();
                    if (bd < kt) {
                        $.ajax({
                            type: "POST",
                            url: "/ExerciseRevenue/gettheoNgay",
                            data: {
                                "ngayBD": ngayBD,
                                "ngayKT": ngayKT
                            },
                            success: function(msg) {
                                $("#bill").html(msg);
                                DoanhThu();
                            }
                        })
                    } else
                        alert("Chọn thời gian chưa hợp lý!");
                }
            })
            $("#btnDuyet").click(function() {
                view();
            })
        })
    </script>
</body>

</html>