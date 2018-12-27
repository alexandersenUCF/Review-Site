<!DOCTYPE html>
<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Delete Page - Alex Andersen</title>
		<link rel="stylesheet" href="css/styles.css"> 
    </head> 
    
	<? 
    session_start(); 
	
	$mysqli = new mysqli("localhost","al253828","Silver_56","al253828");
	
	
	if(!isset($_SESSION['logged_in'])) { 
        print "You must login to view this page.  Click <a href=\"login.php\">here</a> to login ";
    } 
	else if($_SESSION['logged_in_user_access'] == 1) {
		print "You must be an admin to view this page.  Click <a href=\"login.php\">here</a> to login "; 
	}else { 
	
		if(isset($_POST['yes'])) { 
            $query_delete = "DELETE FROM a5_reviews WHERE review_id='".($_GET["review_id"])."'"; 
            $mysqli->query($query_delete); 
            header('Location: admin.php'); 
        } 
		
		else if (isset($_POST['no'])) {
			header('Location: admin.php'); 
		}

	$query_user_rows = "SELECT review_id, DATE_FORMAT(review_creation_date, '%M %d, %Y') AS review_creation_date, game_name, game_review, game_rating, game_image_url, user_id FROM a6_reviews WHERE review_id = '".($_GET["review_id"])."'";
	$result_user_rows = $mysqli->query($query_user_rows);	
		
	?> 

    <body> 
	
        <div class="head">
			<p>Welcome <? print $_SESSION['logged_in_user_first'];?> <? print $_SESSION['logged_in_user_last'];?>!</p> 
			<a href="reviews.php">Reviews</a><br>
			<a href="admin.php">Admin</a><br>
			<a href="logout.php">Logout</a> 
		</div> 
		
		<table>
				<thead>
					<tr>
						<?
							if($_SESSION['logged_in_user_access'] == 0) {
								print "\t\t<th>Review ID</th>\n";
								print "\t\t<th>User</th>\n";
							}	
						?>
						<th>Game Name</th>
						<th>Game Review</th>
						<th>Game Rating</th>
						<th>Game Image</th>
						<th>Review Creation Date</th>
						
					</tr>	
				</thead>
				
				<tbody>
					<?
						while($row = $result_user_rows->fetch_array(MYSQLI_ASSOC)) {

							print "\t<tr>\n";
							print "\t\t<td>".$row['review_id']."</td>\n";
							print "\t\t<td>".$row['user_id']."</td>\n";
							print "\t\t<td>".$row['game_name']."</td>\n";
							print "\t\t<td>".$row['game_review']."</td>\n";
							print "\t\t<td>".$row['game_rating']."</td>\n";
							print "\t\t<td><img src=\"".$row['game_image_url']."\" alt=\"Game Picture\" height=\"225\" width=\"150\"></td>\n";
							print "\t\t<td>".$row['review_creation_date']."</td>\n";
							print "\t</tr>\n";
						}
						$mysqli->close();
					?>
				</tbody>	
			</table>
			
			<?
				print"\t<div class=\"form_delete\">\n";
					print "\t<form method=\"post\" action=\"#\">\n";  
						print "\tContinue Delete?\n";
						print "\t<input name=\"yes\" id=\"yes\" type=\"submit\" value=\"Yes\" />\n"; 
						print "\t<input name=\"no\" id=\"no\" type=\"submit\" value=\"No\" />\n"; 
					print "\t</form>\n";
				print"\t</div>\n";	
			?>
			
    </body> 
</html> 

<? } ?>