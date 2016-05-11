<?php
session_start();
if (isset($_SESSION['hasVoted'])) {
	$_SESSION['votes'] += 1;
	header('Location: results.php');
}
?>

<html>
    <head>
    </head>
<body>
    <h1>Survey</h1>
		<p>Choose your favorie Major and Continent.<br>Choose your least favorite Major and Continent</p>
	  See <a href="results.php">Results!</a><br><br>
    <form action="submit.php" method="POST">
    <b>What's the best major?</b><br>
        <input type="radio" name="major" value="Computer Science"> Computer Science<br>
        <input type="radio" name="major" value="Web Development and Design"> Web Development and Design<br>
        <input type="radio" name="major" value="Computer Information Technology"> Computer Information Technology<br>
        <input type="radio" name="major" value="Computer Engineering"> Computer Engineering<br><br>
    <b>What's the best continent?</b><br>
        <input type="radio" name="continent" value="North America"> North America<br>
        <input type="radio" name="continent" value="South America"> South America<br>
        <input type="radio" name="continent" value="Europe"> Europe<br>
        <input type="radio" name="continent" value="Asia"> Asia<br>
        <input type="radio" name="continent" value="Australia"> Australia<br>
        <input type="radio" name="continent" value="Africa"> Africa<br>
        <input type="radio" name="continent" value="Antarctica"> Antarctica<br><br>
    <b>What's the worst major?</b><br>
        <input type="radio" name="wMajor" value="Computer Science"> Computer Science<br>
        <input type="radio" name="wMajor" value="Web Development and Design"> Web Development and Design<br>
        <input type="radio" name="wMajor" value="Computer Information Technology"> Computer Information Technology<br>
        <input type="radio" name="wMajor" value="Computer Engineering"> Computer Engineering<br><br>
    <b>What's the worst continent?</b><br>
        <input type="radio" name="wContinent" value="North America"> North America<br>
        <input type="radio" name="wContinent" value="South America"> South America<br>
        <input type="radio" name="wContinent" value="Europe"> Europe<br>
        <input type="radio" name="wContinent" value="Asia"> Asia<br>
        <input type="radio" name="wContinent" value="Australia"> Australia<br>
        <input type="radio" name="wContinent" value="Africa"> Africa<br>
        <input type="radio" name="wContinent" value="Antarctica"> Antarctica<br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
