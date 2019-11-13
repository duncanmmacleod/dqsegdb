<?php
/*
This file is part of the DQSEGDB WUI.

This file was written by Gary Hemming <gary.hemming@ego-gw.it>.

DQSEGDB WUI uses the following open source software:
- jQuery JavaScript Library v1.12.4, available under the MIT licence - http://jquery.org/license - Copyright jQuery Foundation and other contributors.
- W3.CSS 2.75 by Jan Egil and Borge Refsnes.
- Font Awesome by Dave Gandy - http://fontawesome.io.
- Jquery Timepicker, developed and maintained by Willington Vega. Code licensed under the MIT and GPL licenses - http://timepicker.co
*/

// Start PHP up and initialise everything required.
require_once('init/initialise.php');

// Include libraries.
require_once 'classes/Homepage.php';
require_once 'classes/HTMLStructure.php';
require_once 'classes/SessionManager.php';
require_once 'classes/Utils.php';

// Instantitate.
$home = new Homepage();
$html = new HTMLStructure();
$sessions = new SessionManager();
$utils = new Utils();

// If downloading JSON.
if(isset($_GET['download']) && isset($_GET['al'])) {
    header("Content-Disposition: attachment; filename=author_list_NEW.tex");
    header("Content-Type: text/plain");
    echo "\documentclass[12pt]{iopart}\n";
    echo "\begin{document}\n";
    echo "\author{";
    echo "\end{document}\n";
}
// Otherwise, not downloading JSON.
else {
    // Build.
    $html->build_header();
    $html->build_nav_bars();
    $home->build_homepage();
    $html->build_right_hand_options();
    $html->build_warning_modal();
    $html->build_info_modal();
    $html->build_footer();
    
    // Output.
    echo $html->header;
    echo $html->nav_bars;
    echo $home->home;
    echo $html->right_hand_options;
    echo $html->warning_modal;
    echo $html->info_modal;
    echo $html->footer;
}
?>