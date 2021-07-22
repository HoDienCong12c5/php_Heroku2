<?php
$amount = $data["remaining"];
$k = $data['lfood'];
$discount = isset($data["discount"]) ? $data["discount"] : 0;
$data = mysqli_fetch_array($data["data"]);
$code = $data[0];
$image = $data[1];
$name = $data[2];
$price = $data[3];
$type = $data[4];
$nameType = $data[5];
function currency_format($number, $suffix = 'đ')
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
    <link href="/Public/All/css/stypeFoodDetail.css" rel="stylesheet">
    <link href="/Public/All/css/bootsrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include "MVC/controllers/Header.php";
    $h = new Header();
    $h->index();

    ?>
    <br>
    <br>
    <br>
    <div class="thanfooddetail">
        <article>
            <section>
                <div class="ctspbentrai">
                    <div class='traiThongtin'><B><i><u>THÔNG TIN CHI TIẾT SẢN PHẨM</u></i></B></div>

                    <table class="food">
                        <tr>
                            <td rowspan='6' class='chuaKhungAnh'>
                                <div class='khungAnh'>
                                    <image class="img" src="/Public/images/AnhSanPham/<?= $image ?>"></image>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="nameTP"><b>Tên TP : <?= $name ?> </b></div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="giaTP"><b> <?= currency_format($price) ?></b></div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Số lượng :</label>
                                <select id="cars" name="cars" class="cars">
                                    <?php
                                    for ($i = 1; $i <= $amount; $i++) {
                                    ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="loaiTP">Loại thực phẩm: <label> <b> <?= $nameType ?></b></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="clear"></div><br>
                                <input data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" name="buy" id="buy" value="Đặt mua" class="btn btn-warning">
                                <input type="submit" class="btn btn-primary" name="dathang" id="dathang" value="Đặt hàng">
                            </td>

                        </tr>
                        <tr>

                        </tr>
                    </table>

                </div>
            </section>
            <aside>
                <div>
                    <div class='tieude'>Sản phẩm tương tự</div>
                    <div class="gchan"></div>
                    <marquee class="qcBenphai" scrollamount="2" direction="up" loop="50" scrolldelay="0" behavior="scroll" onmouseover="this.stop() " onmouseout="this.start()">

                        <?php
                        while ($row2 = mysqli_fetch_array($k)) {
                        ?>
                            <div class="qcSPBP">
                                <div class="imgSPBP">
                                    <image src='/Public/images/AnhSanPham/<?= $row2[1] ?>' style="height:100px; width: 120px;"></image>
                                </div>
                                <div class="NDSPBP">
                                    <label><b><?= $row2[2] ?></b></label><br />
                                    <label><?= currency_format($row2[3]) ?></label><br />
                                    <label>Số lượng: <?= $row2[4] - $row2[5] ?></label><br />
                                    <a class="btn btn-outline-success" href="/FoodDetail?idFood=<?php echo $row2[0] ?>">Mua</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </marquee>
                </div>
            </aside>
        </article>

        <!-- Modal -->
        <link href="/Public/DetailFood/css/stypeBody.css" rel="stylesheet">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hóa đơn thanh toán</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tr>
                                <td>
                                    <label>Tên TP : </label>
                                </td>
                                <td>
                                    <label><?= $name ?></label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Giá bán :</label>
                                </td>
                                <td>
                                    <label class="giaTP"><?= currency_format($price) ?></label>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <label>Số lượng mua : </label></label>
                                </td>
                                <td>
                                    <label id="sl" name="sl" class="sl" text="1">1</label>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <label>Giảm giá :</label>
                                </td>
                                <td>
                                    <label><?php echo isset($_SESSION['discount_user']) ? $_SESSION['discount_user'] : "phải đăng nhập" ?><label>%</label></label></label>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <label>Thành tiền :</label>
                                </td>
                                <td>
                                    <label class="giaTP" id="total" name="total" class="total"></label>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                        <input type="submit" name="buyOk" id="buyOk" value="Đồng ý" class="btn btn-primary" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/All/js/jQuery.js"></script>
    <script src="/Public/All/js/bootrap.bunlder.min.js"></script>
    <script>
        $(document).ready(function() {
            let soLuong = 1;
            let total = 0;
            $("select.cars").change(function() {
                var selectedCountry = $(this).children("option:selected").val();
                soLuong = selectedCountry;
            });
            $("#dathang").click(function() {
                let price = <?= $price ?>;
                let discount = <?= isset($_SESSION['discount_user']) ? $_SESSION['discount_user'] : 0 ?>;
                total = price * soLuong - (price * soLuong * discount) / 100;
                $.ajax({
                    type: "post",
                    url: "/FoodDetail/AddCart",
                    data: {
                        "idFood": <?= $code ?>,
                        "price": <?= $price ?>,
                        "amount": soLuong,
                        "total": total
                    },
                    success: function(msg) {
                        alert(msg);
                    },
                })
            });
            $("#buy").click(function() {
                $("#sl").text(soLuong);
                let price = <?= $price ?>;
                let discount = <?= $discount  ?>;
                total = price * soLuong - (price * soLuong * discount) / 100;
                //var n2 = total.replace(/\d\d\d(?!$)/g, "$&,"); 

                $("#total").text(total);
            })
            $("#buyOk").click(function() {
                $.ajax({
                    type: "post",
                    url: "/FoodDetail/Submit",
                    data: {
                        "idFood": <?= $code ?>,
                        "price": <?= $price ?>,
                        "amount": soLuong,
                        "total": total
                    },
                    success: function(msg) {
                        alert(msg);
                    },
                })
            })

        })
    </script>

</body>

</html>