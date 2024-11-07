<DOCTYPE html>
<hrml>
  <head>
  <meta name='robots' content='noindex'>
</head>

<style>

body{ margin:0; }
div#menu
{
    background-color: #888  ;
    text-align      : center;

}
div#menu a
{
   display: inline-block ;
   width  : 200px        ;
   text-decoration: none ;
   color:   #666         ;
}
div#menu a:hover
{
    color: #000         ;
}




</style>

<body>

  <div id='menu'>
    <a href='../' target=_blank>főoldal</a> 
    <a href='./kezelopult.php?p=userek'> belépések</a> 
    <a href='./kezelopult.php?p=termekek'> Termekek szerkeztése</a>
    <a href='./kezelopult.php?p=rendelesek'>Rendelesek</a>
    <a href=''>
</div>

<div id='tartalom'>
<?php
      if(isset($_GET[p]))   $p=$_GET['p'] ;
      else           $p=""                ;

      if( $p=="userek")     include("userek.php");
      if( $p=="termekek")   include("termekek.php");
      if( $p=="rendelesek")  include("rendelesek.php");
      

?>

</body>


</html>