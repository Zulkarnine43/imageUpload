 <?php
//echo '<pre>';
//print_r($_post);
//print_r($_FILES);

if(isset($_POST['btn'])){

	$link=mysqli_connect("localhost","root","","imagesupload");

$directory= 'images/';
$imageUrl = $directory.$_FILES['image']['name'];

move_uploaded_file($_FILES['image']['tmp_name'], $imageUrl);

$sql = "INSERT INTO images(image) VALUES('$imageUrl')";
       mysqli_query($link,$sql);
       echo "Image upload & save successfully";

/*$fileType = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
//echo "$fileType";


$check = getimagesize($_FILES['image']['tmp_name']);

//echo "<pre>";
//print_r($check);
if($check){

if(file_exists($imageUrl)){
	die('This file already exist...please insert another one');
}else{

 if($_FILES['images']['size']>500000){
 	die('your image size is too large ..please select with in');
 }else{
 	if($fileType!='jpg' && $fileType !='png'){
        die ('image type is not supported..please use jpg or png');
 	}else{
       move_uploaded_file($_FILES['image']['tmp_name'], $imageUrl);

       $sql = "INSERT INTO images('image) Values"($imageUrl);
       mysqli_query($link,$sql);
       echo "Image upload & save successfully";
 	}
 }


}



}
else{
	die('please chose a img file');
}
*/
}

?>



<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

<form action="" method="POST" enctype="multipart/form-data">
	<table>
		<tr><th>Select File</th>
			<td><input type="file" name="image"/></td>

		</tr>

       <tr><th></th>
			<td><input type="submit" name="btn" value="submit" /></td>

		</tr>

	</table>
</form>

<hr/>

<?php
  $link=mysqli_connect("localhost","root","","imagesupload");
    $sql="SELECT * FROM images";
    $result=mysqli_query($link,$sql);

?>

<table>
	<?php while  ($row=mysqli_fetch_assoc($result)) { ?>
	<tr>
		<td><img src="<?php echo $row['image'];?>" alt=""   height="100" width="100"></td>
	</tr>
<?php } ?>
</table>


</body>
</html>