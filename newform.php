<form method="POST"  enctype="multipart/form-data">
    Name
    <input type="text" name="fname"><br>
   
    <input type="file" name="upload">
    <br>
    <input type="submit" name="enter" value="enter">
</form>
<?php
    if(isset($_POST["enter"]))
    {
        $fname=$_POST['fname'];
        $image=$_FILES['upload']["name"];
        move_uploaded_file($_FILES['upload']['tmp_name'],"photo/$image");
        include 'Mycon.php';
				$connect = new Mycon("testsql");
				
                $query = "insert into fileupload(file_name)values('$image')";
                echo $image;
				 $connect->insert($query);
				
    }
?>