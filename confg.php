<?php 
// connect to database
$connect = mysqli_connect('localhost', 'root', 'meriem04042003', 'blogpress');
if (!$connect) {
    echo 'Connection error: ' . mysqli_connect_error();
} else { 
    echo 'hellodddddddddddddddd';
}
  //  htmlspecialchars():
  //explode ; string to array with splite somthing comme ,
// :   endforeach;
// :  endif;
//  saving data to database :
// mysqli_real_escqpe_string($connect,$_post['email]) 
    $email=mysqli_real_escape_string($connect,$_POST['email']);
$sql="INSERT INTO name_table(title,emil,colomun) VALUES ($email) ";
// save and check 

 if(mysqli_query($connect,$sql) ){
    // succes
 }
 else{
    echo'erreur'. mysqli_error($connect);
 }


// /*
mysqli_close($connect);
// more info 
//  check email 
$hello="meriem@elmecaniui";
if(!filter_var($hello,FILTER_VALIDATE_EMAIL)){
    echo"hello";
}
else{ echo"pfff";
}
  $zar="fdrt";
  if(empty($zar)){
    echo"hello";
  }
 else{
    echo"nice";
 }
//   vide 
$zar="";
 if(empty($zar)){
   echo"hello";
 }
else{
   echo"nice";
}
//  contiet des alphabet :
 
$stringest = "merie15125m";  // Exemple de chaîne
$isAlpha = true;  // Variable pour vérifier si toute la chaîne contient uniquement des lettres

for ($i = 0; $i < strlen($stringest); $i++) {
    // Vérifie si chaque caractère est une lettre minuscule (entre 'a' et 'z')
    if (($stringest[$i] < 'a' || $stringest[$i] > 'z')&&($stringest[$i] < 'A' || $stringest[$i] > 'z')) {
        // Si un caractère n'est pas une lettre minuscule, on le marque comme non valide
        $isAlpha = false;
        break; 
         // On arrête la boucle dès qu'on trouve un caractère non valide
    }
}

if ($isAlpha) {
    echo "nice";  // Si toute la chaîne est composée uniquement de lettres, affiche "nice"
} else {
    echo "not nice";  // Sinon, affiche "not nice"
}




?>