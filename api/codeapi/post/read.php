<?php

header('Access-Control-Allow-Origin: *');
header('Contentt-Type: application/json');

include_once '../../includes/Database.php';
include_once '../../models/Post.php';

// instantiate DB & connect
$database = new Database();
$db = $database->connect();

// instantiate blog post object
$post = new Post($db);

// blog post query
$result = $post->read();
//get row count
$num = $result->rowCount();

// check if posts are present

if($num > 0) {
    // post array
    $posts_arr = array();
    $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $category_name
        );

        // push to 'data'
        array_push($posts_arr['data'], $post_item);

    }

    // turnn to JSON and output
    echo json_encode($posts_arr);


} else {
    echo json_encode(
        array('message' => 'No Posts Found')
    );
}