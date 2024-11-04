<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trapstar</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/jpg" href="images/writing-text.png"/>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
}
.container{
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)), url(images/trapstar.png);
    background-position: center;
    background-size: cover;
    padding-left: 8%;
    padding-right: 8%;
    box-sizing: border-box;
}
.navbar{
    height: 12%;
    display: flex;
    align-items: center;
}
.logo{
    width: 50px;
    cursor: pointer;
}
.menu-icon{
    width: 30px;
    cursor: pointer;
    margin-left: 40px;
}
nav{
    flex: 1;
    text-align: right;
}
nav ul li{
    list-style: none;
    display: inline-block;
    margin-left: 60px;
}
nav ul li a{
    text-decoration: none;
    color: #fff;
    font-size: 13px;
}
.row{
    display: flex;
    height: 88%;
    align-items: center;
}
.col{
    flex-basis: 50%;
}
h1{
    color: #fff;
    font-size: 100px;
}
p{
    color: #fff;
    font-size: 11px;
    line-height: 15px;
}
button{
    width: 180px;
    color: #000;
    font-size: 12px;
    padding: 12px 0;
    background: #fff;
    border: 0;
    border-radius: 20px;
    outline: none;
    margin-top: 30px;
}
.card{
    width: 234px;
    height: 250px;
    border-radius: 10px;
    display: inline-flex;
    padding: 15px 25px;
    box-sizing: border-box;
    cursor: pointer;
    margin: 10px 15px;
    background-image: url(images/pic-1.png);
    background-position: right;
    background-size: cover;
    transition: transform 0.5s;
    transform: translateX(350px);
    opacity: 1;
    transition: border-color 0.3s;

}
.card1{
    background-image: url(images/img1.jpg);
}
.card2{
    background-image: url(images/img2.jpg);
}
.card3{
    background-image: url(images/img3.jpg);
}
.card4{
    background-image: url(images/img4.jpg);
}
.card5{
    background-image: url(images/img5.jpg);
}
.card6{
    background-image: url(images/img6.jpg);
}
.card7{
    background-image: url(images/img7.jpg);
}
.card8{
    background-image: url(images/img8.jpg);
}
.card9{
    background-image: url(images/img9.jpg);
}
.card10{
    background-image: url(images/img10.jpg);
}
.card11{
    background-image: url(images/img11.jpg);
}
.card12{
    background-image: url(images/img12.jpg);
}
.card13{
    background-image: url(images/img13.jpg);
}
.card14{
    background-image: url(images/img14.jpg);
}
.card15{
    background-image: url(images/img15.jpg);
}
h5{
    color: #fff;
    font: bold;
    text-shadow: 2px 2px #000000;
    
}
.card p{
    text-shadow: 0 0 15px #000;
    font-size: 8px;
}
</style>
<body>
  <div class="container">
    <div class="navbar">
      <img src="images/logo2.png" alt="logo">
      <?php include("navbar.php"); ?>
    </div>
    <div class="row">
      <div class="col">
        <a href="https://fontmeme.com/trapstar-logo-font/"><img src="https://fontmeme.com/permalink/240213/d4e18533d67d2886f30a4187482b70cf.png" alt="trapstar-logo-font" border="0"></a>        <p>A Trapstar egy brit divatmárka, amely streetwear stílusban készült ruházatot kínál,<br> jellemzően hip-hop és
          urban kultúrával összefonódó dizájnokkal és motívumokkal.<br>
          A márka elismert a minőségi anyagok és az egyedi
          tervezésű ruhadarabok iránti elkötelezettségével.</p>
       <a href="shop.html" target="_blank"><button type="button">Explore</button></a> 
      </div>
      <div class="col">
        <a href="gallery.html" target="_blank">
        <div class="card card1">
          <h5>Gallery</h5>
          <p></p>
        </div></a>
        <a href="shop.html" target="_blank">
          <div class="card card2" >
          <h5>Shop Online</h5>
          <p></p>
        </div></a>
        <a href="about.html" target="_blank">
        <div class="card card3">
          <h5>About</h5>
          <p></p>
        </div></a>
        <div class="card card4">
          <h5>Comunnity</h5>
          <p></p>
        </div>

      </div>
    </div>
</body>
</html>