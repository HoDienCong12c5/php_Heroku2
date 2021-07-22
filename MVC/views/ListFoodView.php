<?php
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
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
    <link href="/Public/All/css/styleListFood.css" rel="stylesheet" >
    
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
   
    <div id="thanFood" class="thanFood">
        <div class="thantrong">
            <div class="khungtieude">
                <lable class="tieude">Sản phẩm của chúng tôi</lable>
            </div>
            <div>
            <div class="container">
                <div class="row">
                    <div class="col order-last">
                        <div class="input-group input-group-sm input-group-navbar">
                            <input id="search" class="form-control" id="searchInput" type="search" placeholder="Search">
                            <button class="btn" type="button"> <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col"> 
                    </div>
                    <div class="col order-first">
                        <select name="dm" id="dm"  class="form-select" aria-label="Default select example">
                            <option selected value="-1">Chọn loại thực phẩm (tất cả)</option>
                            <?php
                                $dm=$data['dm'];
                                while($r=mysqli_fetch_array($dm)){
                                    ?>
                                    <option value="<?=$r[0]?>"><?= $r[1]?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                </div>
            </div> 
            <br/>
            <div id="ds"> 
                <?php
                    $i=0;
                    while($row2=mysqli_fetch_array($data["dstp"])){
                        $tongsl=$row2[4];
                        $ban=$row2[5];
                        $sl=$tongsl- $ban;
                        $i++;
                        if($i==5)
                        {   $i=0;
                            echo "<br/>";
                        }
                ?>
                    <div id="voSP" class="voSP">
                        <div id="sanpham" class="sanpham">
                            <image id="anhSP" src="/Public/images/AnhSanPham/<?= $row2[1]?>" class="anhSP"/><br/><br/>
                        <b> <label class="tenSP"><?= $row2[2] ?></label><br/></b>
                            <label >Giá:  </label>
                            <label class="giaSP"> <?= currency_format($row2[3]) ?></label><lable>  VNĐ</lable><br/>
                            <label>Số lượng bán: <?= $sl ?></label><br/>
                            <a href='./FoodDetail?idFood=<?php echo $row2[0] ?>' ><image class="btnmua" src="/Public/images/AnhChucNang/chon_mua_nn.gif"></image></a>
                        </div>
                    </div>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="/Public/All/js/jQuery.js"></script>
    <script src="/Public/All/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#search").keyup(function(){
                let name=$("#search").val()
                $.ajax({
                    type:"post",
                    url:"ListFood/Search",
                    data:{
                        "name":name
                    },
                    success:function(msg){ 
                        $("#ds").html(msg);
                    }
                })
            })    
            $("select.form-select").change(function(){
                var idTy = $(this).children("option:selected").val();
                    $.ajax({
                    type:"post",
                    url:"/ListFood/SKind",
                    data:{
                        "idTy":idTy
                    },
                    success:function(msg){ 
                        $("#ds").html(msg);
                    }
                })
            })
        })
    </script>
</body>