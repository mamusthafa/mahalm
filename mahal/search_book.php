<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("school",$con);
    $query=mysql_query("select book_name,author from books where academic_year='".$cur_academic_year."' and book_name LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
	//$array = array();
    $array[] = $row['book_name'].",".$row['author'];
    //$array[] = $row['present_class'];
   
 
    }
    echo json_encode($array);
}
?>
