<?php
?>
  <div class="panel panel-default">
  <div class="panel-heading">Connected P25 Gateways</div>
  <!-- Tabelle -->
  <div class="table-responsive">
  <table id="gateways" class="table table-condensed">
  	<thead>
    <tr>
      <th>Reporting Time UTC (Local)</th>
      <th>Gateway</th>
      <th>Location</th>
      <th>Port</th>
      <th>Network</th>
    </tr>
    </thead>
    <tbody>
<?php
	//$gateways = getConnectedGateways($logLines);
	$gateways = getLinkedGateways($logLines);
	foreach ($gateways as $gateway) {

		echo "<tr>";

		$dateloc = date_create($gateway[timestamp],timezone_open('UTC'));
                date_timezone_set($dateloc, timezone_open(TIMEZONE));

                echo"<td>$gateway[timestamp] (" . date_format($dateloc,'H:i') . ")</td>";

		echo "<td><b><a href='https://www.qrz.com/db/" . trim($gateway[callsign]) . "' target='_new'>" . trim($gateway[callsign]) . "</a></b></td>";
		echo "<td><a href='https://who.is/whois-ip/ip-address/" . substr($gateway[ipport], 0, strpos($gateway[ipport], ":")) . "' target='new'>" . substr($gateway[ipport], 0, strpos($gateway[ipport], ":")) . "</td>";
		echo "<td>" . substr($gateway[ipport], strpos($gateway[ipport], ":")+1, 5) . "</td>";
		echo "<td>" . substr($gateway[ipport], strpos($gateway[ipport], " ")+1) . "</td>";
		echo "</tr>";
	}
?>
</tbody>
  </table>
  </div>
  <script>
    $(document).ready(function(){
      $('#gateways').dataTable( {
        "aaSorting": [[0,'desc']]
      } );
    });
   </script>
</div>
