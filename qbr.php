<?php // formtest2.php
if (isset($_POST['attempts'])) $player_attempts = $_POST['attempts']; else $player_attempts = "(Not entered)";
if (isset($_POST['completions'])) $player_completions = $_POST['completions']; else $player_completions = "(Not entered)";
if (isset($_POST['yards'])) $player_yards = $_POST['yards']; else $player_yards = "(Not entered)";
if (isset($_POST['touchdowns'])) $player_touchdowns = $_POST['touchdowns']; else $player_touchdowns = "(Not entered)";
if (isset($_POST['interceptions'])) $player_interceptions = $_POST['interceptions']; else $player_interceptions = "(Not entered)";

require_once 'classes/QBR.php';

$player_stats = new QBR($player_attempts, $player_completions, $player_yards, $player_touchdowns, $player_interceptions);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Form Test</title>
    <link rel="stylesheet" href="css/qbr.css">
	</head>
	<body>
	<h1 style="text-align:center">Calculating NFL Quarterback Rating with PHP</h1>
  <h3>NFL QB Rating Background</h2>
	<p>The NFL quarterback rating is commonly used to measure the performance of football's most important position, the quarterback.</p>
	<p>The quarterback rating uses four (4) metrics based around number of passing attempts:</p>
	<ul>
		<li>Percentage of completions per attempt</li>
		<li>Average yards gained per attempt</li>
		<li>Percentage of touchdown passes per attempt</li>
		<li>Percentage of interceptions per attempt</li>
	</ul>
	<p>We are going to create a model to calculate Steve Young's QB rating 1994 season, when he broke the record.  First I will introduce his record season, then introduce the calculation of NFL quarterback rating.</p>
	<hr />
  <h3>Steve Young's record-breaking 1994 season</h2>
	<p>In 1994, San Francisco 49er quarterback Steve Young had a spectacular season where he was named the NFL's Most Valuable Player during the regular season and the Most Valuable Player of Super Bowl XXIX.  He also broke Joe Montana's record for single-season quarterback rating.  The statistics relevant to the calculation of his QB rating are provided below.</p>
  <p style="font-weight: 700">Steve Young's 1994 Passing Statistics</p>
  <table>
    <tr>
      <td>Total Pass Attempts</td>
      <td>461</td>
    </tr>
    <tr>
      <td>Total Completions</td>
      <td>324</td>
    </tr>
    <tr>
      <td>Total Passing Yards</td>
      <td>3,969</td>
    </tr>
    <tr>
      <td>Total Passing Touchdowns</td>
      <td>35</td>
    </tr>
    <tr>
      <td>Total Interceptions</td>
      <td>10</td>
    </tr>
	</table>
	<br />
	<form id="qbr-form" method="post" action="qbr.php">
  	<label>Total Pass Attempts:</label><input type="number" name="attempts" required="required" /><br>
    <label>Total Completions:</label><input type="number" name="completions" required="required" /><br>
    <label>Total Passing Yards:</label><input type="number" name="yards" required="required" /><br>
    <label>Total Passing Touchdowns:</label><input type="number" name="touchdowns" required="required" /><br>
    <label>Total Interceptions:</label><input type="number" name="interceptions" required="required" /><br>
    <button type="submit">Calculate</button>
	</form>
  <div id="qbr-result-wrapper">
    <span class="qbr-result-label">NFL QB Rating:</span><span class="qbr-result-number"><?php echo round($player_stats->qbr(), 2) ?></span>
  </div>
	</body>
</html>