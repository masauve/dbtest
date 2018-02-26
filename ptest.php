 <html>

  <head>
   <title>Test</title>
  </head>

  <body bgcolor="white">

  <?php
  $dbhost = getenv("DB_HOST");
  $dbport = getenv("DB_PORT");
  $dbuser = getenv("DB_USER");
  $dbname = getenv("DB_DATABASE");
  $dbpwd = getenv("DB_PASSWORD");
  $connect_string = "host=$dbhost dbname=$DB_NAME user=$DB_USER password=$DB_PASSWORD";
  echo "Connect String: $connect_string";
  $link = pg_Connect($connect_string);
  $result = pg_exec($link, "select * from users");
  $numrows = pg_numrows($result);
  echo "<p>link = $link<br>
  result = $result<br>
  numrows = $numrows</p>
  ";
  ?>

  <table border="1">
  <tr>
   <th>First name</th>
   <th>ID</th>
  </tr>
  <?php

   // Loop on rows in the result set.

   for($ri = 0; $ri < $numrows; $ri++) {
    echo "<tr>\n";
    $row = pg_fetch_array($result, $ri);
    echo " <td>", $row["username"], "</td> <td>", $row["user_id"], "</td> </tr> ";
   }
   pg_close($link);
  ?>
  </table>

  </body>

  </html>

