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
    $mt = new Master();
    $mt->index();
    $id = "";
    $name = "";
    $price = "";
    $amount = "";
    $img = "";
    $sold = "";
    $idTy = "";
    $nameType = "";
    $lkf = $data['lkf'];
    if (isset($data['data'])) {
        $r = mysqli_fetch_array($data['data']);
        $id = $r[0];
        $img = $r[1];
        $name = $r[2];
        $price = $r[3];
        $amount = $r[4];
        $sold = $r[5];
        $idTy = $r[6];
        $nameType = $r[7];
    }
    ?>
    <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
            <section>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-heading"><?= $id != '' ? 'CHỈNH SỬA THỤC PHẨM' : 'THÊM MỚI THỰC PHẨM' ?></div>
                    </div>
                    <div class="card-body text-muted">
                        <form role="form" method="POST">
                            <table class="tb">
                                <tr>
                                    <td>
                                        <label><b>Mã thực phẩm : </b></label>
                                    </td>
                                    <td>
                                        <input class="form-control" value="<?= $id == '' ? 'Sẽ tự tăng khi thêm' : $id ?>" readonly>
                                    </td>
                                    <td rowspan=6>
                                        <input type="file" id="file" name="sortpic" required="" accept="image/*" onchange="loadFile(event)">
                                        <br>
                                        <img style="width: 300px;height: 300px;" src="/Public/images/AnhSanPham/<?= $img ?>" id="img" name="img">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label><b>Tên thực phẩm : </b></label>
                                    </td>
                                    <td>
                                        <input class="form-control" id="name" value="<?= $name == '' ? '' : $name ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label><b>Giá thực phẩm : </b></label>
                                    </td>
                                    <td>
                                        <input class="form-control" id="price" value="<?= $price == '' ? '' : $price ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label><b>Số lượng nhập: </b></label>
                                    </td>
                                    <td>
                                        <input class="form-control" id="amount" value="<?= $amount == '' ? '' : $amount ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label><b>Sô lượng đã bán : </b></label>
                                    </td>
                                    <td>
                                        <input class="form-control" id="sold" value="<?= $sold == 'mặc định là 0' ? '' : $sold ?>" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label><b>Thể loại : </b></label>
                                    </td>
                                    <td>
                                        <?php
                                        if ($idTy != '') { ?>
                                            <select id="kind" class="kind" name="kind">
                                                <?php
                                                while ($n = mysqli_fetch_array($lkf)) {
                                                    if ($n[0] == $idTy) {
                                                ?>
                                                        <option selected="selected" value="<?= $n[0] ?>"><?= $n[1] ?></option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?= $n[0] ?>"><?= $n[1] ?></option>
                                                <?php
                                                    }
                                                } ?>
                                            </select>
                                        <?php
                                        } else { ?>
                                            <select id="kind" class="kind" name="kind">
                                                <?php
                                                while ($n = mysqli_fetch_array($lkf)) {
                                                ?>
                                                    <option value="<?= $n[0] ?>"><?= $n[1] ?></option>
                                                <?php
                                                } ?>
                                            </select>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </table>

                            <p></p>
                            <div style="margin: auto; text-align: center;">
                                <button style="display:<?= $id != '' ? '' : 'none' ?>;" id="saveEdit" class="btn btn-warning">Lưu Sửa</button>
                                <button style="display:<?= $id != '' ? 'none' : '' ?>;" id="save" class="btn btn-warning">Lưu Mới</button>
                            </div>
                    </div>
                    </form>

            </section>
        </div>
    </div>
    <script src="/Public/All/js/jQuery.js"></script>
    <script src="/Public/All/js/bootstrap.min.js" type="text/javascript"></script>


    <script>
        let img = '';
        let idTy = <?= $idTy == '' ? 1 : $idTy ?>;
        let name = '';
        let price = '';
        let amount = ''
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

        $("select.kind").change(function() {
            var selectedCountry = $(this).children("option:selected").val();
            idTy = selectedCountry;
        });

        $("#saveEdit").click(function() {
            var file_data = "";
            if ($("#file").val() != '') {
                file_data = $('#file').prop('files')[0];
            };

            name = $("#name").val();
            price = $("#price").val();
            amount = $("#amount").val();
            let sl = amount - $("#sold").val();
            if (sl < 1 || name == '' || price < 1) {
                alert(sl + "/" + amount)
            } else {
                let id = <?= $id ?>;
                var form_data = new FormData();
                form_data.append('id', id);
                form_data.append('img', file_data);
                form_data.append('name', name);
                form_data.append('price', price);
                form_data.append('amount', amount);
                form_data.append('idTy', idTy);
                $.ajax({
                    type: "POST",
                    url: "/Admin/Food/Update",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(msg) {
                        if (msg == 1)
                            alert("Sửa thành công");
                        else
                            alert("Sửa thất thấp bại");
                    }
                })
            }
            return false;
        })
    </script>
    <script>
        let img = '';
        let idTy = <?= $idTy == '' ? 1 : $idTy ?>;
        let name = '';
        let price = '';
        let amount = ''
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

        $("select.kind").change(function() {
            var selectedCountry = $(this).children("option:selected").val();
            idTy = selectedCountry;
        });

        $("#save").click(function() {
            var file_data = "";
            if ($("#file").val() != '') {
                file_data = $('#file').prop('files')[0];
            };
            var type = file_data.type;
            name = $("#name").val();
            price = $("#price").val();
            amount = $("#amount").val();
            if (img == '' || name == '' || price == '' || amount == '' || price < 1 || amount < 1) {
                alert("Chủ đủ điều kiện để thêm hoặc cập nhật");
            } else {
                var form_data = new FormData();
                form_data.append('img', file_data);
                form_data.append('name', name);
                form_data.append('price', price);
                form_data.append('amount', amount);
                form_data.append('idTy', idTy);
                $.ajax({
                    type: "POST",
                    url: "/Admin/Food/AddNew",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(msg) {
                        if (msg == 1)
                            alert("Thêm mới thành công");
                        else
                            alert(msg);
                    }
                })
            }
            return false;
        })
    </script>
</body>

</html>