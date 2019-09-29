<?php 
    $tmp=$_FILES['imagen_persona']['tmp_name']; 
    $fot="./files/".$_FILES['imagen_persona']['name']; 
    if (is_uploaded_file($tmp)) 
    { 
        move_uploaded_file($tmp,$fot); 
        echo "Guardo";
    }else 
    { 
        echo "No Guardo"; 
    } 
?>