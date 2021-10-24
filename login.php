<?php

function returnidpwd(){
	global $username;
	global $pass;	
	$sedusername = "sed -i \"s/id=$username/id=phpid/\" /var/www/html/login.sh";
	system("sudo $sedusername");
	$sedpass = "sed -i \"s/pass=$pass/pass=phppass/\" /var/www/html/login.sh";
	system("sudo $sedpass");
}



$username = $_POST["username"];
$pass = $_POST["pass"];

$sedusername = "sed -i \"s/id=phpid/id=$username/\" /var/www/html/login.sh";
system("sudo $sedusername");
$sedpass = "sed -i \"s/pass=phppass/pass=$pass/\" /var/www/html/login.sh";
system("sudo $sedpass");

system("sudo /bin/bash /var/www/html/login.sh");
$shell_result = shell_exec("sudo cat /var/www/html/return");
returnidpwd();

echo $shell_result;

$pass = 0;
$fail = 1;

if( $shell_result == $pass )
{
	session_start();
	$_SESSION["userid"] = $username;

	echo("
        <script>
                location.href = 'mainpage.php';
        </script>
                ");

}

elseif ($shell_result == $fail)
{
	echo("
	<script>
		alert('잘못된 패스워드 입니다')
		history.go(-1)
	</script>
	");

}

else 
{
        echo("
        <script>
                alert('존재하지 않는 사용자 입니다')
                history.go(-1)
        </script>
        ");

}


?>
