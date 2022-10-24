<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome to Home',
            'description' => 'VATICAN CITY (Reuters) - President French Emmanuel Macron and Pope Francis had nearly an hour of private talks, likely focusing on the war in Ukraine and the countrys prospects for peace.'
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'About us, we are the biggest co that you have seen - President French Emmanuel Macron and Pope Francis had nearly an hour of private talks, likely focusing on the war in Ukraine and the countrys prospects for peace.'
        ];
        $this->view('pages/about', $data);
    }
}
