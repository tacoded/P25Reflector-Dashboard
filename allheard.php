<?php
?>
  <div class="panel panel-default">
  <div class="panel-heading">All Heard List</div>
  <!-- Tabelle -->
  <div class="table-responsive">  
  <table id="allHeard" class="table table-condensed">
  <thead>
    <tr>
      <th>Time UTC (Local)</th>
      <th>Radio ID</th>
      <th>Target</th>
      <th>Gateway</th>
      <th>Dur (s)</th>
    </tr>
  </thead>
  <tbody>
<?php
for ($i = 0; $i < count($allHeard); $i++) {
		$listElem = $allHeard[$i];
		echo"<tr>";

		$dateloc = date_create($listElem[0],timezone_open('UTC'));
                date_timezone_set($dateloc, timezone_open(TIMEZONE));

                echo"<td>$listElem[0] (" . date_format($dateloc,'H:i') . ")</td>";


		echo"<td><b><a href='https://www.qrz.com/db/$listElem[1]' target='_new'>$listElem[1]</a></b></td>";
		echo"<td>$listElem[2]</td>";
		echo"<td>$listElem[3]</td>";
		echo"<td>$listElem[4]</td>";
		echo"</tr>\n";
	}

?>
  </tbody>
  </table>
  </div>
  <script>
    $(document).ready(function(){
      $('#allHeard').dataTable( {
        "aaSorting": [[0,'desc']]
      } );
    });
   </script>
</div>
