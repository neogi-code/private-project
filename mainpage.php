<?php 
session_start();
if(isset($_SESSION["userid"])) {
	$userid = $_SESSION["userid"];
}
else
{
	$userid = "";
}

if(!$userid){
	echo("
       	<script>
	window.alert('잘못된 접근입니다. 로그인하세요')
	location.href = 'index.html';
        </script>
       ");

}
else
{
echo "{$userid}님 반갑습니다<br>";
echo "정상적으로 로그인되었습니다<br />";
echo "이제 여기에 필요한 페이지를 만드세요<br />";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
</head>
<body>
	<?php
		include "header.php"
	?>
	<form action="manage.php" name="serch" method="post">
		<select name="namespace" id="">
			<?php
				$con = mysqli_connect("10.5.1.124","user1","12345","test"); //데이터베이스 정보. 주소,db계정,db패스워드,db명 순으로 작성
				$sql = "select * from test"; //db에 전달할 명령어
				$result = mysqli_query($con,$sql); //db,명령어 순으로 값이 들어가며 db에 명령어를 전달함.
				echo "$result";
			?>
		</select>
	</form>
</body>
</html>