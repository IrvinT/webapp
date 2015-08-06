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

        $this->render->set('app.base_uri', 'app/');
        $this->render->set('app.bower_uri', 'bower_components/');

        $this->render->view()->assign(array(
            'path' => $this->render->get('app.base_uri'),
            'bower_uri' => $this->render->get('app.bower_uri')
        ));
    }

    public function home()
    {
        $this->render->view()->display('layout.tpl');
    }
}