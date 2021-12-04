<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="5.css">
</head>

<body>
	<div class="background">
		<div class="form">
			<form method="post">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<button type="submit" class="btnn" name="login">Login</button>
			</form>

			<p class="link">Don't have an account?<br>
				<a href="#">Sign up </a> here</a>
			</p>
			<p class="liw"><a href="#">Login with</a></p>
		</div>
	</div>

</body>

</html>


<?php
// استدعاء ملف الاتصال بقاعدة البيانات
require 'db.php';
// فتح جلسه
session_start();

// دالة الشرط للتحقق من ضغط زر login
if (isset($_POST['login'])) {
	// تخزين الحقول فى متغيرات
	$user = $_POST['username'];
	$pass = $_POST['password'];

	// انشاء استعلام
	// فى هذا الاستعلام استخدمنا الشرط وجود اسم المستخدم وكلمة المرور
	$qu = "select * from users where username = '$user' && password = '$pass'";

	// ارسال الاستعلام والتحقق من وجود العضو
	if (mysqli_num_rows(mysqli_query($con, $qu)) > 0) {
		// اذا تم وجود النتيجة يتم اضافة اسم العضو فى الجلسه 
		$_SESSION['username'] = $user;
		// ثم يتم الانتقال الى منطقة الاعضاء
		header("Location: cp.php");
	} else {
		// اذا لم يتم ايجاد اى قيمه 0
		echo 'اسم المستخدم او كلمة المرور خاطأ';
	}
}
?>