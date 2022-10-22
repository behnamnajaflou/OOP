<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('post');
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome',
            'post' => 'Welcome Welcome Welcome Welcome to my site',
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'post' => 'Welcome Welcome Welcome Welcome to my site',
        ];
        $this->view('pages/about', $data);
    }
}
