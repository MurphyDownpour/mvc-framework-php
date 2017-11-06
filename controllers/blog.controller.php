<?php
    require_once ROOT.DS.'mvc'.DS.'lib'.DS.'controller.class.php';
    require_once ROOT.DS.'mvc'.DS.'models'.DS.'blog.php';
    class BlogController extends Controller
    {
        public function index()
        {
            $this->data['blog'] = $this->model->getList();
        }

        public function details()
        {
            $id = Router::getParam();
            $query = "SELECT * FROM blog WHERE id=$id";
            $result = Blog::getByQuery($query);
            $this->data['details'] = $result;
        }

        public function __construct(array $data = array())
        {
            parent::__construct($data);
            $this->model = new Blog();
        }
    }