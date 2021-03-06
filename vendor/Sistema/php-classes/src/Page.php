<?php 
namespace Sistema;
use Rain\Tpl;
use \Sistema\Model\Usuario\Usuario;

class Page {
	private $tpl;
	private $options = [];
	private $defaults = [
		"header"=>true,
		"footer"=>true,	
		"data"=>[]
	];
	//método para o header
	public function __construct($opts = array(), $tpl_dir = "/views/"){
		$this->options = array_merge($this->defaults, $opts);
		$config = array(
					"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
					"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
					"debug"         => false // set to false to improve the speed
				   );
		Tpl::configure( $config );
		$this->tpl = new Tpl;
		
		$this->setData($this->options["data"]);
		if ($this->options["header"] === true) $this->tpl->draw("header");
		
	}
	private function setData($data = array())
	{
		foreach ($data as $key => $value) {
			# code...
			$this->tpl->assign($key, $value);
		}
	}
	public function setTpl($name, $data = array(), $returnHTML = false)
	{
		$this->setData($data);
		return $this->tpl->draw($name, $returnHTML);
	}
	//método para o footer
	public function __destruct(){

		if(isset($_SESSION[Usuario::SESSION]['puser'])){
			$permiss = $_SESSION[Usuario::SESSION]['puser'];
		}
		

		if($this->options["footer"] === true) {
				$this->tpl->assign('permiss', $permiss);
				$this->tpl->draw("footer");
		}
	}
}
 ?>