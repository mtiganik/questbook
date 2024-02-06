<?php
if(!isset($_SESSION)){
session_start();}
$leftText="";
$loggedIn = isset($_SESSION["user"]);
if($loggedIn){
$leftText='
<ul style="list-style-type:none; padding-left:10px;">
<li style="font-size:30px;"><b>'.ucfirst($_SESSION["user"]).'</b></li>
<li><span class="list logout"><a href="logout.php">Logout</a></span></li>
<li><span class="list top"><a href="top.php">Top pictures:</a></span></li>
<li><span class="list profile"><a href="profile.php">your pictures</a></span></li>
<li><span class="list upload"><a href="index.php">upload pictures</a></span></li>
<li><span class="list"><a href="accounts.php">Accounts</a></span></li>
</ul>';

}else {echo "Not logged in";
$leftText='
<ul style="list-style-type:none; padding-left:10px;">
<li><span class="list logout"><a href="login.php">Login</a></span></li>
<li><span class="list logout"><a href="register.php">Register</a></span></li>
<li><span class="list top"><a href="top.php">Top pictures:</a></span></li>
<li><span class="list"><a href="accounts.php">Accounts</a></span></li>
</ul>';


}
?>