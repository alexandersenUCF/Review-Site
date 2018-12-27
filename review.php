<!DOCTYPE html> 

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Comment Page - Alex Andersen</title>
		<link rel="stylesheet" href="css/styles.css"> 
    </head> 
<? 
    session_start(); 
	
	$_SESSION['review_id'] = $_GET["review_id"];
	
	$mysqli = new mysqli("localhost","al253828","Silver_56","al253828");
     
    $query_comments = "SELECT comment_id, DATE_FORMAT(comment_creation_date, '%M %d, %Y %l:%i%p') AS comment_creation_date, comment, review_id, user_id FROM a6_comments WHERE review_id = '".($_GET["review_id"])."'";
    $result_comments = $mysqli->query($query_comments);
	
	$query_user_rows = "SELECT review_id, DATE_FORMAT(review_creation_date, '%M %d, %Y') AS review_creation_date, game_name, game_review, game_rating, game_image_url, user_id FROM a6_reviews WHERE review_id = '".($_GET["review_id"])."'";
	$result_user_rows = $mysqli->query($query_user_rows);
	
	if($mysqli->error) {
        print ("Error connecting!  Message: ".$mysqli->error);
    }
	
	if(!isset($_SESSION['logged_in'])) { 
        $_SESSION['logged_in_user_first'] = 'New';
		$_SESSION['logged_in_user_last'] = 'User'; 
    }
	
	if(isset($_POST['submit'])) { 
	
		if(empty($_POST['comment'])){
			print"\t<div class=\"form\">\n";
				echo "Please enter all forms";
			print"\t</div>\n";	
		}	
			
		else if(!empty($_POST['comment'])){
			$query_insert = "INSERT INTO a6_comments(comment_id, comment_creation_date, comment, review_id, user_id) VALUES (NULL, CURRENT_TIMESTAMP, '".$_POST['comment']."', '".$_SESSION['review_id']."', '".$_SESSION['logged_in_user_id']."')"; 
			$mysqli->query($query_insert); 
			header('Location: reviews.php');
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
					<th>Review ID</th>
					<th>User</th>
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
				?>
			</tbody>	
		</table>
		
		<table>
			<thead>
				<tr>
					<th>User ID</th>
					<th>Comment</th>
					<th>Comment Date</th>
				</tr>	
			</thead>
			
			<tbody>
				<?
					while($row = $result_comments->fetch_array(MYSQLI_ASSOC)) {

						print "\t<tr>\n";
						print "\t\t<td>".$row['user_id']."</td>\n";
						print "\t\t<td>".$row['comment']."</td>\n";
						print "\t\t<td>".$row['comment_creation_date']."</td>\n";
						print "\t</tr>\n";
					}
					$mysqli->close();
				?>
			</tbody>	
		</table>

		<?
			if(isset($_SESSION['logged_in'])) {
				
				print"\t<div class=\"form_review\">\n";
					print "\t<form method=\"post\" action=\"#\">\n"; 
						print "\t<textarea name=\"comment\" id=\"game_review\" type=\"text\" /></textarea><br />\n";
						print "\t<input name=\"submit\" id=\"submit\" type=\"submit\" value=\"Submit Comment\" />\n"; 
					print "\t</form>\n";
				print"\t</div>\n";	
			}
		?>
			
    </body> 
</html>