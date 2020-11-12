<?php
session_start();

$id=$_POST["id"];
$pw=md5($_POST["pw"]);

$connect = mysqli_connect("localhost","root","toor");
if(!$connect){
    die('Could no connect: '.mysql_error());
}
echo 'Connected successfully';
echo '<br/>';

mysqli_query($connect,"set names euckr");

mysqli_select_db($connect, "sfgg");

$query = "select * from account_info where id='$id'";

$result=mysqli_query($connect, $query);

$data=mysqli_fetch_array($result,MYSQLI_NUM);

if($data[0]==$id) {
    if($data[1]==$pw) {
        $_SESSION['id']=$id;
        $_SESSION['is_logged']=1;
?>
	<script>
		location.replace('./main.php');
	</script>
<?php
    }else{
        echo"<script>alert(\"실패\");
            history.back(1);
            </script>";
        $_SESSION['is_logged']=2;
    }
}else{
    $_SESSION['is_logged']=2;
    echo "<script>alert(\"실패\");
            history.back(1);
            </script>";
}

mysqli_close($connect);
?>
