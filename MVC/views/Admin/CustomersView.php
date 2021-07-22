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
                    <li class="breadcrumb-item active">Danh sách khách hàng </li>
                </ul>
            </div>
            <section>
                <div class="card mb-4">
                    <div class="card-header">

                        <div class=" row">
                            <div class="col-md-5">
                                <div class="card-heading">Danh sách khách hàng - chi tiết</div>

                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-4">

                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">Tìm kiếm</span>
                                    <input class="form-control" id="name" type="text">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-body text-muted">
                        <div class=" row">
                            <div class="col-md-3">
                                <label class="form-label" for="validationCustomUsername">Lọc theo ngày</label>

                                <select id="type" name="type" class="form-select" aria-label="Default select example">

                                    <option selected value="0">Hôm nay</option>
                                    <option selected value="1">Tháng này</option>
                                    <option selected value="2">Tất cả</option>
                                </select>
                            </div>


                        </div>
                        <table class="table" id="datatable1">
                            <thead>
                                <tr>
                                    <th>Mã KH</th>
                                    <th>Tên</th>
                                    <th>User</th>
                                    <th>pass</th>
                                    <th>Gmail</th>
                                    <th>SDT</th>
                                    <th>Điểm TL</th>
                                    <th>Ngày đăng ký</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                                <?php
                                //$dt=json_decode($data['data']);
                                $dt = $data['data'];
                                $i = 0;
                                while ($r = mysqli_fetch_array($dt)) {
                                    $coler = $i % 2 == 0 ? 'antiquewhite' : '';
                                    echo " <tr class='align-middle' style='background-color:$coler'>
                                                <td id='id$r[0]'>$r[0]</td>
                                                <td>$r[1]</td> 
                                                <td>$r[2]</td>
                                                <td>$r[3]</td>
                                                <td>$r[4]</td>
                                                <td>$r[5]</td>
                                                <td>$r[6]</td>
                                                <td>$r[7]</td>
                                                <td>
                                                    <a class='text-lg text-danger' href='javascript:Delete($r[0] , $i)'><i class='far fa-trash-alt'></i></a>
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
    <script src="/Public/All/js/jQuery.js"></script>
    <script>
        function Delete(id,line){ 
            var result=confirm("bạn có chắc chắn xóa ?");
            if(result){
                $.post("/Admin/Customers/Delete",{
                    id:id
                    },
                    function(msg){
                        if(msg==0)
                            alert("KHông thể xóa vì khách hàng này đã có trong hóa đơn hoặc danh sách đăng ký bài tập")
                        else{ 
                            alert("thành công");
                            $("table").find("#id"+id).each(function(){ 
                                $(this).parent("tr").remove();
                            })
                        }
                        
                    }
                )
            }
           
        }
        $(document).ready(function(){
            let idTy = 1;
            $("select.form-select").change(function(){
                let x=$(this).children("option:selected").val();
                $.post("/Admin/Customers/Search",{
                    idTy:x
                    },
                    function(msg){
                        $("#content").html(msg);
                    }
                )
            })
            $("#name").keyup(function(){
                let name=$("#name").val();
                $.post("/Admin/Customers/SearchName",{
                    name:name
                    },
                    function(msg){
                        $("#content").html(msg);
                    }
                )
            })

        })
    </script>
</body>

</html>