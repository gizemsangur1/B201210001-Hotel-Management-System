<?php

$cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
    $psq = pg_query("SELECT * FROM foods");
    $psq2 = pg_query("SELECT * FROM restaurant");
    if(isset($_POST["btnSave"])&&$_POST["btnSave"]=="Save")
        {
            $cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
            $t_num=$_POST["t_num"];
            $fname=$_POST["food_name"];
            $query="call add_order(".$t_num.",'".$fname."')";

            $res=pg_query($cn,$query);

            if(isset($res))
            {
              echo '<script language="javascript">';
              echo 'alert("recipt added")';
              echo '</script>';
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Waiter</title>
</head>
<body>
<section id="first">
       
        <div class="row" ></div>
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="stafform">
                   
                                <select name="t_num" id="">
                                <?php
                              $i=0;
                              while($row=pg_fetch_assoc($psq2)) {
                              ?>
                                <option ><?php echo $row["table_num"]; ?></option>
                              <?php
                              $i++;
                              }
                              ?>
                                </select>
                              <br>
                              <select name="food_name"  id="input">
                      <?php
                              $i=0;
                              while($row=pg_fetch_assoc($psq)) {
                              ?>
                                <option ><?php echo $row["foodname"]; ?> </option>
                              <?php
                              $i++;
                              }
                              ?>
                    </select><br>
                    
                    
                    <input type="submit" id="savebtn" value="Save" name="btnSave"/>
              </form>
          </div>
          <div class="col-sm-4"></div>
        </div>
    </section>
</body>
</html>