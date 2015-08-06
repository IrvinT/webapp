<?php

namespace app\Controller;

use app\Engine;

class Front {

	protected $render;

    public function __construct()
    {
    	$this->render = new Engine();

    	$this->render->register('view', 'Smarty', array(), function($smarty){
			$smarty->template_dir = 'app/views/';
			$smarty->compile_dir = 'app/tmp/';
			$smarty->config_dir = 'app/config/';
			$smarty->cache_dir = 'app/cache/';
		});

        $this->render->view()->assign(array(
            'path' => _BASE_URI_,
        ));
    }

    public function home($params)
    {
    	$this->render->view()->display('layout.tpl');
    }
}
?>