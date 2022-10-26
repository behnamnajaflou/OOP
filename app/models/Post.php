<?php
class Post extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        $this->db->query('SELECT *, 
                            posts.id AS postId, users.id AS userId ,
                            posts.create_at AS postCreate_at, users.create_at AS userCreate_at 
                            FROM posts
                            INNER JOIN users ON posts.user_id = users.id
                            ORDER BY posts.create_at DESc 
                            ');

        $result = $this->db->resultSet();

        return $result;
    }

    public function addPost($data)
    {

        $this->db->query('INSERT INTO posts (title, user_id, body, tags) VALUES(:title, :user_id, :body, :tags)');
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':tags', $data['tags']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
