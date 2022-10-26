<?php

class Posts extends Controller
{
    public function __construct()
    {
        if (!isLogedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'tags' => trim($_POST['tags']),
                'user_id' => trim($_SESSION['user_id']),
                'title_err' => '',
                'body_err' => '',
                'tags_err' => ''
            ];

            if (empty($data['title'])) {
                $data['title_err'] = 'Fill the Title box';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'Fill the Body box';
            }
            if (empty($data['tags'])) {
                $data['tags_err'] = 'Fill the Tags box';
            }

            if (empty($data['title_err']) && empty($data['body_err']) && empty($data['tags_err'])) {
                if ($this->postModel->addPost($data)) {
                    flash('post_added', 'Post added successfuly');
                    redirect('posts');
                } else {
                    die('There is an error');
                }
            } else {
                //view error
                $this->view('posts/add', $data);
            }
        } else {
            $data = [
                'title' => '',
                'body' => '',
                'tags' => ''
            ];
            $this->view('posts/add', $data);
        }
    }
}
