<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
include "config.php";
include "tools.php";
include "functions.php";
$configs = getP25ReflectorConfig();
$logLines = getShortP25ReflectorLog();
$reverseLogLines = $logLines;
array_multisort($reverseLogLines,SORT_DESC);
$lastHeard = getLastHeard($reverseLogLines, True);
if(isset($lastHeard[0])){
	$listElem = $lastHeard[0];
	if (strlen($listElem[0]) !== 0) {
		echo "<tr>";

		$dateloc = date_create($listElem[0],timezone_open('UTC'));
                date_timezone_set($dateloc, timezone_open(TIMEZONE));

                echo"<td bgcolor='" . TXHIGHLIGHT . "'>$listElem[0] (" . date_format($dateloc,'H:i') . ")</td>";

		if (constant("SHOWQRZ") && $listElem[1] !== "??????????" && !is_numeric($listElem[1])) {
			echo"<td bgcolor='" . TXHIGHLIGHT . "' nowrap><b><a target=\"_new\" href=\"https://qrz.com/db/$listElem[1]\">".str_replace("0","&Oslash;",$listElem[1])."</a></b></td>";
		} else {
			echo"<td bgcolor='" . TXHIGHLIGHT . "' nowrap><b><a target='_new' href='https://database.radioid.net/database/view?id=$listElem[1]'>$listElem[1]</a></b></td>";
		}
		echo"<td bgcolor='" . TXHIGHLIGHT . "' nowrap>$listElem[2]</td>";
		echo"<td bgcolor='" . TXHIGHLIGHT . "' nowrap>$listElem[3]</td>";
		$UTC = new DateTimeZone("UTC");
		$d1 = new DateTime($listElem[0], $UTC);
		$d2 = new DateTime('now', $UTC);
		$diff = $d2->getTimestamp() - $d1->getTimestamp();
		echo"<td bgcolor='" . TXHIGHLIGHT . "' nowrap>$diff s</td>";
		echo "</tr>";
	}
}
?>


