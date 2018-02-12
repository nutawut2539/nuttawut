<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $img = $_FILES['file_uploaded']['name'];
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $expensions= array("jpeg","jpg","png");
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      if($file_size>2097152){
         $errors[]="File size must be excately 2 MB";
      }
      if(empty($errors)==true){
         echo "Success...<br>";
	$a = $_FILES['image']['name'];
	//trained tensorflow
	$train = shell_exec("python tensorflow-master/tensorflow/examples/label_image/label_image.py \--graph=/tmp/output_graph.pb --labels=/tmp/output_labels.txt \--input_layer=Mul \--output_layer=final_result \--input_mean=128 --input_std=128 \--image=$a");
    echo "the train-tensorflow is ".$train."<br>";
      }else{print_r($errors);}
   }
?>
<html>
   <head>
   <title>
   Tensorflow-Project
   </title>
   </head>
   <body>
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" /><br>
         <input type="submit"/>
      </form>
   </body>
</html>
