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
