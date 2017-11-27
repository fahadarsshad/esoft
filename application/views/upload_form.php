<html>
 
   <head> 
      <title>Upload Form</title> 
   </head>
	
   <body>
   	  <?php if(isset($product_code)){
	  	var_dump($product_code);
	  } ?>
      <?php echo $error;?> 
      <?php echo form_open_multipart('product/do_upload/'.$product_code);?> 
		
      <form action = "" method = "">
         <input type = "file" name = "product_image" size = "20" /> 
         <br /><br /> 
         <input type = "submit" value = "upload" /> 
      </form> 
		
   </body>
	
</html>