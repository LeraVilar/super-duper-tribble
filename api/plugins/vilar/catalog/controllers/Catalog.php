<?php namespace Vilar\Catalog\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Catalog extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Vilar.Catalog', 'main-menu-item');
    }
}
