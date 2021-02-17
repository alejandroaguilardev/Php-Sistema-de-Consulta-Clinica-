<?php  

  function resizeImg($origin,$destino,$newWidth,$newHeight,$jpgQuality=100)
    {
        // getimagesize devuelve un array con: anchura,altura,tipo,cadena de 
        // texto con el valor correcto height="yyy" width="xxx"
        $datos=getimagesize($origin);
     
        // comprobamos que la imagen sea superior a los tamaños de la nueva imagen
        if($datos[0]>$newWidth || $datos[1]>$newHeight)
        {
     
            // creamos una nueva imagen desde el original dependiendo del tipo
            if($datos[2]==1)
                $img=imagecreatefromgif($origin);
            if($datos[2]==2)
                $img=imagecreatefromjpeg($origin);
            if($datos[2]==3)
                $img=imagecreatefrompng($origin);
            if($datos[2]==4){
               return true;
            }
            // Redimensionamos proporcionalmente
            if(rad2deg(atan($datos[0]/$datos[1]))>rad2deg(atan($newWidth/$newHeight)))
            {
                $anchura=$newWidth;
                $altura=round(($datos[1]*$newWidth)/$datos[0]);
            }else{
                $altura=$newHeight;
                $anchura=round(($datos[0]*$newHeight)/$datos[1]);
            }
     
            // creamos la imagen nueva
            $newImage = imagecreatetruecolor($anchura,$altura);
     
            // redimensiona la imagen original copiandola en la imagen
            imagecopyresampled($newImage, $img, 0, 0, 0, 0, $anchura, $altura, $datos[0], $datos[1]);
     
            // guardar la nueva imagen redimensionada donde indicia $destino
            if($datos[2]==1)
                imagegif($newImage,$destino);
            if($datos[2]==2)
                imagejpeg($newImage,$destino,$jpgQuality);
            if($datos[2]==3)
                                   $negro = imagecolorallocate($newImage, 0, 0, 0);
                    imagecolortransparent($newImage, $negro); 
                imagepng($newImage,$destino);
     
            // eliminamos la imagen temporal
     
        }else{
            $mime = $datos['mime']; 
             
            // Creamos una imagen
            switch($mime){ 
                case 'image/jpeg': 
                    $newImage = imagecreatefromjpeg($origin); 
                    break; 
                case 'image/png': 
                    $negro = imagecolorallocate($newImage, 0, 0, 0);
                    imagecolortransparent($newImage, $negro);
                    $newImage = imagecreatefrompng($origin); 
                    break; 
                case 'image/gif': 
                    $newImage = imagecreatefromgif($origin); 
                    break; 
                default: 
                    $newImage = imagecreatefromjpeg($origin); 
            } 
            imagejpeg($newImage, $destino, $jpgQuality); 
         }
        imagedestroy($newImage);
        return true;

    }


    function imgCompress($img,$origen,$destiny,$old,$width,$height,$quality)
    {
        if(empty($origen)){
            return false;
        }
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$old)) {
            unlink($_SERVER['DOCUMENT_ROOT'].$old); 
        }
        
        if (!file_exists($destiny)) {
            mkdir($destiny, 0777);
        }
        $destiny = $destiny.$img; 
        $fileType = pathinfo($destiny, PATHINFO_EXTENSION); 
        // Permitimos solo unas extensiones
        $allowTypes = array('jpg','png','jpeg','gif','svg'); 
        if(in_array($fileType, $allowTypes)){ 
            // Image temp source 
            $compress=resizeImg($origen,$destiny,$width,$height,$quality);
            if($compress){ 
                 return true;
            }else{ 
                 return false;
            } 
        }else{ 
            return false;
        }
     }