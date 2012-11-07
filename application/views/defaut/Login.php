<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'Header.php';
?>
<div id="wrap_left">

</div>

<div id="wrap_right">

</div>
<div id="wrap_center">
    <form action="index.php?typeManager=login" method="POST" >
        <a>Tên đăng nhập : </a>
        <input type="text" name="user_name"/>
        <a>Mật khẩu : </a>
        <input type="text" name="user_password"/>
        
        <input type="submit" name="login"/>
    </form>
</div>

<?php 
include 'Footer.php';
?>
