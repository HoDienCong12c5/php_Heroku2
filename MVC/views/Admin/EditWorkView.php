<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Public/Admin/css/EditWork.css">

</head>
<body>
    <?php
        include "MVC/controllers/Admin/Master.php";
        $mt=new Master();
        $mt->index();
        $id="";
        $name="";
        $price="";
        $time="";
        $img="";
        $note="";
        $idDe="";
        if(isset($data['data'])){
            $r=mysqli_fetch_array($data['data']);
            $id=$r[0];
            $img=$r[1];
            $name=$r[2];
            $note=$r[3];
            $price=$r[4];
            $time=$r[5];
            $idDe=$r[6];
        }
    ?>
 <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
    <section>
        <div class="card mb-4">
            <div class="card-header">
                <div class="card-heading"><?= $id!=''?'CHỈNH SỬA BÀI TẬP':'THÊM MỚI BÀI TẬP'?></div>
            </div>
            
            <div class="card-body text-muted">
            <form role="form" method="POST">
                <table class="tb">
                    <tr>
                        <td>Mã bài tập : </td> 
                        <td><input class="form-control" id="id" type="text" value="<?php echo $id!=""?$id:'Tự tăng khi thêm mới...' ?>" readonly="" ></td>
                    </tr>  
                    <tr class="chan">
                        <td>Tên bài tập : </td>
                        <td><input class="form-control" id="name" type="text" value="<?php echo $name!=""?$name:'' ?>"></td>
                    </tr>  
                    <tr>
                        <td>Giá bài tập : </td>
                        <td><input class="form-control" id="price" value="<?php echo $price!=""?$price:'' ?>"  type="number"></td>
                    </tr> 
                    <tr class="chan">
                        <td>Thời hạn : </td>
                        <td>
                        <?php
                            if($time!=''){
                                ?>
                                <div class="input-group">
                                    <span class="input-group-text btn btn-danger" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> -     </span>
                                        <input type="number" value="<?=$time?>" class="form-control text-center" min="1" max="100" id="time">
                                    <span class="input-group-text btn btn-success" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> +    </span>
                                </div>
                                <?php
                            }
                            else{
                                ?>
                                <select id="cars" name="cars" class="cars">
                                    <?php 
                                        for($i=1 ; $i < 11 ; $i++){
                                            ?>
                                                <option value="<?=$i?>"><?=$i?><label> (Tháng) </label></option>
                                            
                                        <?php } ?>
                                </select>
                                <?php
                            }
                        ?>
                           
                        </td>
                    </tr> 
                    <tr>
                        <td>Mã thiết bị : </td>
                        <td>
                            <?php 
                                if($idDe!=""){
                                    ?>
                                        <label> <?=$idDe?></label>
                                    <?php
                                }
                                else
                                {?>
                                    <select id="idDe" name="idDe" class="idDe">
                                        <?php 

                                            while($r=mysqli_fetch_array($data["IDDe"])){
                                                ?>
                                                    <option value="<?=$r[0]?>"><?=$r[0]?></option>
                                                
                                            <?php } ?>
                                    </select>
                                <?php }
                            ?>
                        </td>
                    </tr> 
                    <tr class="chan" >
                        <td >Hình ảnh : </td>
                        <td><input  type="file" id="file" name="sortpic" required="" accept="image/*" onchange="loadFile(event)"><p>
                            <img id="img" name="img" style="height: 200px; width: 200px;" src="<?php echo $img!=''?"/Public/images/AnhBaiTap/$img":''?>"></p>
                        </td>
                    </tr>   
                    <tr>
                        <td>
                            Ghi chú :
                        </td>
                        <td>
                            <textarea value="<?php echo $note!=''?$note:'chưa có' ?>" class="txt" id="note"name ="note" rows="10"><?php echo $note!=''?$note:'' ?></textarea>
                        </td>
                    </tr>            
                </table>
                <p></p>
                <div style="margin: auto; text-align: center;">
                <button id="saveEdit" style="display:<?= $id!=''?'':'none'?>;" class="btn btn-warning"> Lưu sửa</button>                                

                 <button id="save" style="display:<?= $id!=''?'none':''?>;" class="btn btn-warning"> Lưu mới</button>                                
                </div>
                </form>
            </div>
        </div>
        
    </section>
    </div> 
 </div>
    <script src="/Public/All/js/jQuery.js"></script>
    <script src="/Public/All/js/bootstrap.min.js" type="text/javascript"></script>
     
  <script>
        let id='';
        let time=1;
        let idDe=1;
        let note="";
        let name="";
        let price=0;
        let img=""; 
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
            var output = document.getElementById('img');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
        $("select.idDe").change(function(){
                var selectedCountry = $(this).children("option:selected").val();
                idDe=selectedCountry; 
            });
        $('input[name=sortpic]').change(function(e){
            img = e.target.files[0].name;
        });
        $("#saveEdit").click(function(){
            var file_data="";
            if($("#file").val()!=''){
                file_data = $('#file').prop('files')[0]; 
            }; 
            name=$("#name").val();
            price=$("#price").val();
            amount=$("#amount").val();
            time=$("#time").val();
            note=$("#note").val();
            id=$("#id").val()
            if( name =='' || price <1 || amount <$("#sold").val()){
                alert("Chủ đủ điều kiện để thêm hoặc cập nhật");
            }
            else{
                var form_data = new FormData();
                form_data.append('price', price );
                form_data.append('img', file_data );
                form_data.append('name', name );
                form_data.append('note', note ); 
                form_data.append('time', time );
                form_data.append('idDe', idDe );
                form_data.append('id', id );
                $.ajax({
                    type:"post",
					url:"/Admin/EditWork/SaveEdit",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data:form_data,
                    success: function(msg){  
						if(msg==1)
                            alert("Sửa  thành công");
					}

                })

            }
            return false;
        })
        $("#save").on('click',function(){
            var file_data = $('#file').prop('files')[0]; 
            var type = file_data.type;
            price=$("#price").val();
            name=$("#name").val(); 
            note=$("#note").val(); 
            if(img=="" || name=="" || price=="" || note==""){
                alert("Chưa đủ dữ liệu để thêm")
            }
            else{
                var form_data = new FormData();
                form_data.append('price', price );
                form_data.append('img', file_data );
                form_data.append('name', name );
                form_data.append('note', note ); 
                form_data.append('time', time );
                form_data.append('idDe', idDe );
                $.ajax({
                    type:"post",
					url:"/Admin/EditWork/SaveNew",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data:form_data,
                    success: function(msg){
						if(msg==1)
                            alert("Thêm mới thành công");
                        else
                            alert(msg)
					}
                 })

            }
            return false;
        })
        $(document).ready(function(){ 
        })
    </script>
</body>
</html>