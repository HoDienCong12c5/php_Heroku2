
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form-v7 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="/Public/Register/css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="/Public/Register/fonts/line-awesome/css/line-awesome.min.css">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="/Public/Register/css/style.css" />

</head>

<body>

	<body class="form-v7">
		<div class="page-content">
			<div class="form-v7-content">
				<div class="form-left">
					<img src="./Public/Register/images/form-v7.jpg" alt="form">
					<p class="text-1">Sign Up</p>
					<p class="text-2">Privaci policy & Term of service</p>
				</div>
				<form class="form-detail" method="post" id="myform">
					<div class="form-row">
						<label for="fullname">FULL NAME</label>
						<input type="text" name="fullname" id="fullname" class="input-text">
					</div>
					<div class="form-row">
						<label for="username">USERNAME</label>
						<input type="text" name="username" id="username" class="input-text">
					</div>
					<div class="form-row">
						<label for="your_email">E-MAIL</label>
						<input type="text" name="your_email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					</div>
					<div class="form-row">
						<label for="password">PASSWORD</label>comfirm_password
						<input type="password" name="password" id="password" class="input-text" required>
					</div>
					<div class="form-row">
						<label for="comfirm_password">CONFIRM PASSWORD</label>
						<input type="password" name="comfirm_password" id="comfirm_password" class="input-text" required>
					</div>
					<div class="form-row-last">
						<input type="submit" value="success" name="submit" id="submit" class="register">
						<p>Or<a href="/Login">Log in</a></p>
					</div>
				</form>
			</div>
			<div id="kq"></div>
		</div>
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
		<script>
			// just for the demos, avoids form submit
			jQuery.validator.setDefaults({
				debug: true,
				success: function(label) {
					label.attr('id', 'valid');
				},
			});
			$("#myform").validate({
				rules: {
					your_email: {
						required: true,
						email: true
					},
					password: "required",
					comfirm_password: {
						equalTo: "#password"
					},
					username: {
						required: true
					},
					fullname: {
						required: true
					}
				},
				messages: {
					username: {
						required: "Please enter an username"
					},
					your_email: {
						required: "Please provide an email"
					},
					password: {
						required: "Please provide a password"
					},
					comfirm_password: {
						required: "Please provide a password",
						equalTo: "Wrong Password"
					}
				},

			});

			function ok() {
				var xmlHttp = null;
				xmlHttp = new XMLHttpRequest();
				xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");

			}
			$(document).ready(function() {
				$("#submit").click(function() {
					let fullname = $("#fullname").val();
					let name = $("input[name=username]").val();
					let email = $("input[name=your_email]").val();
					let password = $("input[name=password]").val();
					let password1 = $("input[name=comfirm_password]").val();
					if (name == "" || email == "" || password == "" || fullname == '' || password1 == '') {
						alert("Phải đủ dữ liệu mới thêm được");
					} else {
						if (password != password1)
							alert("Mật khẩu chưa khớp nhau")
						else {
							$.ajax({
								type: "post",
								url: "/Regitster/submit",
								data: {
									"name": name,
									"email": email,
									"password": password,
									"fullname": fullname

								},
								success: function(msg) {
									if (msg == 1) {
										alert("Đăng ký thành công");
										window.location.href = "/Login";
									} else {
										alert(msg);
									}

								}
							})
						}

					}

				})
			});
		</script>

	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</body>

</html>