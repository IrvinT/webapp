<?php

namespace app\Controller;

use app\Engine;

class Front {

	protected $render;

    protected $request;

    private $error = null;

    public function __construct()
    {
        $this->render = new Engine();
        $this->request = $this->render->request();

        $this->render->register('view', 'Smarty', array(), function($smarty){
            $smarty->template_dir = 'app/views/';
            $smarty->compile_dir = 'app/tmp/';
            $smarty->config_dir = 'app/config/';
            $smarty->cache_dir = 'app/cache/';
        });

        $this->render->set('app.base_uri', 'app/');
        $this->render->set('app.bower_uri', 'bower_components/');

        $this->render->view()->assign(array(
            'uri' => $this->request->url,
            'path' => $this->render->get('app.base_uri'),
            'bower_uri' => $this->render->get('app.bower_uri')
        ));
    }

    public function home()
    {
        $data = $this->request->data;

        if(isset($data->connexion) || 
            isset($data->inscription) &&
            empty($data->pseudo))
        {
            $this->error = "Veuillez renseigner votre pseudo";
        }else{
            if(isset($this->request->data->connexion))
            {
               
            }else if(isset($this->request->data->inscription))
            {

            }
        }

        $this->render->view()->assign(array(
            'error' => $this->error
        ));

        $this->render->view()->display('layout.tpl');
    }

    public function addCategories()
    {

    }

    public function addSubCategories()
    {

    }
}