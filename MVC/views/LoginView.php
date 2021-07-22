
<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	<link rel="stylesheet" href="/Public/Login/css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(Public/Login/image/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Nhóm 9</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Wellcom Login</h3>
		      
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Username" name="userName" required>
		      		</div>
	            <div class="form-group">
	              <input id="passWord"  type="password" class="form-control" placeholder="passWord" name="passWord"   required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
					<input type="submit" class="form-control btn btn-primary submit px-3" name="login" id ="login" value="login"> 	 
					
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          <p class="w-100 text-center">&mdash;<a href="Home">Trở về trang chủ</a> &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
	<script src="Public/All/js/jQuery.js"></script>
	<script src="Public/All/js/popper.js"></script>
  	<script src="Public/All/js/bootstrap.min.js"></script>
  	<script src="Public/All/js/main.js"></script>
	<script>
		$(document).ready(function(){
			$("#login").click(function(){
				let account=$("input[name=userName]").val();
				let password=$("input[name=passWord]").val();
				if(account=="" || password==""){
					alert("Bạn chưa nhập tài khoản đăng nhập hoặc mật khẩu")
				}
				else{
					$.ajax({
						type: "post",
						url:"/Login/Check",
						data: {
							account:account,
							password:password
						},
						success:function(msg){   
							if(msg==0){ 
								window.location.href = "./Home";
							}
							if(msg==1)
								window.location.href = "./Admin/ListWork";
							if(msg==-1)
								alert("Sai tài khoản hoặc mật khẩu");
						}
					})
				}
			})
		})
	</script>

	</body>
</html>


