<?php
/**
* This is a Erwin pagecontroller.
*
*/
// Include the essential config-file which also creates the $erwin variable with its defaults.
include(__DIR__.'/config.php');
// Demonstration of module CDice
$dice = new CDice();
$roll = isset($_GET['roll']) && is_numeric($_GET['roll']) ? $_GET['roll'] : 0;
if($roll > 100) {
throw new Exception("Too many rolls on the dice. Not allowed.");
}
$html = null;
if($roll) {
$dice->Roll($roll);
$html = "<p>Du gjorde {$roll} kast och fick följande resultat.</p>\n<ul>";
foreach($dice->GetResults() as $val) {
$html .= "\n<li>{$val}</li>";
}
$html .= "\n</ul>\n";
$html .= "<p>Totalt fick du " . $dice->GetTotal() . " poäng på dina kast.</p>";
}

// Do it and store it all in variables in the Erwin container.
$erwin['title'] = "Kasta tärning";

// lägger till resten av sidan - header först
$erwin['header'] = <<<EOD
<img class='sitelogo' src='img/erwin.png' alt='Erwin Logo' style="height:100px;"/>
<span class='sitetitle'>Erwin webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;
// ordnar en meny med alternativen i $menu och med class-namnet 'navbar'
$NavClassObj = new CNavigation();
$erwin['header'] .= $NavClassObj->GenerateMenu($menu, 'navbar');

$erwin['main'] = <<<EOD
<h1>Kasta tärning</h1>
<p>Detta är en exempelsida som visar hur Erwin fungerar tillsammans med återanvändbara moduler.</p>
<p>Hur många kast vill du göra, <a href='?roll=1'>1 kast</a>, <a href='?roll=3'>3 kast</a> eller <a href='?roll=6'>6 kast</a>? </p>
{$html}
EOD;

$erwin['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Mikael Roos (me@mikaelroos.se) | <a href='https://github.com/mosbth/Erwin-base'>Erwin på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;

// Finally, leave it all to the rendering phase of Erwin.
include(ERWIN_THEME_PATH);