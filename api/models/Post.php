<?php

class Post {
    // db stuff
    private $conn;
    private $table = 'posts';

    // post properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    // constructor with db

    public function __construct($db) {
        $this->conn = $db;
    }

    //get posts
    public function read() {
        // create querry

        $query = 'SELECT 
            C.name as category_name,
            p.id, 
            p.category_id, 
            p.title, 
            p.body, 
            p.author, 
            p.created_at
         FROM 
         ' . $this->table . ' p
         LEFT JOIN
            categories C ON p.category_id = C.id
        ORDER BY 
            p.created_at DESC';

            // prepare statement

            $stmt = $this->conn->prepare($query);

            // execute query
            $stmt->execute();

            return $stmt;
    }
}
