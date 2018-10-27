<?php

class Route {

	private $url;
	private $controller;
	private $method;

    function __construct() {
        
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $this->method = $url;

        $this->url = '/' . $url[0];
	}

	public function redirect($controller, $function = NULL)
	{	

		if (!isset($this->controller)) {

			$this->controller = $controller['controller'];

			$file = 'controller/' . $controller['path'] . '.php';

		    if(file_exists($file)){
		        require $file;
		    }else{
		        //$error();
		    }
		}

		if ($function != NULL) {
			$function();
		}
	}

	public function get($uri, $controller, $function = NULL)
	{	

		if ($this->url === $uri) {

			$this->controller = $controller['controller'];

			$file = 'controller/' . $controller['path'] . '.php';

		    if(file_exists($file)){
		        require $file;
		    }else{
		        //$error();
		    }
		}

		if ($function != NULL) {
			$function();
		}
	}

	public function run()
	{
		if (!isset($this->controller)) {
			require 'controller/error.php';
			$this->controller = 'Error';
		}

		$controller = new $this->controller;

		// calling methods
		if (isset($this->method[2])) {
			if (method_exists($controller, $this->method[1])) {
				$controller->{$this->method[1]}($this->method[2]);
			} else {
				$this->error();

				console_write('method 2 : ' . $this->method[2]);
			}
		} else {
			if (isset($this->method[1])) {
				if (method_exists($controller, $this->method[1])) {
					$controller->{$this->method[1]}();
				} else {
					$this->error();
				}
			} else {
				$controller->index();
			}
		}
	}
}