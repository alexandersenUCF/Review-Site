<!DOCTYPE html> 

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Review Page - Alex Andersen</title>
		<link rel="stylesheet" href="css/styles.css"> 
    </head> 
<? 
    session_start(); 
	
	$mysqli = new mysqli("localhost","al253828","Silver_56","al253828");
     
    $query_reviews = "SELECT review_id, DATE_FORMAT(review_creation_date, '%M %d, %Y %l:%i%p') AS review_creation_date, game_name, game_review, game_rating, game_image_url, user_id FROM a6_reviews";
    $result_reviews = $mysqli->query($query_reviews);
	
	$query_users = "SELECT user_id, username, password, first_name, last_name, access_level FROM a6_users";
    $result_users = $mysqli->query($query_users);
	
	$query_user_rows = "SELECT review_id, DATE_FORMAT(review_creation_date, '%M %d, %Y') AS review_creation_date, game_name, game_review, game_rating, game_image_url, user_id FROM a6_reviews WHERE user_id = '".$_SESSION['logged_in_user_id']."'";
	$result_user_rows = $mysqli->query($query_user_rows);
	
	if($mysqli->error) {
        print ("Error connecting!  Message: ".$mysqli->error);
    }
	
	if(!isset($_SESSION['logged_in'])) { 
        print "You must login to view this page.  Click <a href=\"login.php\">here</a> to login "; 
    } else { 
	
	if(isset($_POST['submit'])) { 
	
		if(empty($_POST['game_name']) || empty($_POST['game_review']) || empty($_POST['game_rating']) || empty($_POST['game_image_url'])){
			print"\t<div class=\"form\">\n";
				echo "Please enter all forms";
			print"\t</div>\n";
		}	
			
		else if(!empty($_POST['game_name']) && !empty($_POST['game_review']) && !empty($_POST['game_image_url']) && !empty($_POST['game_rating'])){
			$query_insert = "INSERT INTO a5_reviews(review_id, review_creation_date, game_name, game_review, game_rating, game_image_url, user_id) VALUES (NULL, CURRENT_TIMESTAMP, '".$_POST['game_name']."', '".$_POST['game_review']."', '".$_POST['game_rating']."', '".$_POST['game_image_url']."', '".$_SESSION['logged_in_user_id']."')"; 
			$mysqli->query($query_insert); 
			header('Location: admin.php');		
		}
    } 
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
						<th>Comments</th>
						<?
							if($_SESSION['logged_in_user_access'] == 0) {
								print "\t\t<th>Delete</th>\n";
							}	
						?>	
						
					</tr>	
				</thead>
				
				<tbody>
					<?
						while($row = $result_reviews->fetch_array(MYSQLI_ASSOC)) {
							
							if($_SESSION['logged_in_user_access'] == 0) {
							
								print "\t<tr>\n";
								print "\t\t<td>".$row['review_id']."</td>\n";
								print "\t\t<td>".$row['user_id']."</td>\n";
								print "\t\t<td>".$row['game_name']."</td>\n";
								print "\t\t<td>".$row['game_review']."</td>\n";
								print "\t\t<td>".$row['game_rating']."</td>\n";
								print "\t\t<td><img src=\"".$row['game_image_url']."\" alt=\"Game Picture\" height=\"225\" width=\"150\"></td>\n";
								print "\t\t<td>".$row['review_creation_date']."</td>\n";
								print "\t\t<td><a href=\"review.php?review_id=".$row['review_id']."\">View Comments</a></td>\n";
								print "\t\t<td><a href=\"delete.php?review_id=".$row['review_id']."\">delete</a></td>\n";
								print "\t</tr>\n";
							}
							
							else if($_SESSION['logged_in_user_access'] == 1) {
								while($row = $result_user_rows->fetch_array(MYSQLI_ASSOC)) {
									print "\t<tr>\n";
									print "\t\t<td>".$row['game_name']."</td>\n";
									print "\t\t<td>".$row['game_review']."</td>\n";
									print "\t\t<td>".$row['game_rating']."</td>\n";
									print "\t\t<td><img src=\"".$row['game_image_url']."\" alt=\"".$row['game_name']."\" height=\"225\" width=\"150\"></td>\n";
									print "\t\t<td>".$row['review_creation_date']."</td>\n";
									print "\t\t<td><a href=\"review.php?review_id=".$row['review_id']."\">View Comments</a></td>\n";
									print "\t</tr>\n";
								}
							}
						}
						$mysqli->close();
					?>
				</tbody>	
			</table>
			
			<?
				if($_SESSION['logged_in_user_access'] == 1) {
					
					print"\t<div class=\"form\">\n";
						print "\t<form method=\"post\" action=\"admin.php\">\n"; 
							print"\t<div class=\"left\">\n";
								print "\t<label for=\"game_name\">Game Name</label><br>\n"; 
								print "\t<label for=\"game_review\">Game Review</label><br><br><br><br><br>\n";
								print "\t<label for=\"game_rating\">Game Rating</label><br>\n"; 
								print "\t<label for=\"game_image_url\">Game Image URL</label><br>\n"; 
							print"\t</div>\n";	
							
							print"\t<div class=\"right\">\n";
								print "\t<input name=\"game_name\" id=\"game_name\" type=\"text\" /><br>\n"; 
								print "\t<textarea name=\"game_review\" id=\"game_review\" type=\"text\" /></textarea><br />\n";
								print "\t<select name=\"game_rating\">\n";
									print "\t<option value=\"\">Select...</option>\n";
									print "\t<option value=\"1\">1</option>\n"; 
									print "\t<option value=\"2\">2</option>\n"; 
									print "\t<option value=\"3\">3</option>\n"; 
									print "\t<option value=\"4\">4</option>\n"; 
									print "\t<option value=\"5\">5</option>\n"; 
								print "\t</select><br>\n"; 
								print "\t<input name=\"game_image_url\" id=\"game_image_url\" type=\"text\" /><br>\n"; 
							print"\t</div>\n";	
							
							print "\t<input name=\"submit\" id=\"submit\" type=\"submit\" value=\"Submit Review\" />\n"; 
							
						print "\t</form>\n";
					print"\t</div>\n";	
				}
			?>
			
    </body> 
</html> 

<? } ?>