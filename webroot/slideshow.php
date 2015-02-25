<?php
/**
* This is a Erwin pagecontroller.
*
*/
// Include the essential config-file which also creates the $erwin variable with its defaults.
include(__DIR__.'/config.php');
// Define what to include to make the plugin to work
$erwin['stylesheets'][] = 'css/slideshow.css';
$erwin['javascript_include'][] = 'js/slideshow.js';


// Do it and store it all in variables in the Erwin container.
$erwin['title'] = "Slideshow för att testa JavaScript i Erwin";


// lägger till resten av sidan
$erwin['header'] = <<<EOD
<img class='sitelogo' src='img/erwin.png' alt='Erwin Logo' style="height:100px;"/>
<span class='sitetitle'>Erwin webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;
// ordnar en meny med alternativen i $menu och med class-namnet 'navbar'
$NavClassObj = new CNavigation();
$erwin['header'] .= $NavClassObj->GenerateMenu($menu, 'navbar');

$erwin['main'] = <<<EOD
<div id="slideshow" class='slideshow' data-host="" data-path="img/colors/" data-images='["color-1.png", "color-2.png", color-3.png"]'>
<img src='img/colors/color-1.png' width='950px' height='180px' alt='Color'/>
</div>
<h1>En slideshow med JavaScript</h1>
<p>Detta är en exempelsida som visar hur Erwin fungerar tillsammans med JavaScript.</p>
EOD;

$erwin['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Mikael Roos (me@mikaelroos.se) | <a href='https://github.com/mosbth/Erwin-base'>Erwin på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;
// Finally, leave it all to the rendering phase of Erwin.
include(ERWIN_THEME_PATH);