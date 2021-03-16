<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>
</head>
<body>
    <?php
        $firstNameErr = $lastNameErr = $emailErr = $genderErr = $userNameErr = $passwordErr = $recoveryEmailErr = "";
        $firstName = $lastName = $email = $gender = $userName = $password = $recoveryEmail = "";

        if ($_SERVER["REQUEST_METHOD"] =="POST" ) 
        {
            if(empty($_POST['fname'])) 
            {
                $firstNameErr = "Please Fill Up the First Name";
            }
            else
            {
                $firstName = $_POST['fname'];
            }

            if(empty($_POST['lname'])) 
            {
                $lastNameErr = "Please Fill Up the Last Name";
            }
            else
            {
                $lastName = $_POST['lname'];
            }

            if(empty($_POST['email'])) 
            {
                $emailErr = "Please Fill Up the Email";
            }
            else
            {
                $email = $_POST['email'];
            }

            if(isset($_POST['gender']))
            {
                $gender = $_POST['gender'];
                
                if ($gender == "Male")
                {
                    $gender = "Male";
                }
                else
                {
                    $gender = "Female";
                }   
            }
            else 
            {
                $genderErr = "Please Check the Gender";
            }


            if(empty($_POST['uname'])) 
            {
                $userNameErr = "Please Fill Up the UserName";
            }
            else
            {
                $userName = $_POST['uname'];
            }

            if(empty($_POST['password'])) 
            {
                $passwordErr = "Please Fill Up the Password";
            }
            else
            {
                $password = $_POST['password'];
            }

            if(empty($_POST['remail'])) 
            {
                $recoveryEmailErr = "Please Fill Up the Recovery Email";
            }
            else
            {
                $recoveryEmail = $_POST['remail'];
            }

            $filepath = "file-handling.txt";
            $f = fopen($filepath,'w');
            fwrite($f,"First Name: $firstName\nLast Name: $lastName\nEmail: $email\nGender: $gender\nUserName: $userName\nPassword: $password\nRecovery Email: $recoveryEmail");
        }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    	<fieldset>
	        <legend><h2>Basic Information</h2></legend>

	 		<b> <p>First Name</p>
	        <input type="text" name="fname" value="" placeholder="Type First Name">
	        <p><?php echo $firstNameErr; ?></p>

	        <b> <p>Last Name</p>
			<input type="text" name="lname" value="" placeholder="Type Last Name">
	        <p><?php echo $lastNameErr; ?></p>

			<b> <p>Email</p>
	        <input type="email" name="email" id="" value="" placeholder="Type Your Email">
	        <p><?php echo $emailErr; ?></p>

	        <b> <p>Gender</p>          
	        <input type="radio" name="gender" value="Male" >  Male 
	        <input type="radio" name="gender" value="Female" > Female
	        <p><?php echo $genderErr; ?></p>
	    </fieldset>
	            
	    <fieldset>
	        <legend><h2>User Account Information</h2></legend>
	                    
	        <b> <p>UserName</p>
	        <input type="text" name="uname" value="" placeholder="Type User Name">
	        <p><?php echo $userNameErr; ?></p>

	        <b> <p>Password</p>
	        <input type="password" name="password" value="" placeholder="Type Password">
	        <p><?php echo $passwordErr; ?></p>

	        <b> <p>Recovery Email</p>
	        <input type="email" name="remail" value="" placeholder="Type Recovery Email">
	        <p><?php echo $recoveryEmailErr; ?></p>
	    </fieldset>

        <input type="submit" name="" value="Submit"> 
        <input type="reset" name="" value="Reset">
    </form>
</body>
</html>