<?php
     $message="";
     $error="";
     
      $nameErr = $emailErr =$dobErr= $genderErr = $usernameErr =$passwordErr =$conPassErr=" ";
       $name = $email = $dd = $mm= $yyyy= $gender = $username =$pass=$conPass=" ";

       /*name validation*/

  if (isset($_POST["submit"]))
  {

 /* name validation*/

if (empty($_POST["name"])) {
      $nameErr = "Name is required";

    } 
    else
     {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name))
       {
        $nameErr = "Only letters and white space allowed";
        $name=" ";
      }
    }


 /*email validation*/
     if (empty($_POST["email"]))
      {
      $emailErr = "Email is required";
     } 
    else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL,)) {
        $emailErr = "Invalid email format";
        $email="";
      }
    }
    /*user name validation*/

     if (empty($_POST["username"])) 
     {
      $usernameErr = "User Name is required";
    } 
    else
     {
      $username = test_input($_POST["username"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$username))
       {
        $usernameErr = "Only letters and white space allowed";
        $username="";
      }
    }


       /*password validation */

   
    if (empty($_POST["pass"])) 
    {
        $passwordErr = "Password is required";
    } 
    else 
    {
        $pass = $_POST["pass"];
        if (strlen($pass) >= 8) 
        {
        }
        else
        {
            $passwordErr = "Password  must contain atleast 8 charecters";
            $pass = "";
        }
    }

    if (empty($_POST["conPass"])) 
    {
        $conPassErr = "Confirm password is required";
    } 
    else 
    {
        $conPass = $_POST["conPass"];
        if ($conPass === $pass) 
        {

        }
        else{
            $conPassErr = "Password and confirm password did not match";
            $pass = "";
            $conPass= "";
        }
    }


  /* gender validation*/

    if (empty($_POST["gender"]))
     {
      $genderErr = "Gender is required";
    } 
    else
     {
      $gender = test_input($_POST["gender"]);

    }

      /*dob validation*/

 if(empty($_POST["dd"]) or empty($_POST["mm"]) or empty($_POST["yyyy"])){
    $dobErr="Full Date of birth input is requied";
    $dd = test_input($_POST["dd"]);
    $mm = test_input($_POST["mm"]);
    $yyyy = test_input($_POST["yyyy"]);

  }
  else
  {
    $dd = test_input($_POST["dd"]);
    $mm = test_input($_POST["mm"]);
    $yyyy = test_input($_POST["yyyy"]);

    if( !filter_var($dd,FILTER_VALIDATE_INT,array('options' => array(
            'min_range' => 1, 'max_range' => 31)))|
            !filter_var($mm,FILTER_VALIDATE_INT,array('options' => array(
            'min_range' => 1, 'max_range' => 12)))|
            !filter_var($yyyy,FILTER_VALIDATE_INT,array('options' => array(
            'min_range' => 1953, 'max_range' => 2000)))
        )
        
      {
        $dobErr=" Must be valid numbers(dd:1-31,mm: 1-12,yyyy: 1953-2000)";
      }

  }



 
 

}

   
  
    function test_input($data) 
    {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

      ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>

</head>
<body>
    <style type="text/css">
     .err{

        color: red;
     } 
     .text-success{

      color: green;
     }

      </style>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;  ?>" method= "post">   

   <?php   
      if(isset($error))  
       {  
          echo $error;  
        }  
    ?>  
    <fieldset style="width: 500px;">
           <legend>REGISTRATION</legend>
         <label for="fname">Name:</label>
         <input type="text" name="name" id="fname"> <span class="err">* 
              <?php 

                  if (isset ($nameErr)) {
                      echo $nameErr;
                  }

               ?>

         </span> <br> <hr>

         <label for="Email">Email:</label>
            <input type="text" name="email" id="Email"> <span class="err">*
                <?php
                     if (isset($emailErr)) {
                       echo $emailErr;
                     }
                  ?>


            </span> <br> <hr>



            <label for="Uname">User Name: </label>
            <input type="text" name="username" id="Uname" ><span class="err">*

           <?php 
                    if (isset ($usernameErr)) {
                      echo $usernameErr;
                    }


           ?>


            </span> <br> <hr>



            <label for="pw"> Password: </label>
            <input type="password" name="pass" id="pw"> <span class="err">*
              <?php 

                    if (isset($passwordErr)) {
                      echo $passwordErr;
                     
                    }

              ?>




            </span> <br> <hr>
             <label for="cpw"> Confirm Password: </label>
            <input type="password" name="conPass" id="cpw"> <span class="err">*

              <?php 
                     if (isset($conPassErr)) {
                       echo $conPassErr;
                     }
              ?>


            </span> <br> <hr>

            <fieldset>  
            <legend> Gender</legend>
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="err">*
      <?php  
             if (isset($genderErr)) {
        echo $genderErr; 
      }
      ?>
    </span>
    </fieldset> <br> <hr>

    <fieldset style="width: 500px; ">
<legend>Date of Birth</legend>
<table>
<tr style="text-align: center;">
  <th style="font-weight: normal;"><label for="dd" >dd</label></th>
  <th></th>
  <th style="font-weight: normal;"><label for="mm" >mm</label></th>
  <th></th>
  <th style="font-weight: normal;"><label for="yyyy" >yyyy</label></th>
  <th></th>
</tr>
<tr>
<td><input type="text" name="dd" style="width: 30px" value="<?php echo $dd;?>"></td>
<td>/</td>
<td><input type="text" name="mm" style="width: 30px" value="<?php echo $mm;?>"></td>
<td>/</td>
<td><input type="text" name="yyyy" style="width: 30px;" value="<?php echo $yyyy;?>"></td>
<td style="padding-left: 10px"><span class="err"> *
   <?php  
     
        echo $dobErr;
     

?>
  
 </span></td>
</tr>
</table>
<hr>

</fieldset> <br> <hr>

<hr style="border: 1px solid;">
<input type="submit" name="submit" value="submit" style="width: 100px">
<?php 
          if (isset($message)) {
            echo $message;
          }
?>
<input type="Reset"  style="width: 100px">
<a href=" login-form.php" > go to LOGIN PAGE </a>

    </fieldset>
     

   </form>


</body>
</html>



