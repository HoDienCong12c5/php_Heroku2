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
                    <div class="card-heading"><b>QUẢN LÝ CƠ SỞ VẬT CHẤT</b></div>
                </div>
                <div class="card-body text-muted">
                <div>
                <div class="menuchon" style="width: 30%;">
                <select id="menuchon" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                </select>
                </div>
                </div>
                <table class="table" id="datatable1">
                        <thead>
                        <tr> 
                            <th>Mã KH</th> 
                            <th>Tên người dùng</th>
                            <th>Hình ảnh</th>
                            <th>Email</th> 
                            <th>SDT</th>
                            <th>TK</th>
                            <th>MK</th>
                            <th>Thể loại KH</th>
                        </tr>
                        </thead>
                            <tbody id="customer">
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


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    <script src="/Public/All/js/jQuery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>