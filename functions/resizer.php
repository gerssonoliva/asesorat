<?php


 if(isset($_GET['src'])){
	$ruta = $_GET['src'];
	if(isset($_GET['size'])){
		$size = explode("x",$_GET['size']);
		$W_DESTINO = $size[0];
		$H_DESTINO = $size[1];
	}
	else{
		$W_DESTINO = 165;
		$H_DESTINO = 192;
	}


	// $img_origen = imagecreatefromjpeg($ruta);

	$img_origen = imageCreateFromAny($ruta);

	$W_ORIGEN = imagesx($img_origen);
	$H_ORIGEN = imagesy($img_origen);

	$Ph = ($H_DESTINO*100)/$H_ORIGEN;
	$Pw = ($W_DESTINO*100)/$W_ORIGEN;

	if( $Pw > $Ph ){
		$W_Clip = $W_ORIGEN;
		# calc H clip destino
		$H_Clip = round(($H_DESTINO*100)/$Pw);

		#cordenadas
		$dst_y = round(($H_ORIGEN - $H_Clip)/2);
		$dst_x = 0;
	}
	else{
		$H_Clip = $H_ORIGEN;
		# calc W clip destino
		$W_Clip = round(($W_DESTINO*100)/$Ph);

		#cordenadas
		$dst_y = 0;
		$dst_x = round(($W_ORIGEN - $W_Clip)/2);
	}

	$img_dst = imagecreatetruecolor($W_DESTINO,$H_DESTINO);

	imagecopyresampled($img_dst,$img_origen,0,0,$dst_x,$dst_y,$W_DESTINO,$H_DESTINO,$W_Clip,$H_Clip);
	loadImgType($ruta, $img_dst) ;
}
else{
	$img_dst = imagecreatetruecolor(150,150);
	header("Content-type: image/jpeg");
	imagejpeg($img_dst,NULL,10);
}


// saber el tipo de imagen
function imageCreateFromAny($filepath)
{

	$type = exif_imagetype($filepath);

	$allowedTypes = array(
			1,  // [] gif
			2,  // [] jpg
			3,  // [] png
			6   // [] bmp
	);

	if (!in_array($type, $allowedTypes)) {
			return false;
	}

	switch ($type) {
			case 1 :
					$im = imagecreatefromgif($filepath);
			break;
			case 2 :
					$im = imagecreatefromjpeg($filepath);
			break;
			case 3 :
					$im = imagecreatefrompng($filepath);
			break;
			case 6 :
					$im = imagecreatefrombmp($filepath);
			break;
	}


	return $im;
}

// Carga imagen de acuerdo al tipo
function loadImgType($file_name , $img_dst ) {

	$type = exif_imagetype($file_name);

	$allowedTypes = array(
			1,  // [] gif
			2,  // [] jpg
			3,  // [] png
			6   // [] bmp
	);

	if (!in_array($type, $allowedTypes)) {
			return false;
	}

	switch ($type) {
			case 1 :
				header("Content-type: image/git");
				imagegif($img_dst,NULL,75);
			break;
			case 2 :
					header("Content-type: image/jpeg");
					imagejpeg($img_dst,NULL,75);
			break;
			case 3 :
					header("Content-type: image/png");
					imagealphablending( $img_dst, false );
					imagesavealpha( $img_dst, true );
					imagepng($img_dst);

			break;
			case 6 :
					header("Content-type: image/png");
					imagepng($img_dst,NULL,75);
			break;
	}

}

