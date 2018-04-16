<!DOCTYPE html>
<?php
session_start();
$_SESSION['count'] = time();
$image;
?>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html">
	<title>Send Mail</title>
	
	<meta name="author" content="Shreya Deep Anand">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="demo for sending mail using php.. Send Mail using SMTP and PHP!">
	<meta name="email" content="shreyaanand8888@gmail.com">
	<meta name="copyright" content="Shreya Anand 2018"/>
	
	
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet"/>
	
	
</head>
<body>
<form action="mail.php" method="post" enctype="multipart/form-data">
	<div class="container">
		<div class="row text-center" style="">
			<div class="col-lg-offset-3 col-lg-7" style="box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);">
				<h2 class="text-center" style="color:grey">Send mail using Php with attachment</h2>
				<h4>Submitted By - Shreya Deep Anand - 16BIT0081</h4>
				<div class="row firstrow">
					<div class="col-lg-5">
						<input type="email" class="text-center" Placeholder="Enter Your Email" name="to" required />
					</div>
					<div class="col-lg-offset-2 col-lg-5 box">
						<input type="text" class="text-center" placeholder="Enter Your Subject" name="subject" required />
					</div>
				</div>
				
				<label for="file-upload" class="custom-file-upload">
					<i class="fa fa-cloud-upload"></i> Upload Your File Here
				</label>
				
				
				<input id="file-upload" type="file" name="file" required />
				<br><br><br>
				<div class="row">
					<textarea placeholder="Enter Your Message" rows="3" cols="60" name="message"></textarea>
				</div>
				

        <?php
        create_image();
        display();
    
function display()
{
    ?>

    <div style="text-align:center;">
        
        <div style="display:block;margin-bottom:20px;margin-top:20px;">
            <img src="imageshreya.png">
        </div>
        
        <input type="text" name="input" required="required" />
        <input type="hidden" name="flag" value="1"/>
        

    </div>

<?php
}
function  create_image()
{
    global $image;
    $image = imagecreatetruecolor(200, 50) or die("Cannot Initialize new GD image stream");
    $background_color = imagecolorallocate($image, 255, 255, 255);
    $text_color = imagecolorallocate($image, 0, 255, 255);
    $line_color = imagecolorallocate($image, 64, 64, 64);
    $pixel_color = imagecolorallocate($image, 0, 0, 255);
    imagefilledrectangle($image, 0, 0, 200, 50, $background_color);
    for ($i = 0; $i < 3; $i++) {
        imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);
    }
    for ($i = 0; $i < 1000; $i++) {
        imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);
    }
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $len = strlen($letters);
    $letter = $letters[rand(0, $len - 1)];
    $text_color = imagecolorallocate($image, 0, 0, 0);
    $word = "";
    for ($i = 0; $i < 6; $i++) {
        $letter = $letters[rand(0, $len - 1)];
        imagestring($image, 7, 5 + ($i * 30), 20, $letter, $text_color);
        $word .= $letter;
    }
    
    $images = glob("*.png");
    foreach ($images as $image_to_delete) {
        @unlink($image_to_delete);
    }
    imagepng($image, "image" . "shreya" . ".png");
}
?>
</form>
				<div class="submit">
					<button type="submit" class="" name="submit">Send Mail</button>
					<br>
				</div>
			</div>
		</div>
		
	</div>
</form>
</body>
</html>
