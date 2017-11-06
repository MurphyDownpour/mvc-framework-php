<?php
    require_once 'C:\OSPanel\domains\localhost\mvc\lib\controller.class.php';
    require_once "C:\OSPanel\domains\localhost\mvc\models\home.php";
    class HomeController extends Controller
    {
        public function index()
        {
            $this->data['home'] = $this->model->getList();
        }

        public function __construct(array $data = array())
        {
            parent::__construct($data);
            $this->model = new Home();
        }
    }