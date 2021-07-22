<?php
    /* $s="12/12/2021";
    $d=date( date_format(date_create_from_format('d/m/Y', $s), 'Y-m-d'));
    echo strtotime($d); */
    function currency_format($number, $suffix = '') {
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
        $mt=new Master();
        $mt->index();
    ?>
    <div class="page-holder bg-gray-100">
    <div class="container-fluid px-lg-4 px-xl-5">
             
          <section>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-heading"><b>CÁC BÀI TẬP ĐĂNG KÝ ĐANG CHỜ DUYỆT</b></div>
                </div>
                <div class="card-body text-muted">
                <div>
                    <lable>Từ: </lable><input id="ngBegin" type="date"/>
                    <lable>Đến: </lable><input id="ngEnd" type="date"/>
                    <button id="tim" >Tìm</button>
                    <br>
                    <button id="xemALL" >Xem tất cả</button>
                </div>
                <table class="table" id="datatable1">
                        <thead>
                        <tr> 
                            <th>Mã KH</th> 
                            <th>Tên người</th>
                            <th>Tên bài tập</th>
                            <th>Ngày đăng ký</th>
                            <th>Chức ngày hết hạn</th>
                            <th>Tình trạng</th>
                        </tr>
                        </thead>
                            <tbody id="baitap">
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



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/Public/All/js/jQuery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        function view(){
            $.ajax({
                type: "POST",
                url: "/Admin/ApprovedAssignme/getDL",
                success: function(msg){
                    $("#baitap").html(msg);
                }
            })
        }
        $(document).ready(function(){
            view();
        })
    </script>
</body>
</html>