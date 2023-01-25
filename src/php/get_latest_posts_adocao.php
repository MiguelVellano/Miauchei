<?php

include('connection.php');


if( isset($_GET['page_no']) && $_GET['page_no'] != ""){
    $page_no = $_GET['page_no'];
}else{
    $page_no = 1;
}


$stmt = $conn->prepare("SELECT COUNT(*) as total_posts FROM posts_animais_adocao");
$stmt->execute();
$stmt->bind_result($total_posts);
$stmt->store_result();
$stmt->fetch();


$total_posts_per_page = 100;

$offset = ($page_no-1) * $total_posts_per_page;

$total_no_of_pages = ceil($total_posts/$total_posts_per_page); 

$stmt = $conn->prepare("SELECT * FROM posts_animais_adocao ORDER BY id DESC LIMIT $offset,$total_posts_per_page "); 
$stmt->execute();
$posts = $stmt->get_result();


?>