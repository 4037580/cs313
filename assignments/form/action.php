<?php
echo "<html><body>";
echo "Name: " . $_POST["name"] . "<br>";
echo "Email Address: <a href='mailto:" . $_POST["email"] . "'>" . $_POST["email"] . "</a><br>";
echo "Major: " . $_POST["major"] . "<br>";
echo "Places I have visited: <br>";
echo implode("<br>",$_POST["places"]);
//foreach($_POST["places"] as $place)
//{
//    echo $place . "<br>";
//}
echo "<br>";
echo $_POST["comments"];
echo "</body></html>";

?>
