<html>

<body>

	<form method="post">
		Username:
		<input type="text" name="username" required /><br />
		Password:
		<input type="password" name="password" required /><br />
		Email:
		<input type="email" name="email" required /><br />
		<button type="submit" name="signup" onclick="return mess();">الانضمام</button>
		<script type="text/javascript">
			function mess() {
				alert ("Your Record is successfully saved")
				return true;
			}
		</script>
	</form>

	<div class="g-recaptcha" data-sitekey="6Lfvl2cdAAAAADXjeGv47t3XKu6d0rgm9w30z--q"></div>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>

<?php
require 'db.php';


// هنا اضفنا دالة الشرط للتحقق من ضغط زر signup
if (isset($_POST['signup'])) {
	// عند تحقق الضغط يتم تخزين حقول البيانات فى متغيرات
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$email = $_POST['email'];

	// هنا قمنا بانشاء استعلام لقاعدة البيانات لاضافة بيانات العضو الى الجدول
	// عامود id يتم ملئه اوتوماتيكيا كما اخترنا فى البدايه
	$qu = "insert into users (username,password,email) value ('$user','$pass','$email')";

	// التحقق من نجاح الاستعلام
	if (mysqli_query($con, $qu)) {
		header("Location: signup.php");
		exit;
	}
}

?>