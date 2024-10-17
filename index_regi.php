<?php
	session_start() ;
    include("kapcsolat.php");
?>
<html>
<head>

</head>

<style>

    div#login
    {
	text-align : right ;
    }

</style>

<body>

    <div id='login'>
<?php
    if( !isset( $_SESSION['uid']) )
    {
       print " <input type='button' value='Belépés' onclick=' location.href=\"./?p=login\" '> ";
    }
    else 
    {
      print " <input type='button' value='Kilépés' onclick=' kisablak.location.href=\"logout.php\" '> ";
    }
?>
    </div>

<?php

    if( isset( $_GET['p'] ) )  $p = $_GET['p'] ;
    else                       $p =""          ;
    if( !isset($_SESSION['uid']))
    {
    if ($p==""             )  include("kezdolap.php"    ) ; else
    if( $p=="regisztracio" )  include( "reg_form.php"   ) ; else
    if( $p=="login"        )  include( "login_form.php" ) ; else
                              include( "404_kulso.php"  ) ; 
    }
    else
    {
        if($p==""          )  include("belsolap.php"     ); else
        if($p=="adatlapom" )  include("adatlap_form.php" ); else
                              include("404_belso.php"    ); 
    }

?>

<br><br>
<iframe name='kisablak'></iframe>

</body>

</html>

<?php

mysqli_close($adb);

?>