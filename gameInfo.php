<?php 
	$HOST = "";
	$username = "root";
	$password = "147258369a";
	$DATABASE = "gamedb";
	$conn = new mysqli($HOST,$username,$password,$DATABASE,null,
	"/home/student/it/2017/it175061/mysql/run/mysql.sock");
	$user = $_GET["username"];
	
	
	$sql = "select * from game where user1 = '".$user."' or user2 = '".$user."'";
	$result = $conn->query($sql);
	
	$row = $result->fetch_assoc();
	echo '{"turn":"'.$row["turn"].'","GameID":"'.$row["Gid"].'","Player1":"'.$row["user1"].'",
	"Player2":"'.$row["user2"].'","GameStatus":"'.$row["GameStatus"].'"';
	
	$sql = "select * from cards where user = '".$user."' and Gid = '".$row["Gid"]."'";
	$result = $conn->query($sql);
	$i = 0;
	while ($row = $result->fetch_assoc()) {
		$deck[$i] = $row["CardName"];
		$i++;
	}
	echo ',"DECK":'.json_encode($deck).'}';
		
	
	
	$conn->close();

?>