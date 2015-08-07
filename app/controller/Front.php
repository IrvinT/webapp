<?php

namespace app\Controller;

use app\Engine;
use app\Db;

class Front {

	protected $render;

    protected $request;

    protected $db;

    private $error = null;

    private $confirmation = null;

    private $information = null;

    public function __construct()
    {
        $this->render = new Engine();
        $this->db = new Db();

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
            'bower_uri' => $this->render->get('app.bower_uri'),
            'session' => $_SESSION
        ));
    }

    public function deconnexion()
    {
        unset($_SESSION['pseudo']);
        $this->render->redirect('/');
    }

    public function home()
    {
        $data = $this->request->data;

        if(empty($data->pseudo))
        {
            if(isset($data->connexion) || isset($data->inscription)){
                $this->error = "Veuillez renseigner votre pseudo";
            }
        }
        else
        {
            if(isset($this->request->data->connexion))
            {
                if(!$this->db->isUserExist($data->pseudo)){
                    $this->error = "Aucun utilisateur enregistré avec ce nom";
                }else{
                    $this->information = "Vous êtes à présent connecté " . $data->pseudo;
                    $_SESSION['pseudo'] = $data->pseudo;
                }
            }else if(isset($this->request->data->inscription))
            {
                if($this->db->isUserExist($data->pseudo)){
                    $this->error = "Un utilisateur existe déjà avec ce pseudo";
                }else{
                    $this->db->addUser($data->pseudo);
                    $this->confirmation = "Votre compte a bien été enregistré";
                    $this->information = "Vous êtes à présent connecté " . $data->pseudo;
                    $_SESSION['pseudo'] = $data->pseudo;
                }
            }
        }

        if(isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])){
            $this->render->view()->assign(array(
                'tasks' => $this->db->getTasks($_SESSION['pseudo'])
            ));
        }

        $this->render->view()->assign(array(
            'error' => $this->error,
            'confirmation' => $this->confirmation,
            'information' => $this->information,
            'session' => $_SESSION
        ));

        $this->render->view()->display('layout.tpl');
    }

    public function addTask(){
        if($this->request->ajax){
            echo $this->db->addTask($_POST['pseudo'], $_POST['task']);
        }
    }

    public function removeTask(){
        if($this->request->ajax){
            $this->db->removeTask($_POST['id']);
        }
    }

    public function addCategories()
    {

    }

    public function addSubCategories()
    {

    }
}