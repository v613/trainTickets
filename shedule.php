<?
require_once "model.php";
$db=new DatabaseConnect("localhost","trainTickets","root","");
$c1 = $_GET['c1'];
$c2 = $_GET['c2'];
echo "<table class='table table-hover'><thead><tr><th>Din</th><th>Spre</th><th>Ora</th></tr></thead>";
echo "<tbody>";
$Q = mysql_query("SELECT schedule.id,schedule.start,schedule.destination,schedule.start_time FROM schedule JOIN train ON schedule.id_train=train.id WHERE schedule.start='$c1' AND schedule.destination='$c2' AND train.type='pasager'");
$q = mysql_fetch_array($Q);
do{
	echo "<tr onclick='redirect($q[0])'><td>$q[1]</td><td>$q[2]</td><td>$q[3]</td></tr>";
}while ($q = mysql_fetch_array($Q));

echo "</tbody></table>";
?>