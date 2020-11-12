<?php
$connect = mysqli_connect("localhost", "root", "toor","sfgg");

 $id=$_POST['id'];
 $password=md5($_POST['pwd']);
 $checkpw=$_POST['pwd'];
 $password2=$_POST['pwd2'];
 $name=$_POST['name'];
 $email=$_POST['email'];

 if($id==NULL || $checkpw==NULL) {
?>
	<script>
		alert("write id or pw");
		history.back();
	</script>
<?php
 }
 $query="select * from account_info where id='$id'";
 $result=$connect->query($query);
 if($result->num_rows>=1) {
?>
	<script>
		alert('Already exist ID!');
		history.back();
	</script>
<?php
 }
 else if($checkpw!=$password2) {
?>
	<script>
		alert('Not same password!');
		history.back();
	</script>
<?php
 }
 else { 
 	$sql = "insert into account_info (id, pw, name, email) values ('$id','$password','$name','$email')";
	if($connect->query($sql)){
?>
		<script>
			location.replace('./first.html');
		</script>
<?php
	}else{
?>
		<script>
			alert('Error!');
			history.back();
		</script>
<?php
 	}
 }
?>
