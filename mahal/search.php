<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("mahal",$con);
    $query=mysql_query("select first_name,member_id from members where first_name LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
    $array[] = $row['first_name'].",".$row['member_id'];
    }
    echo json_encode($array);
}
?>
