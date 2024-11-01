<?php

include "wp-config.php";
include "wp-includes/class-phpass.php";

$LOGIN_SUCCESS = 0;
$LOGIN_PASSWD_ERROR = 1;
$LOGIN_NICK_EXIST = 2;
$LOGIN_ERROR = 3;
$LOGIN_ERROR_NOUSERID = 4;
$LOGIN_SUCCESS_ADMIN = 5;
$LOGIN_NOT_ALLOW_GUEST = 6;
$LOGIN_USER_BANED = 7;

$username = isset($_GET['username']) ? trim(htmlspecialchars($_GET['username'])) : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';


$db_server = DB_HOST; 
$db_name = DB_NAME;
$db_table = wp_users;
$db_user = DB_USER;
$db_pass = DB_PASSWORD;
$db_username = "user_login";
$db_password = "user_pass";




if(empty($username))
{
 echo $LOGIN_ERROR_NOUSERID;
 exit;
}


$link = mysql_pconnect($db_server,$db_user,$db_pass);


if ($link)
{

mysql_select_db($db_name,$link);

$sql = "SELECT * FROM ".$db_table." WHERE $db_username='".$username."'";



$fetch = mysql_query($sql,$link);
		if($row = mysql_fetch_array($fetch)){
           mysql_close($link);
 
		$wp_hasher = new PasswordHash(8, TRUE);
	
				if (
					$row[$db_password] != $password &&
					!$wp_hasher->CheckPassword($password, $row[$db_password])
				)
				{
					echo $LOGIN_PASSWD_ERROR;
					exit;
				}
				else {
					echo $LOGIN_SUCCESS;
					exit;
				}
		}else{
		    echo $LOGIN_ERROR_NOUSERID;
 			exit;
		
		}
}
else{
	echo $LOGIN_ERROR;
}
?>