# NFL Quarterback Rating with Object Oriented PHP

##Useful example of object-oriented programming (OOP)
In an effort to get a feel for OOP in PHP I decided just to dive into my own application.  I had worked with creating a model for NFL Quarterback Rating before in Excel and thought it fit the bill for a simple-enough challenge in OOP.

The goal was to construct the model _properly_ using OOP and a web form, and I sincerely hope to get some feedback from the Github community on how the code could be improved in order to make it more sensible and ensure that it follows the normal conventions.  While I'm not necessarily a perfectionist myself, it's great to at least be aware of the proper way.

To get acquainted with OOP before writing the NFL QBR script, I watched the [PHP Academy videos on OOP in PHP](http://www.youtube.com/watch?v=hzeh0cDATpA&list=EC5B130A55CD98BA59&feature=plcp).

For anyone trying to get a most basic grip on what's going on, the results from the submitted form are fed into class 'QBR'.

$player_stats = new QBR($player_attempts, $player_completions, $player_yards, $player_touchdowns, $player_interceptions);

Then after all of the methods in the class (the various functions) are executed in the separate QBR.php file which is the contained the 'classes' folder, the result is retrieved.

echo round($player_stats->qbr(), 2);

The calculation of NFL QBR is explained clearly on its [Wikipedia page](http://en.wikipedia.org/wiki/Passer_rating).

###CSS
I went ahead and beautified it with some CSS.  It's nothing special, but for anyone looking to learn basic CSS it may be helpful.

![NFL QBR Screenshot](NFL_QB_Rating/blob/master/images/nfl_qbr_screenshot.png?raw=true "NFL QBR Application with PHP using OOP")

##Origin of the project
For a Microsoft Excel class that I have taught at the local recreation center I came up with real life uses for Excel since they were easier to relate to.  One of the problems challenged the students to use Excel to create a model that would output an NFL Quarterback Rating (NFL QBR) based on the five inputs to NFL QBR:

1. Total Pass Attempts
2. Total Completions
3. Total Passing Yards
4. Total Passing Touchdowns
5. Total Interceptions

If you're interested, I have included the Excel file in the repository in the 'excel' folder.