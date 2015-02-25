<?php 
/**
 * This is a Erwin pagecontroller.
 *
 */
// Include the essential config-file which also creates the $erwin variable with its defaults.
include(__DIR__.'/config.php'); 

// Add style for csource
$erwin['stylesheets'][] = 'css/source.css';
 
 
// Do it and store it all in variables in the Erwin container.
$erwin['title'] = "Visa källkod";

// lägger till resten av sidan
$erwin['header'] =  <<<EOD
<img class='sitelogo' src='img/erwin.png' alt='Erwin Logo' style="height:100px;"/>
<span class='sitetitle'>Erwin webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;
// ordnar en meny med alternativen i $menu och med class-namnet 'navbar'
$NavClassObj = new CNavigation();
$erwin['header'] .= $NavClassObj->GenerateMenu($menu, 'navbar');

// Create the object to display sourcecode
//$source = new CSource();
$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..'));
 
$erwin['main'] = "<h1>Visa källkod</h1>\n" . $source->View();
 
$erwin['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Mikael Roos (me@mikaelroos.se) | <a href='https://github.com/mosbth/Erwin-base'>Erwin på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;
 
 
// Finally, leave it all to the rendering phase of Erwin.
include(ERWIN_THEME_PATH);