<?php

namespace Abcb;

use Rain\Tpl;

class Page
{
	private $tpl;

	public function __construct($tpl_dir = "views/", $set_draw = "login")
	{
		// config
		$config = array(
						"tpl_dir"       => $tpl_dir,
						"cache_dir"     => "views-cache/",
						"debug"         => false // set to false to improve the speed
					   );

		Tpl::configure( $config );

		// create the Tpl object
		$this->tpl = new Tpl;

		// assign a variable
		//$tpl->assign( "name", "Obi Wan Kenoby" );

		// draw the template
		$this->tpl->draw($set_draw);
	}
}

?>       