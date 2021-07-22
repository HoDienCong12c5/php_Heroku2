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
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Danh sách Nhân Viên </li>
                </ul>
            </div>
            <section>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-heading">Danh sách Nhân Viên - chi tiết</div>
                    </div>
                    <div class="card-body text-muted">
                        <div style="width: 300px;">
                            <br>
                            <label><b>Lọc danh sách : </b></label>
                            <select id="type" name="type" class="form-select" aria-label="Default select example">
                                <option selected value="-1">Tất cả</option>
                                <?php

                                while ($l = mysqli_fetch_array($data['partTime'])) {
                                    echo "ok";
                                ?>
                                    <option value="<?= $l[0] ?>"> <?= $l[1] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <table class="table" id="datatable1">
                            <thead>
                                <tr>
                                    <th>Mã NV</th>
                                    <th> Công việc</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>SDT</th>
                                    <th>GT</th>
                                    <th>Lương cơ bản</th>
                                    <th>Ngày DK</th>
                                    <th style='width:400px'>Chức năng</th>

                                </tr>
                            </thead>
                            <tbody id="ds">
                                <?php
                                $i = 0;
                                while ($r = mysqli_fetch_array($data['data'])) {
                                    $sex = $r[5] == 0 ? 'nam' : 'nữ';
                                    $luong = $this->currency_format($r[6]);
                                    echo "<tr>
                                            <td><div id='idp$r[0]'>$r[0]</div></td>
                                            <td>$r[1]</td>
                                            <td>$r[2]</td>
                                            <td>$r[3]</td>
                                            <td>$r[4]</td>
                                            <td>$sex</td>
                                            <td>$luong</td>
                                            <td>$r[7]</td>
                                            <td>
                                                <button><a class='me-3 text-lg text-success' href='javascript:Edit($r[0],$i)' ><i class='far fa-edit'></i></a></button>
                                                <button><a class='text-lg text-danger' href='javascript:Delete($r[0],$i)'><i class='far fa-trash-alt'></i></a></button>
                                            </td>
                                        </tr>";
                                }
                                $i++;
                                ?>
                            </tbody>
                        </table>
            </section>
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
                    <table>
                        <tbody id="content">

                        </tbody>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    <input type="submit" name="save" id="save" value="Đồng ý" class="btn btn-primary" />
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/All/js/jQuery.js"></script>
    <script src="/Public/All/js/bootrap.bunlder.min.js"></script>
    <script>
        let idW = -1;
        let idP = -1;
        var idTy=-1;                        
        function View() {
            $.post("/Admin/Staff/ViewStaff", {},
                function(data) {
                    $("#ds").html(data)
                }
            )
        }

        function Edit(id, line) {
            idP = id;
            $.post("/Admin/Staff/StaffDetail", {
                    idP: id
                },
                function(msg) {
                    $("#content").html(msg);
                    $("select.form-select").change(function() {
                        var sel = $(this).children("option:selected").val();
                        idW = sel;
                        $.post("/Admin/Staff/SelectWork", {
                                idW: idW
                            },
                            function(msg) {
                                $("#Salary").html(msg);
                            }
                        )
                    });
                }
            )
        }

        function Delete(id, line) {

            var result = confirm("Bạn có chắc chắn xóa ?");
            if (result) {
                $.post("/Admin/Staff/Delete", {
                        id: id
                    },
                    function(data) {
                        alert("Xóa thành công");
                        View();
                    }
                )
            }
        }
        $("#type").change(function() {
            var selectedCountry = $(this).children("option:selected").val();
            idTy = selectedCountry;
            if(idTy==-1)
                View();
            else{
                $.post("/Admin/Staff/Search", {
                    idTy:idTy
                    },
                    function(data) {
                        $("#ds").html(data)
                    }
                )
            }
            
        });
        $("select.form-select").change(function() {
            var selectedCountry = $(this).children("option:selected").val();
            idTy = selectedCountry;
        });
        $("#save").click(function() {
            if (idP == -1)
                alert("Cập nhật thành công");
            else {
                $.post("/Admin/Staff/Update", {
                    idP: idP,
                    idW: idW
                }, function(msg) {
                    
                    alert("Sửa thành công");
                    View();
                })
            }
        })
        $(document).ready(function() {
            View();

        })
    </script>
</body>

</html>