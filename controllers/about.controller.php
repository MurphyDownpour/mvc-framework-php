<?php
    require_once "lib/controller.class.php";
    require_once "lib/model.class.php";
    require_once "models/about.php";
    class AboutController extends Controller
    {
        public function index()
        {
            $this->data['about'] = $this->model->getList();
        }

        public function __construct(array $data = array())
        {
            parent::__construct($data);
            $this->model = new About();
        }
    }