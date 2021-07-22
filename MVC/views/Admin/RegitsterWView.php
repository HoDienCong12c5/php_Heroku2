<?php 
  function currency_format($number, $suffix = '  VNĐ') {
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
              <!-- Breadcrumbs -->
              <div class="page-breadcrumb">
                <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Admin/ListWork">Home</a></li>
                  <li class="breadcrumb-item active">Danh sách thực phẩm bổ sung    </li>
                </ul>
              </div>
          <section>
            <div class="card mb-4">
              <div class="card-header">
                <div class="card-heading">Danh sách thực phẩm bổ sung - chi tiết</div>
              </div>
              <div class="card-body text-muted">
                <div style="width: 300px;">
                <br>
                  <label><b>Lọc danh sách : </b></label>
                  <select id="type" name="type" class="form-select" aria-label="Default select example">
                    <option selected value="0">Tất cả</option>
                    <option  value="1">Hôm nay</option>
                    <option  value="2">Tuần này</option>
                    <option  value="3">Tháng này</option>
                  </select>
                </div>
               
            <table class="table" id="datatable1">
                    <thead>
                      <tr>
                        <th>Mã HD</th> 
                        <th>Mã KH</th>
                        <th>Mã BT</th>
                        <th>Tên BT</th>
                        <th>Giá</th>
                        <th>Ngày Đăng ký</th>
                        <th>Ngày hết hạn</th>
                        <th>Chức năng</th>
                      </tr>
                    </thead>
                    <tbody id="content" >
                      <?php
                        $i=0;
                        while($r=mysqli_fetch_array($data['data'])){
                            ?>
                                    <tr class="align-middle"style="background-color:<?= $i%2==0 ?'antiquewhite':'' ?>;" >
                                        <td>
                                            <?=$r[0]?>
                                            <div id="<?=$i?>"></div>
                                        </td>
                                        <td ><?=$r[1]?></td>
                                        <td><div id="d<?= $i ?>"><?=$r[2] ?> </div></td>
                                        <td><?=$r[6] ?></td>
                                        <td> <?= currency_format($r[5])?></td>
                                        <td > <?=$r[3]?> </td>
                                        <td>
                                            <?=$r[4]?>
                                        </td> 
                                        <td><a class="me-3 text-lg text-success" href="javascript:duyet(<?=$i?>,<?=$r[0]?>)"><i class="far fa-edit">Duyệt</i></a>
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
        let idW='';
        function duyet(line,id){
            var result=confirm("Duyệt sẽ tính ngày bắt đầu ngay từ lúc duyệt")
            if(result){
                $("table").find("#d"+line).each(function(){
                    idW=$("#d"+line).text();
                });
                $.post("/Admin/RegitsterW/Submit",{
                    id:id,
                    idW:idW
                    },
                    function(msg){
                        alert(msg);
                        $("table").find("#"+line).each(function(){
                            $(this).parents("tr").remove();
                        });

                    }
                )
            }
           
        }
        $(document).ready(function(){
            $("select.form-select").change(function(){
                var d= $(this).children("option:selected").val();
                var date=d;
                $.post("/Admin/RegitsterW/Search",{
                    date:d
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