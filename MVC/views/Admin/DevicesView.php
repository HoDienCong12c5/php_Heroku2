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
                    <li class="breadcrumb-item active">Danh sách thiết bị </li>
                </ul>
            </div>
            <section>
                <div class="card mb-4">
                    <div class="card-header">

                        <div class=" row">
                            <div class="col-md-5">
                                <div class="card-heading">Danh sách thiết bị - chi tiết</div>

                            </div>

                            <div class="col-md-3">

                            </div>
                            <div class="col-md-4">

                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">Tìm kiếm</span>
                                    <input class="form-control" id="nameD" type="text">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-body text-muted">
                        <button type="button" class="btn btn-info" data-bs-toggle='modal' data-bs-target='#addnew'>Thêm mới</button>
                        <div class=" row">
                            <div class="col-md-3"> 
                            </div> 
                        </div>
                        <table class="table" id="datatable1">
                            <thead>
                                <tr>
                                    <th>Mã TB</th>
                                    <th>Hình</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Tổng</th>
                                    <th>Hư</th>
                                    <th>Ngày mua</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                                <?php
                                $dt = $data['data'];
                                $i = 0;
                                while ($r = mysqli_fetch_array($dt)) {
                                    $coler = $i % 2 == 0 ? 'antiquewhite' : '';
                                    echo " <tr class='align-middle' style='background-color:$coler'>
                                                <td id='id$r[0]'>$r[0]</td>
                                                <td><img style='width: 100px;height: 100px;' src='/Public/images/ThietBiAdmin/$r[1]'></td> 
                                                <td>$r[2]</td>
                                                <td>$r[3]</td>
                                                <td>$r[4]</td>
                                                <td>$r[5]</td>
                                                <td>$r[6]</td> 
                                                <td >
                                                    <button data-bs-toggle='modal' data-bs-target='#exampleModal' ><a class='me-3 text-lg text-success' href='javascript:Edit($r[0],$i)' ><i class='far fa-edit'></i></a></button>
                                                    <button><a class='text-lg text-danger' href='javascript:Delete($r[0],$i)'><i class='far fa-trash-alt'></i></a></button>
                                                </td>
                                            </tr>";
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới thiết bị</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form role="form" method="POST">
                    <div class="modal-body">
                        <table>
                            <tr>
                                <td>Tên thiết bị :</td>
                                <td>
                                    <input type="text" id="name" class="form-control">
                                </td>

                            </tr>
                            <tr>
                                <td>Giá :</td>
                                <td>
                                    <input type="number" id="price" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Số lượng :</td>
                                <td>
                                    <input type="number" id="amount" class="form-control" value="100">
                                </td>
                            </tr>
                            <tr>
                                <td>Số lượng hư :</td>
                                <td>
                                    <input type="number" id="fail" class="form-control" value="0" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Chọn hình
                                </td>
                                <td>
                                    <input type="file" id="file" name="sortpic" required="" accept="image/*" onchange="loadFile(event)">
                                    <br>
                                    <img style="width: 200px; height: 200px;" src="/Public/images/AnhSanPham/<?= $img ?>" id="img" name="img">
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>

                        <button name="save" id="saveNew" type="button" class="btn btn-primary" data-bs-dismiss="modal">Đồng ý</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thay đổi công việc</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form fo>
                        <table role="form" method="POST">
                            <tbody id="content">

                            </tbody>

                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    <input type="submit" name="save" id="save" value="Đồng ý" class="btn btn-primary" />
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/All/js/jQuery.js"></script>
    <script src="/Public/All/js/bootstrap.min.js" type="text/javascript"></script>
    <script>
        let img = '';
        let amount = 1;
        let price = 0;
        let fail = 0;
        let name = '';

        $('input[name=sortpic]').change(function(e) {
            img = e.target.files[0].name;
        });

        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        $("#saveNew").click(function() {
            var file_data = "";
            if ($("#file").val() != '') {
                file_data = $('#file').prop('files')[0];
            };
            price = $("#price").val();
            name = $("#name").val();
            amount = $("#amount").val();
            if (price < 1 || name =='' || amount < 1)
                alert(name);
            else {
                var form_data = new FormData(); 
                form_data.append('img', file_data);
                form_data.append('name', name);
                form_data.append('price', price);
                form_data.append('amount', amount);
                form_data.append('fail', fail); 
                $.ajax({
                    type: "POST",
                    url: "/Admin/Devices/AddNew",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(msg) {
                        alert(msg)
                        if (msg == 1)
                            alert("Thêm mới thành công");
                        else
                            alert("Sửa thất thấp bại");
                    }
                })
            }

            return false;
        })
        function Delete(id,line){
            var result=confirm("Bạn có chắc xóa ?");
            if(result){
                $.post("/Admin/Devices/Delete",{
                    id:id
                    },
                    function(msg){
                        if(msg==0)
                            alert("Không thể xóa vì đang sử dụng")
                    }
                )
            }
        }
        function View(){
            $.post("/Admin/Devices/ViewAll"
                ,{},
                function(msg){
                    $("#content").html(msg);
                }
            )
        }
        $(document).ready(function() {  
            View();
            $("#nameD").keyup(function(){
                let name=$("#nameD").val();
                $.post("/Admin/Devices/SearchName",{
                    name:name
                    },
                    function(msg){
                        $("#content").html(msg);
                    }
                )
            })
        })
    </script>
    <script>
        let img = '';
        let amount = 1;
        let price = 0;
        let fail = 0;
        let name = '';

        $('input[name=sortpic]').change(function(e) {
            img = e.target.files[0].name;
        });

        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
        $(document).ready(function(){

        })
    </script>
</body>

</html>