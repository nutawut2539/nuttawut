<?php
   //set up system
   shell_exec("python models-master/tutorials/image/imagenet/classify_image.py");
   if(isset($_FILES['image'])){
      $errors= array();
      $flower=array("roses","tulips","sunflowers","daisy","dandelion");
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
         echo "Success\n";
	$a = $_FILES['image']['name'];
	//models not work sometimes
	$predict = shell_exec("python models-master/tutorials/image/imagenet/classify_image.py --image_file $a ");
	//trained tensorflow
	$train = shell_exec("python tensorflow-master/tensorflow/examples/label_image/label_image.py \--graph=/tmp/output_graph.pb --labels=/tmp/output_labels.txt \--input_layer=Mul \--output_layer=final_result \--input_mean=128 --input_std=128 \--image=$a");
    echo "model result is : ".$predict.".<br>";
    echo "and the train-tensorflow is ".$train."<br>";
    for($x=0,$y=0;$x<=strlen($train);$x=$x+1){
	if($train[$x]=='.'){
		$result=($train[$x+1]*10)+$train[$x+2]+($train[$x+3]/10)+($train[$x+4]/100);
		echo "$flower[$y] is ".$result."%. <br>";
		$y=$y+1;
	}
    }
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
