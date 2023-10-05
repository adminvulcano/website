<?
if (isset($_COOKIE["userd"])) {
$servername = "mysql.hostinger.de";
$username = "u208547031_pwadm";
$password = "polaris12";
$dbname = "u208547031_allpw";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT id, name FROM pwsafe";
$result = mysqli_query($conn, $sql);
$idget = $_COOKIE["ide"];
while ($row = mysqli_fetch_assoc($result)) {
if (in_array($idget, $row)) {
$id = $row["id"];
$name = $row["name"];
}
}

if ($_COOKIE['ide'] == $id ) {
echo '<a href="home.php" title="Back to our Homepage">Home</a>
 <a href="private.php" title="Visit your private Site">'.$name.'</a>
 <a href="logout.php" title="Logout">Logout</a>';
}
if($_SERVER['PHP_SELF'] == "/private.php") {
$sql = "SELECT id, rechte, name FROM pwsafe";
$result = mysqli_query($conn, $sql);
$idget = $_COOKIE["ide"];
while ($row = mysqli_fetch_assoc($result)) {
if (in_array($idget, $row)) {
$rechte = $row["rechte"];

}
}
if ($rechte != 1) {
header("Location:http://www.vulcano.hol.es/noright.html");
}
}

}
else{
echo '<div title="Zurück zur Startseite" class="ahome"><nav class="sitenav">
  <a href="home.php#about"><div>Über uns</div></a>
  <a href="home.php#download"><div>Unsere Programme</div></a>
  <a href="home.php#addition"><div>Nicht beachten</div></a>
</nav>
<a href="home.php">Start</a>
</div>
<a href="log.php" title="Erstelle ein Konto"><div>Konto erstellen</div></a>
<a href="login.php" title="Logge dich in deinen Account ein"><div>Login</div></a>';
}

?>
