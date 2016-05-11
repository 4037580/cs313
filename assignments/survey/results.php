<?php
session_start();
$myfile = file_get_contents("results.txt") or die("Unable to open file!");
$lines = explode("\n", $myfile);
//Set best major result variables.
$CS = 0;
$WDD = 0;
$CIT = 0;
$CE = 0;
//Set best continent result variables.
$NA = 0;
$SA = 0;
$EU = 0;
$AS = 0;
$AU = 0;
$AF = 0;
$AN = 0;
//Set worst major result variables.
$wCS = 0;
$wWDD = 0;
$wCIT = 0;
$wCE = 0;
//Set worst continent result variables.
$wNA = 0;
$wSA = 0;
$wEU = 0;
$wAS = 0;
$wAU = 0;
$wAF = 0;
$wAN = 0;
foreach($lines as $line) {
	list($major, $continent, $wMajor, $wContinent) = explode('. ', $line . '...');

	switch ($major) {
		case "Computer Science":
			$CS += 1;
			break;
		case "Web Development and Design":
			$WDD += 1;
			break;
		case "Computer Information Technology":
			$CIT += 1;
			break;
    case "Computer Engineering":
  		$CE += 1;
  		break;
		default:
			break;
	}

	switch ($continent) {
		case "North America":
			$NA += 1;
			break;
		case "South America":
			$SA += 1;
			break;
		case "Europe":
			$EU += 1;
			break;
    case "Asia":
  		$AS += 1;
  		break;
    case "Australia":
      $AU += 1;
      break;
    case "Africa":
  		$AF += 1;
  		break;
    case "Antarctica":
    	$AN += 1;
    	break;
		default:
			break;
	}

  switch ($wMajor) {
		case "Computer Science":
			$wCS += 1;
			break;
		case "Web Development and Design":
			$wWDD += 1;
			break;
		case "Computer Information Technology":
			$wCIT += 1;
			break;
    case "Computer Engineering":
  		$wCE += 1;
  		break;
		default:
			break;
	}

	switch ($wContinent) {
		case "North America":
			$wNA += 1;
			break;
		case "South America":
			$wSA += 1;
			break;
		case "Europe":
			$wEU += 1;
			break;
    case "Asia":
  		$wAS += 1;
  		break;
    case "Australia":
      $wAU += 1;
      break;
    case "Africa":
  		$wAF += 1;
  		break;
    case "Antarctica":
    	$wAN += 1;
    	break;
		default:
			break;
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Survey Results</title>
	</head>
	<body>
		<div id="header">
			<h1>Survey Results:</h1>
			<?php
				if (isset($_SESSION['votes']) && $_SESSION['votes'] > 1) {
					echo "<p>You already vote!<br/></p>";
				}
			?>
		</div>
		<table>
			<tr><td><b>Best Major:</b></td><td>&nbsp</td></tr>
      <tr>
      <td>
        Computer Science:<br/>
        Web Development and Design:<br/>
        Computer Information Technology:<br/>
        Computer Engineering:
      </td>
      <td>&nbsp</td>
      <td>
        <?php
        echo $CS . "<br/>";
        echo $WDD . "<br/>";
        echo $CIT . "<br/>";
        echo $CE . "<br/>";
        ?>
      </td>
      </tr>
      <tr><td>&nbsp</td><td>&nbsp</td></tr>

      <tr><td><b>Best Continent:</b></td><td>&nbsp</td></tr>
      <tr>
      <td>
        North America:<br/>
        South America:<br/>
        Europe:<br/>
        Asia:<br/>
        Australia:<br/>
        Africa:<br/>
        Antarctica:<br/>
      </td>
      <td>&nbsp</td>
      <td>
        <?php
        echo $NA . "<br/>";
        echo $SA . "<br/>";
        echo $EU . "<br/>";
        echo $AS . "<br/>";
        echo $AU . "<br/>";
        echo $AF . "<br/>";
        echo $AN . "<br/>";
        ?>
      </td>
      </tr>
      <tr><td>&nbsp</td><td>&nbsp</td></tr>

      <tr><td><b>Worst Major:</b></td><td>&nbsp</td></tr>
      <tr>
      <td>
        Computer Science:<br/>
        Web Development and Design:<br/>
        Computer Information Technology:<br/>
        Computer Engineering:
      </td>
      <td>&nbsp</td>
      <td>
        <?php
        echo $wCS . "<br/>";
        echo $wWDD . "<br/>";
        echo $wCIT . "<br/>";
        echo $wCE . "<br/>";
        ?>
      </td>
      </tr>
      <tr><td>&nbsp</td><td>&nbsp</td></tr>

      <tr><td><b>Worst Continent:</b></td><td>&nbsp</td>
      </tr>
      <tr>
      <td>
        North America:<br/>
        South America:<br/>
        Europe:<br/>
        Asia:<br/>
        Australia:<br/>
        Africa:<br/>
        Antarctica:<br/>
      </td>
      <td>&nbsp</td>
      <td>
        <?php
        echo $wNA . "<br/>";
        echo $wSA . "<br/>";
        echo $wEU . "<br/>";
        echo $wAS . "<br/>";
        echo $wAU . "<br/>";
        echo $wAF . "<br/>";
        echo $wAN . "<br/>";
        ?>
      </td>
      </tr>
    </table>
	</body>
</html>
