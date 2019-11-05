<!DOCTYPE html>
<html lang="en">
<head>
	<title>Facebook - Đăng nhập hoặc đăng ký</title>
	<link href="images/Icon-Facebook.ico" rel="shortcut icon" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="{{ asset('/facebook/vendor/bootstrap.js')}}"></script>
	<link rel="stylesheet" href="{{ asset('/facebook/vendor/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('/facebook/vendor/font-awesome.css')}}">
	<link rel="stylesheet" href="{{ asset('/facebook/face.css')}}">
</head>
<body >
	<div class="menu">
		<nav class="navbar navbar-light bg-faded navbar-fixed-top">
			<div class="container">
				<button class="navbar-toggler hidden-sm-up button-toggler float-right float-xs-right" type="button" data-toggle="collapse" data-target="#menu" aria-expanded="true">
					&#9776;
				</button>
				<div class="collapse navbar-toggleable-xs content-menu" id="menu">
					<a class="navbar-brand logo-fb" href="#"><img src="images/fb.png" alt=""></a>
					<ul class="nav navbar-nav nav-login float-lg-right">
						<li class="nav-item">
							<form>
								<fieldset class="form-group">
									<label for="formGroupExampleInput" class="label-text">Email hoặc điện thoại</label>
									<input type="text" class="form-control input-fb" id="formGroupExampleInput" placeholder="">
								</fieldset>
								
							</form>  
						</li>
						<li class="nav-item">
							<form>     	
								<fieldset class="form-group">
									<label for="formGroupExampleInput2" class="label-text">Mật khẩu</label>
									<input type="password" class="form-control input-fb" id="formGroupExampleInput2" placeholder="">
									<label for="formGroupExampleInput2" class="label-text" id="label-forget-account"> <a href="">Quên tài khoản?</a></label>
								</fieldset>
							</form>  
						</li>
						<li class="nav-item">
							<form>     	
								<fieldset class="form-group">
									<button type="button" class="btn btn-primary btn-fb">Đăng nhập</button>
								</fieldset>
							</form>  
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
	</div> <!-- finish menu -->
	<div class="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-7 col-sm-12 col col-left col-main">
					<p id="slogan">Facebook giúp bạn kết nối và chia sẻ với mọi người trong cuộc sống của bạn.</p>
					<img src="images/connect.png" alt="" class="img">
				</div>
				<div class="col-lg-5 col-md-5 col-sm-12 col col-right">
					<h1 id="title-register">Đăng ký</h1>
					<p id="slogan-register">Nhanh chóng và dễ dàng.
					</p>
					<form id="form-register">
						<fieldset class="form-group name form-fb form-fullname">
							
							<input type="text" class="form-control" id="firstname" placeholder="Họ">
							<input type="text" class="form-control" id="lastname" placeholder="Tên">
						</fieldset>
						<fieldset class="form-group form-fb">
							
							<input type="text" class="form-control" id="contact" placeholder="Số di động hoặc email">
						</fieldset>
						<fieldset class="form-group form-fb">
							
							<input type="text" class="form-control" id="password" placeholder="Mật khẩu mới">
						</fieldset>
						<label for="formGroupExampleInput" id="label-birthday" class="label-form-register">Ngày sinh</label> <br>
						<select class="c-select" id="day">

							<option selected>Ngày</option>
							<option value="1">2</option>
							<option value="2">3</option>
							<option value="3">4</option>
						</select>
						<select class="c-select" id="month">

							<option selected>Tháng</option>
							<option value="1">Tháng 1</option>
							<option value="2">Tháng 2</option>
							<option value="3">Tháng 3</option>
						</select>
						<select class="c-select" id="year">

							<option selected>Năm</option>
							<option value="1">2019</option>
							<option value="2">2018</option>
							<option value="3">2017</option>
						</select>
						<a href="" class="button-information"></a>
						
						<br>
						<label for="formGroupExampleInput" class="label-form-register" id="label-sex">Giới tính</label> <br>
						<label class="c-input c-radio">
							<input id="female" name="radio" type="radio">
							<span class="c-indicator"></span>
							Nữ
						</label>
						<label class="c-input c-radio">
							<input id="male" name="radio" type="radio">
							<span class="c-indicator"></span>
							Nam
						</label>
						<label class="c-input c-radio">
							<input id="unknown" name="radio" type="radio">
							<span class="c-indicator"></span>
							Tùy chỉnh
						</label>
						<a href="" class="button-information"></a>
						<p class="text-muted">Bằng cách nhấp vào Đăng ký, bạn đồng ý với <a href="">Điều khoản</a>, <a href="">Chính sách dữ liệu</a> và <a href="">Chính sách cookie</a> của chúng tôi. Bạn có thể nhận được thông báo của chúng tôi qua SMS và hủy nhận bất kỳ lúc nào.</p>
						<button type="button" class="btn btn-success register-button">Đăng ký</button>
					</form>
				</div>
			</div>
		</div>
	</div> <!-- finish main -->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<ul class="list-language">
						<li class="item-language"><a href="" class="language language-default">Tiếng Việt</a></li>
						<li class="item-language"><a href="" class="language">English (UK)</a></li>
						<li class="item-language"><a href="" class="language">中文(台灣)</a></li>
						<li class="item-language"><a href="" class="language">한국어</a></li>
						<li class="item-language"><a href="" class="language">日本語</a></li>
						<li class="item-language"><a href="" class="language">Français (France)</a></li>
						<li class="item-language"><a href="" class="language">ภาษาไทย</a></li>
						<li class="item-language"><a href="" class="language">Español</a></li>
						<li class="item-language"><a href="" class="language">Português (Brasil)</a></li>
						<li class="item-language"><a href="" class="language">Deutsch</a></li>
						<li class="item-language"><a href="" class="language">Italiano</a></li>
						<li class="item-language" id="more-language"><a href="" class="language"><i class="icon-language"></i></a></li>
					</ul>
					<div class="contentCurve"></div>
				</div>
			</div>
			<div class="row content-info">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<ul class="list-link">
						<li class="item-link"><a href="" class="link">Đăng ký</a></li>
						<li class="item-link"><a href="" class="link">Đăng nhập</a></li>
						<li class="item-link"><a href="" class="link">Messenger</a></li>
						<li class="item-link"><a href="" class="link">Facebook Lite</a></li>
						<li class="item-link"><a href="" class="link">Danh bạ</a></li>
						<li class="item-link"><a href="" class="link">Trang</a></li>
						<li class="item-link"><a href="" class="link">Hạng mục Trang</a></li>
						<li class="item-link"><a href="" class="link">Địa điểm</a></li>
						<li class="item-link"><a href="" class="link">Trò chơi</a></li>
						<li class="item-link"><a href="" class="link">Vị Trí</a></li>
						<li class="item-link"><a href="" class="link">Marketplace</a></li>
						<li class="item-link"><a href="" class="link">Nhóm</a></li>
						<li class="item-link"><a href="" class="link">Instagram</a></li>
						<li class="item-link"><a href="" class="link">Địa phương</a></li>
						<li class="item-link"><a href="" class="link">Trang gây quỹ</a></li>
						<li class="item-link"><a href="" class="link">Dịch vụ</a></li>
						<li class="item-link"><a href="" class="link">Giới thiệu</a></li>
						<li class="item-link"><a href="" class="link">Tạo quảng cáo</a></li>
						<li class="item-link"><a href="" class="link">Tạo trang </a></li>
						<li class="item-link"><a href="" class="link">Nhà phát triển</a></li>
						<li class="item-link"><a href="" class="link">Tuyển dụng</a></li>
						<li class="item-link"><a href="" class="link">Quyền riêng tư</a></li>
						<li class="item-link"><a href="" class="link">Cookie</a></li>
						<li class="item-link"><a href="" class="link">Lựa chọn quảng cáo</a></li>
						<li class="item-link"><a href="" class="link">Điều khoản</a></li>
						<li class="item-link"><a href="" class="link">Bảo mật tài khoản</a></li>
						<li class="item-link"><a href="" class="link">Trợ giúp đăng nhập</a></li>
						<li class="item-link"><a href="" class="link">Trợ giúp</a></li>
					</ul>
				</div>		
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 coppy-right text-muted">Facebook © 2019</div>
			</div>
		</div>
	</div> <!-- finish footer -->
	<div class="banner-responsive">
		<a href="" class="banner-link"><img src="images/banner-smartphone.png" alt="" class="banner-img"></a>
	</div>
	<div class="login-responsive">
		<ul class="nav navbar-nav nav-login float-lg-right">
			<li class="nav-item">
				<form method="POST" action="/face/login" id="user_add" role="form">
					@csrf
					<fieldset class="form-group">
						<input type="text" class="form-control input-fb" id="email" name="email" placeholder="Số điện thoại hoặc email">
					</fieldset>
					<fieldset class="form-group">
						<input type="password" class="form-control input-fb" id="password" name="password" placeholder="Mật khẩu">
					</fieldset>
					<fieldset class="form-group">
						<button type="submit" class="btn btn-primary btn-fb">Đăng nhập</button>
					</fieldset>     
				</form>  
			</li>
			<li class="nav-item">
				<a href="" id="forget-password">Quên mật khẩu?</a>   
				<a href="" id="back">Quay lại</a>    
			</li>
			<div id="or">
				<span id="or-text">HOẶC</span>
			</div>
			<li class="nav-item">
				<form>     	
					<fieldset class="form-group">
						<button type="button" class="btn btn-primary btn-fb" id="create-account">Tạo tài khoản mới</button>
					</fieldset>
				</form>       
			</li>
		</ul>
	</div>
</body>
</html>