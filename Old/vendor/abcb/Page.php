<?php

namespace Abcb;

use Rain\Tpl;

class Page
{
	private $tpl;
	private $var1;

	public function __construct($tpl_dir = "views/")
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
		//$this->tpl->assign( "client", "var1" );

		// draw the template
		//$this->tpl->draw($set_draw);
	}

	public function setAssign($assign = array())
	{
		foreach ($assign as $key => $value) 
		{
			$this->tpl->assign($key, $value);
		}
	}

	public function setDraw($name, $assign = array())
	{
		$this->setAssign($assign);

		$this->tpl->draw($name);
	}

}

?>       