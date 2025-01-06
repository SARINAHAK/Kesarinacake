<?php
$reviews = [];
if (file_exists('reviews.json')) {
    $reviews = json_decode(file_get_contents('reviews.json'), true);
}
?>