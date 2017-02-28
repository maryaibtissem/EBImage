<?php
session_start();

if(isset($_POST['text']))
{
$text =$_POST['text']; 
echo "<p style='font-size:40px'>".$text."</p>";
$_SESSION['text']=$text;
}

if(isset($_POST['textbas']))
{
$textbas =$_POST['textbas']; 
echo "<p style='font-size:40px'>".$textbas."</p>";
$_SESSION['textbas']=$textbas;
}




?>