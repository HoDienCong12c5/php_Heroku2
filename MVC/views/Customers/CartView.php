<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/Public/All/css/bootsrap.min.css" rel="stylesheet">

</head>

<body>
    <?php
    include_once "./MVC/controllers/Header.php";
    $h = new Header();
    $h->index();
    $data = null;
    $id = -1;
    if (isset($_SESSION['user_id'])) {
        $data = $_SESSION['card'];
    }

    ?>
    <br>
    <br>
    <br>
    <br> 
    <br>
    <di class="body">
        
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="/Public/All/css/jquery-ui-datetime.css">
        <link rel="stylesheet" href="/Public/All/css/css_body_gio_hang.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
         
        <div id="than">
            <article>
                <section>
                    <div>
                        <table class="tb" id="card">
                            <?php
                            include_once("MVC/models/Customers/CartModel.php");
                            $c = new CartModel();
                            $line = 0;
                            if ($data) {
                                foreach ($data as $item) {
                            ?>
                                    <tr class="nd">
                                        <td><a class="text-lg text-danger" href="javascript:delet(<?= $item[0] ?>,<?= $line ?>)"><i class="far fa-trash-alt"></i>xóa</a></td>
                                        <td><img src="/Public/images/AnhSanPham/<?= $item[1] ?>" width="100" height="100" /></td>
                                        <td style="width:350px">
                                            <b>Tên thực phẩm : <label><?= $item[2] ?></label>
                                                <div id="<?= $line ?>"></div>
                                            </b>
                                        </td>
                                        <td style="width:150px">
                                            <font color="#FF0000">Giá : <?= $item[4] ?></font><br />
                                        </td>
                                        <td style="width:200px">
                                            <div class="input-group">
                                                <span id="plus" class="input-group-text btn btn-danger" onclick="down(<?= $line ?>)"> - </span>
                                                <input type="number" value="<?= $item[3] ?>" class="form-control text-center" min="1" max="100" id="amount<?=$line?>" readonly>
                                                <span class="input-group-text btn btn-success" onclick="plus(<?= $line ?>)"> + </span>
                                            </div>
                                        </td>
                                        <br>
                                <?php $line++;
                                }
                            }
                                ?>
                                <br />
                        </table>
                    </div>

                </section>
                <aside id="benphai" class="right">
                    <div class="dh">
                        <div>
                            <font size="+2"><b> &nbsp;&nbsp;Địa điểm</b></font>
                        </div>
                        <table>
                            <tr>
                                <td><img src="anh_cac_phan_trong_trang_chu/diadiem.png" /></td>
                                <td>
                                    <font size="-1">Bình Dương,Thành Phố Thủ Dầu Một,Phường Phú Hòa</font>
                                </td>
                            </tr>
                        </table>

                        <div><b>
                                <font size="+1">&nbsp;&nbsp;Thông tin đơn hàng</font>
                            </b></div>
                        <div class="clear"></div>
                        <table class="dathang" id="bill">
                            
                            <tr>
                            <div class="clear"></div>
                            </tr>
                        </table>
                        <div class="xacnhan" align="center"><input class="btn btn-outline-success" type="submit" id="pay" value="Thanh toán "></div>
                        <br />
                        <div id="msg">

                        </div>
                    </div>


                </aside>
            </article>
            <script src="/Public/All/js/jQuery.js"></script>
            <script src="/Public/All/js/bootrap.bunlder.min.js"></script>


            <script>
                function delet(id, line) {
                    var result = confirm("Bạn có chắc chắn xóa ?");
                    if (result) {
                        $("table").find("#" + line + "").each(function() {
                            $.post("/Cart/Remove", {
                                    id: id,
                                    line: line
                                },
                                function(msg) {
                                    View();
                                }
                            )
                            $(this).parents("tr").remove();
                        });
                    }
                }

                function View() {
                    $.post("/Cart/ViewBill", {

                        },
                        function(msg) {
                            $("#bill").html(msg)
                        }
                    )
                }

                function plus(line) {
                    let nb = $("#amount"+line).val()
                    let aa = new Number(nb)
                    aa = aa + 1;
                    $("#amount"+line).val(aa)
                    $.post("/Cart/EditSoLuong", {
                            action: 1,
                            line: line
                        },
                        function(msg) {
                            View();
                        }
                    )
                }

                function down(line) {
                    let nb = $("#amount"+line).val()
                    let aa = new Number(nb)
                    aa = aa - 1;
                    if (aa < 1) {
                        alert("Không thể nhỏ hơn 1");
                    } else {
                        $("#amount"+line).val(aa);
                        $.post("/Cart/EditSoLuong", {
                                action: -1,
                                line: line
                            },
                            function(msg) {
                                View();
                            }

                        )
                    }
                }
                $(document).ready(function() {
                    View();
                   
                    $("#pay").click(function() {
                        $.post("/Cart/Pay", {

                            },
                            function(msg) {
                                if (msg == '') {
                                    alert("Thanh toán thành công");
                                    $("#card").html("");
                                    View();
                                } else {
                                    $("#msg").html(msg);

                                }

                            }
                        )
                        return false;
                    })

                })
            </script>
</body>

</html>