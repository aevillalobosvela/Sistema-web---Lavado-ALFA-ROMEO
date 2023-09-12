<?php
    class Home extends Controller
    {
        protected $views, $model;
        public function index()
        {
            $this->views->getView($this, "index");
        }
    }
?>