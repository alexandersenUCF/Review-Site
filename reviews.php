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
     
    $query_reviews = "SELECT review_id, DATE_FORMAT(review_creation_date, '%M %d, %Y %l:%i%p') AS review_creation_date, game_name, game_review, game_rating, game_image_url, user_id FROM a6_reviews ORDER BY game_name";
    $result_reviews = $mysqli->query($query_reviews);
	
	$query_users = "SELECT user_id, username, password, first_name, last_name, access_level FROM a6_users";
    $result_users = $mysqli->query($query_users);
	
	$query_user_rows = "SELECT review_id, DATE_FORMAT(review_creation_date, '%M %d, %Y') AS review_creation_date, game_name, game_review, game_rating, game_image_url, user_id FROM a6_reviews WHERE user_id = '".$_SESSION['logged_in_user_id']."'";
	$result_user_rows = $mysqli->query($query_user_rows);
	
	if($mysqli->error) {
        print ("Error connecting!  Message: ".$mysqli->error);
    }
	
	if(!isset($_SESSION['logged_in'])) { 
        $_SESSION['logged_in_user_first'] = 'New';
		$_SESSION['logged_in_user_last'] = 'User'; 
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
					<th>Game Image</th>
					<th>Game Name</th>
				</tr>	
			</thead>
			
			<tbody>
				<?
					while($row = $result_reviews->fetch_array(MYSQLI_ASSOC)) {
						
							print "\t<tr>\n";
							print "\t\t<td><img src=\"".$row['game_image_url']."\" alt=\"Game Picture\" height=\"225\" width=\"150\"></td>\n";
							print "\t\t<td><a href=\"review.php?review_id=".$row['review_id']."\">".$row['game_name']."</a></td>\n";
							print "\t</tr>\n";
					}
					$mysqli->close();
				?>
			</tbody>	
		</table>
	</body> 
</html>