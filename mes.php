<?php
if (isset($_POST['submit'])){
$link = mysqli_connect("localhost", "root", "", "facebook");

// Check connection
if($link === false){
	die("ERROR: Could not connect. "
		. mysqli_connect_error());
}

// Escape user inputs for security
$un= mysqli_real_escape_string(
	$link, $_REQUEST['from_name']);
$m = mysqli_real_escape_string(
	$link, $_REQUEST['msg']);
date_default_timezone_set('Asia/Kolkata');
$ts=date('y-m-d h:ia');

// Attempt insert query execution
$sql = "INSERT INTO message (from_name, msg)
		VALUES ('$un', '$m', '$ts')";
if(mysqli_query($link, $sql)){
	;
} else{
	echo "ERROR: Message not sent!!!";
}
// Close connection
mysqli_close($link);
}
?>
<html>
<head>
<style>
*{
	box-sizing:border-box;
}
body{
	background-color:white;
	font-family:Arial;
    display: flex;
}
.conversation{
            width: 65px;
            background-color: #123b88;
            color: #fff;
            padding: 20px;
            box-sizing: border-box;
        }
        #container{
            width:500px;
            height:650px;
            font-size:0;
            border-radius:5px;
        }
        .customer-profile {
            width: 30%;
            background-color: #eee;
            padding: 20px;
            margin-left:250px;
        }
        .conversation-item {
            cursor: pointer;
            margin-bottom: 10px;
            padding: 20px;
            border-radius: 1px;
            background-color: #f1eded;
            transition: background-color 0.3s;
            height: 65px;
        }

        .conversation-item:hover {
            background-color: #777;
        }
        .conversation-list {
            width: 30%;
            background-color: #fffdfd;
            color: black;
            padding: 5px;
            box-sizing: border-box;
            overflow-y: auto;
        }
main{
	width:750px;
	font-size:15px;
    border-left:1px solid grey;
    border-right:1px solid grey;
    border-top:1px solid grey;
}
main header{
	height:70px;
	padding:30px 20px 30px 40px;
	background-color:white; 
}
main header > *{
	vertical-align:top;
}

main header div{
	margin-left:90px;
	margin-right:90px;
}
main header h2{
	font-size:25px;
	margin-top:5px;
	text-align:center;
	color:black; 
}
main .inner_div{
	padding-left:0;
	margin:0;
	list-style-type:none;
	position:relative;
	overflow:auto;
	height:500px;
	background-color:lightgrey;
	background-position:center;
	background-repeat:no-repeat;
	background-size:cover;
	position: relative;
	border-top:2px solid #fff;
	
}

main .message{
    margin-top:40px;
	padding:10px;
	color:#000;
	margin-left:15px;
	background-color:white;
	line-height:20px;
	max-width:90%;
	display:inline-block;
	text-align:left;
	border-radius:5px;
	clear:both;
}

main .message1{
    margin-top:20px;
	padding:10px;
	color:#000;
	margin-right:15px;
	background-color:white;
	line-height:20px;
	max-width:90%;
	display:inline-block;
	text-align:left;
	border-radius:5px;
	float:right;
	clear:both;
}

main footer{
	height:80px;
	background-color:lightgrey;
}
main footer textarea{
	width:98%;
	height:40px;
	border-radius:3px;
	padding:10px;
	font-size:13px;
	margin-left:5px;
}

main footer textarea::placeholder{
	color:grey;
}

.facebook,.messager,.user,.static{
    width:30px;
    height:30px;
    margin-bottom:40px;
}
.profile{
    width:100px;
    height:100px;
    margin-left:60px;
}
.details{
    margin-top:20px;
    background-color:white;
    color:black;
    padding:10px;
    border-radius:5px;
    font-size:12px;
    border:1px solid lightgrey;
}
.phone,.profile_user{
    width:10px;
    height:10px;
}
.call,.pro{
    background-color:white;
    color:black;
    padding:5px;
    border-radius:5px;
    font-size:12px;
    border:1px solid lightgrey;
}
.call{
    margin-left:60px;
}
.communication{
    width:30px;
    height:30px;
    margin-top:280px;
}
</style>
<body onload="show_func()">
<div class="conversation">
    <img src="facebook.png" class="facebook">
    <img src="message.png" class="messager">
    <img src="user.png" class="user">
    <img src="static.png" class="static">
    <img src="communications.png" class="communication">
    </div>
    <div class="conversation-list">
        <h2 style="text-align: center;">Conversation</h2>
        <div class="conversation-item" onclick="selectConversation('1')">Rajasekar</div>
    </div>

<div id="container">
	<main>
		<header>
				<h2>Message</h2>
		</header>

<script>
function show_func(){

var element = document.getElementById("chathist");
	element.scrollTop = element.scrollHeight;

}
</script>

<form id="myform" method="POST" >
<div class="inner_div" id="chathist">
<?php 
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db_name = "facebook"; 
$conn = new mysqli($host, $user, $pass, $db_name);

$profileQuery = "SELECT * FROM profile";
$profileResult = $conn->query($profileQuery);

if ($profileResult->num_rows > 0) {
    $profileRow = $profileResult->fetch_assoc();
} else {
    echo "No profile found.";
}


$query = "SELECT * FROM message";
$run = $conn->query($query); 
$i=0;

while($row = $run->fetch_array()) : 
if($i==0){
$i=5;
$first=$row;
?>
<div id="message1" class="message1"> 
<span style="color:black;float:right;">
<?php echo $row['msg']; ?></span> <br/>
<div>
<span style="color:black;float:left;font-size:10px;clear:both;">
	<?php echo $row['from_name']; ?>
</span>
</div>
</div>
<br/><br/>
<?php
}
else
{
if($row['from_name']!=$first['from_name'])
{
?>
<div id="message" class="message"> 
<span style="color:black;float:left;">
<?php echo $row['msg']; ?>
</span> <br/>
<div>
<span style="color:black;float:right;
		font-size:10px;clear:both;">
<?php echo $row['from_name']; ?>
</span>
</div>
</div>
<br/><br/>
<?php
} 
else
{
?>
<div id="message1" class="message1"> 
<span style="color:black;float:right;">
<?php echo $row['msg']; ?>
</span> <br/>
<div>
<span style="color:black;float:left;
		font-size:10px;clear:both;"> 
<?php echo $row['from_name']; ?>
</span>
</div>
</div>
<br/><br/>
<?php
}
}
endwhile;
?>
</div>
	<footer>
            <textarea name="msg" rows="4" cols="50" placeholder="Message" required></textarea>			 
	</footer>
</form>
</main> 
</div>
<div class="customer-profile">
    <h2 style="text-align:center">Profile</h2>
    <div>
        <img src="img/profile.png" class="profile">
        <h5 style="text-align:center"><?php echo $profileRow['first_name']. " " . $profileRow['last_name'];  ?></h5>
        <h6 style="text-align:center;margin-top:-10px">Offline</h6>
        <span class="call"><img src="img/telephone.png" class="phone"/> Call</span> <span class="pro"><img src="img/profile-user.png" class="profile_user"/> Profile</span>
        <div class="details">
        <h4>Customer Details</h4>
        <p>First Name: <?php echo $profileRow['first_name']; ?></p>
        <p>Last Name: <?php echo $profileRow['last_name']; ?></p>
        <p>Email: <?php echo $profileRow['email']; ?></p>
        <p>Phone: <?php echo $profileRow['phone']; ?></p>
        </div>
    </div>
</div>
        </div>
    </div>
</body>
</html>
