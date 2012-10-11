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
		<title>NFL QBR Calculator</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/qbr.css">
	</head>
	<body>
    <div id="header">
      <h1 class="page-title">Calculating NFL Quarterback Rating with <span class="php-in-title">PHP</span></h1>
    </div>
    <div id="container">
      <div class="panel">
        <h3>NFL QB Rating Background</h3>
        <p>The NFL quarterback rating is commonly used to measure the performance of football's most important position, the quarterback.  The quarterback rating uses four (4) metrics based around number of passing attempts:</p>
        <ul>
          <li>Percentage of completions per attempt</li>
          <li>Average yards gained per attempt</li>
          <li>Percentage of touchdown passes per attempt</li>
          <li>Percentage of interceptions per attempt</li>
        </ul>
			  <p>The Wikipedia page explains how to calculate NFL Quarterback Rating: <a href="http://en.wikipedia.org/wiki/Passer_rating" target="_blank">http://en.wikipedia.org/wiki/Passer_rating</a></p>        
      </div>
      <div class="panel">
        <h3>Steve Young's Record-Breaking 1994 Season</h3>
        <p class="left-text">In 1994, San Francisco 49er quarterback Steve Young had a spectacular season where he was named the NFL's Most Valuable Player during the regular season and the Most Valuable Player of Super Bowl XXIX.  He also broke Joe Montana's record for single-season quarterback rating.  The statistics relevant to the calculation of his QB rating are provided below.</p>
      	<div class="right-table">
          <h5 class="mini-title">Steve Young's 1994 Passing Statistics</h5>
          <table class="right-table">
            <tr>
              <td>Total Pass Attempts</td>
              <td class="cell-number">461</td>
            </tr>
            <tr class="even-row">
              <td>Total Completions</td>
              <td class="cell-number">324</td>
            </tr>
            <tr>
              <td>Total Passing Yards</td>
              <td class="cell-number">3,969</td>
            </tr>
            <tr class="even-row">
              <td>Total Passing Touchdowns</td>
              <td class="cell-number">35</td>
            </tr>
            <tr>
              <td>Total Interceptions</td>
              <td class="cell-number">10</td>
            </tr>
          </table>
      	</div>
      	<div class="clear"></div>
      </div>
      <div class="panel">
      	<h3>NFL Quarterback Rating Calculator</h3>
        <form id="qbr-form" method="post" action="qbr.php#qbr-form">
        	<div class="qbr-form-inputs">
            <label>Attempts:</label><input type="number" name="attempts" min="0" placeholder="Total Pass Attempts" required="required" /><br>
            <label>Completions:</label><input type="number" name="completions" min="0" placeholder="Total Completions" required="required" /><br>
            <label>Yards:</label><input type="number" name="yards" min="0" placeholder="Total Yards" required="required" /><br>
            <label>Touchdowns:</label><input type="number" name="touchdowns" min="0" placeholder="Total Touchdowns" required="required" /><br>
            <label>Interceptions:</label><input type="number" name="interceptions" min="0" placeholder="Total Interceptions" required="required" /><br>
          </div>
          <div class="calc-mini-panel">
            <button type="submit">Calculate</button>
            <div class="qbr-result-number"><?php echo round($player_stats->qbr(), 2); ?></div>
          </div>
        </form>
      	<div class="clear"></div>
      </div>
      <div class="panel">
        <h3>Drew Brees's "Perfect Game"</h3>
        <p class="left-text">We should check that the formulas are working properly.  Specifically, we should make sure that the conditionals are working (e.g. "If the result is less than zero, award zero points.  If the result is greater than 2.375, award 2.375.").  To do this, we'll plug in the stats from Drew Brees's "perfect game" against New England in 2009, which should render the max QBR of 158.33.  The Saints went on to win the Super Bowl during the 2009 season.</p>
      	<div class="right-table">
          <h5 class="mini-title">Drew Brees's "Perfect Game" Statistics</h5>
          <table class="right-table">
            <tr>
              <td>Total Pass Attempts</td>
              <td class="cell-number">23</td>
            </tr>
            <tr class="even-row">
              <td>Total Completions</td>
              <td class="cell-number">18</td>
            </tr>
            <tr>
              <td>Total Passing Yards</td>
              <td class="cell-number">371</td>
            </tr>
            <tr class="even-row">
              <td>Total Passing Touchdowns</td>
              <td class="cell-number">5</td>
            </tr>
            <tr>
              <td>Total Interceptions</td>
              <td class="cell-number">0</td>
            </tr>
          </table>
      	</div>
      	<div class="clear"></div>
      </div>
    </div>
	</body>
</html>