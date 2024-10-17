<?php 

mysqli_fetch_array(mysqli_query($adb, "SELECT * FROM user WHERE uid='$_SESSION[uid]'"));

?>

<form action='adatlap_ir.php' method='post' target='kisablak' class='reglog' enctype='multipart/form-data'>

    <input type='hidden' name='uid' value="<?php $user["uid"] ?>" > 
    <span> E-mail címed:            </span>  <input type='email'    name='uemail' value="<?php $user["uemail"] ?>" maxlength=250  placeholder='senki nem fogja látni' > <br>
    <span> Választott jelszavad:    </span>  <input type='password' name='upw1' value="<?php $user["upw"] ?>"  maxlength= 15  placeholder='min. 6 karakter'       > <br>
    <span> Jelszavad még egyszer:   </span>  <input type='password' name='upw2' value="<?php $user["upw"] ?>"  maxlength= 15  placeholder='hogy tuti legyen'      > <br>
    <span> Új profilkép:            </span>  <input type='file'     name='uprofkep' 
    <hr>
    <span>                          </span>  <input type='submit' value='Regisztráció'>  <br>


</form>