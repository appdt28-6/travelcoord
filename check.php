<?php
session_start();
include("connect.php");
$login=$_POST['user'];
$password=$_POST['password'];
//verificar campos
if(($_POST['user']=="")||($_POST['password']=="")){
	header("location:index.html?**faltan-datos**");
}
else{
$query="SELECT * FROM admin WHERE user='$login' and pass ='$password' ";
$link=mysql_connect($server,$dbuser,$dbpass);
$result=mysql_db_query($database,$query,$link);
	/////////////////////////////////////////////////////////////////////////////////////
	if(!mysql_num_rows($result))
	{
	header("location:index.html?**usuario-no-encontrado");//loger no encontrado
	}
	///////////////
	else{ 
	while($row = mysql_fetch_array($result))
		{
			$_SESSION['inicia']=$login;
			header("location:eventos.php");
			//header("location:profile.html");
	}//while
				
	///////////////////////////////////////////////////////////////////////////////////////			
	 		mysql_close($sql);
	 }
}
?>

