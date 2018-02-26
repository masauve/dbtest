<?php
$dbhost = getenv("DB_HOST");
$dbport = getenv("DB_PORT");
$dbuser = getenv("DB_USER");
$dbname = getenv("DB_DATABASE");
$dbpwd = getenv("DB_PASSWORD");
$connection_string="host=$dbhost port=$dbport dbname=$DB_DATABASE user=$DB_USER password=$DB_PASSWORD";
$connection = pg_connect($connection_string);
$query = "SELECT * from users";
?>

<table border="5" cellspacing="1" cellpadding="2">
<tr>
<td>
<font face="Arial, Helvetica, sans-serif">ID</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">User Name</font>
</td>
</tr>

<?php
$rs = $connection->query($query);
while ($row = pg_fetch_assoc($rs)) {

?>

<tr>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row['user_id']; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row['username']; ?></font>
</td>
</tr>


<?php
}
pg_close($connection);

?>
