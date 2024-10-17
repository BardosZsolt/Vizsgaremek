<?php 

session_start() ;

print_r($_POST);

print "<hr>" ;

     print_r($_FILES) ;

     include("kapcsolat.php") ;

        $kepnev = $_SESSION['uid'] ."_".date("ymdHis")."_". randomstring(10)
        $kepadat = $_FILES['uprofkep'] ;
        if($kepadat['type']=="image/jpeg") $kiterj="jpg"; else
        if($kepadat['type']=="image/png") $kiterj="png";  else
        die("<script> alert('A kép csak jpg vagy png lehet!') </script>") ;

        $kepnev.=$kiterj ;

        move_uploaded_file($kepadat.['tmp_name'], "./profilkepek/".$kepnev) ;

        $eredetikepnev = $kepadat['name'] ;

print "<br>" .$kepnev ;


die() ;





print "<br>" randomstring(10) ;

die() ;







    mysqli_query( $adb , "
           UPTADE user
           SET uemail = '$POST[uemail]' ,
           unick      = '$POST[unick]'  ,
           


           WHERE uid = '$_POST[uid]'


     ");

     $_SESSION['unick'] = $_POST['unick'] ;

     print "
       
        <script>
                alert('Adatait módosítottuk')
                parent.location.href = parent.location.href

        </script>

    

     
     
    
     ";










mysqli_close($adb) ;

?>