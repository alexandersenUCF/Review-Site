<?
    session_start(); 
	
	$mysqli = new mysqli("localhost","al253828","Silver_56","al253828");
    
	if(isset($_POST['submit']) && (!isset($_SESSION['logged_in']))) { 
	
	$select_query = "SELECT user_id, username, password, first_name, last_name, access_level FROM a6_users";
    $select_result = $mysqli->query($select_query);
	if($mysqli->error) { 
            print "Select query error!  Message: ".$mysqli->error; 
        } 
	
	if($mysqli->error) {
        print ("Error connecting!  Message: ".$mysqli->error);
    }
	
		while($row = $select_result->fetch_object()) { 
            if ((($_POST['username']) == ($row->username)) && (md5($_POST['password']) == ($row->password))) { // check if user input = a record in the database 
                $_SESSION['logged_in'] = true; 
                $_SESSION['logged_in_user_first'] = $row->first_name;
				$_SESSION['logged_in_user_last'] = $row->last_name;
				$_SESSION['logged_in_user_id'] = $row->user_id;
				$_SESSION['logged_in_user_access'] = $row->access_level;
            } else { 
                // do nothing 
            } 
        } 
	}
	
    if (isset($_SESSION['logged_in'])) { 
        header("Location: admin.php"); 
    } 
?> 

<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Login Page - Alex Andersen</title>
		<link rel="stylesheet" href="css/styles.css"> 
    </head> 
     
    <body> 
		<div class="form_delete">
			<form method="post" action="#"> 
				<label for="username">Username</label> 
				<input name="username" id="username" type="text"><br> 
				<label for="password">Password</label> 
				<input name="password" id="password" type="password"><br> 
				<input name="submit" id="submit" type="submit" value="Login">
			</form>
		</div>
    </body> 
</html>