<?php
/*
 This file is part of the DQSEGDB WUI.
 
 This file was written by Gary Hemming <gary.hemming@ego-gw.it>.
 
 DQSEGDB WUI uses the following open source software:
 - jQuery JavaScript Library v1.12.4, available under the MIT licence - http://jquery.org/license - Copyright jQuery Foundation and other contributors.
 - W3.CSS by Jan Egil and Borge Refsnes.
 - Font Awesome by Dave Gandy - http://fontawesome.io.
 - Jquery Timepicker, developed and maintained by Willington Vega. Code licensed under the MIT and GPL licenses - http://timepicker.co
 */

// Get libraries.
require_once('Constants.php');
require_once('DAO.php');

// File-handling class.
class Files {

	/* Make a JSON file. */
	public function make_json_file($in_file, $data) {
		// Init.
		$r = FALSE;
		// Instantiate.
		$constants = new Constants();
		$dao = new DAO();
		// Get file-related variables.
		$constants->get_file_related_variables();
		// If put to file successful.
		if(file_put_contents($constants->doc_root.$constants->download_dir.$in_file, $data)) {
			// Insert file metadata to database.
			//if($dao->insert_file_metadata($in_file, 'json')) {
				// Set.
				$r = TRUE;
				//}
		}
		// Return.
		return $r;
	}

	/* Make a non-JSON file. */
	public function make_non_json_file($in_file, $out_file, $data, $format) {
		// If the format being requested is not JSON.
		if($format != 'json') {
		    // Instantiate.
		    $constants = new Constants();
		    $dao = new DAO();
			// Get file-related variables.
		    $constants->get_file_related_variables();
			// Convert file to different format, too.
		    shell_exec($constants->doc_root.$constants->python_utilities_dir.'convert_formats.py '.$variable->doc_root.$variable->download_dir.$in_file." -o ".$constants->doc_root.$constants->download_dir.$out_file." -t ".$format);
			// Insert file metadata to database.
			//$dao->insert_file_metadata($out_file, $format);
		}
	}
}

?>