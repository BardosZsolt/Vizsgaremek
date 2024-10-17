
<h2>Regisztráció</h2>

<style>

    form
    {
	width            : 384px            ;
	margin           : 32px 64px        ;
	padding          : 32px             ;
	background-color : #DDD             ;
	border           : solid 1px #AAA   ;
	border-radius    : 10px             ;
	box-shadow       : 2px 2px 2px #666 ;
	line-height      : 28px             ;
    }

    form span
    {
	display          : inline-block     ;
	width            : 200px            ;
    }

</style>


<form action='reg_ir.php' method='post' target='kisablak'>

    <span> Kívánt felhasználóneved: </span>  <input type='text'     name='unick'  maxlength=100  placeholder='min. 3 karakter'       > <br>
    <span> E-mail címed:            </span>  <input type='email'    name='uemail' maxlength=250  placeholder='senki nem fogja látni' > <br>
    <span> Választott jelszavad:    </span>  <input type='password' name='upw1'   maxlength= 15  placeholder='min. 6 karakter'       > <br>
    <span> Jelszavad még egyszer:   </span>  <input type='password' name='upw2'   maxlength= 15  placeholder='hogy tuti legyen'      > <br>
    <hr>
    <span>                          </span>  <input type='submit' value='Regisztráció'>  <br>


</form>


