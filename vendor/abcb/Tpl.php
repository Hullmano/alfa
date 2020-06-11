<?php

    // namespace
    use Rain\Tpl;

	// include
	include "library/Rain/Tpl.php";
	
	// config
	$config = array(
					"tpl_dir"       => "views/",
					"cache_dir"     => "views-cache/",
					"debug"         => true // set to false to improve the speed
				   );

	Tpl::configure( $config );

	// create the Tpl object
	$tpl = new Tpl;

	// assign a variable
	$tpl->assign( "name", "Obi Wan Kenoby" );

	// assign an array
	$tpl->assign( "week", array( "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ) );

	// draw the template
	$tpl->draw( "simple_template" );

        