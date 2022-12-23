<?php
$cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
$psq = pg_query("SELECT * FROM staff");
if(isset($_GET['delete'])){
  $nid=$_GET['delete'];
  $query2="DELETE FROM staff WHERE staff.staff_id =$nid ";
  $query3="DELETE FROM userlogin WHERE userlogin.userid=$nid";
  $result = pg_query($cn,$query2 );
  $result2=pg_query($cn,$query3);
  if($result)
  {
    if($result2)
    {
      echo "deleted";
	  header('Location:staffinfo.php');
    }else{
	  echo"error";
    }
	
  }
}
?>