<?php
header('Content-type: application/json');

$products = array(
    ['name' => 'The best bag ever (1)', 'image' => 'images (1).jpeg'],
    ['name' => 'The best bag ever (2)', 'image' => 'images (2).jpeg'],
    ['name' => 'The best bag ever (3)', 'image' => 'images (3).jpeg'],
    ['name' => 'The best bag ever (4)', 'image' => 'images (4).jpeg'],
    ['name' => 'The best bag ever (5)', 'image' => 'images (5).jpeg'],
    ['name' => 'The best bag ever (12)', 'image' => 'images (12).jpeg'],
    ['name' => 'The best bag ever (7)', 'image' => 'images (7).jpeg'],
    ['name' => 'The best bag ever (8)', 'image' => 'images (8).jpeg'],
    ['name' => 'The best bag ever (9)', 'image' => 'images (9).jpeg'],
    ['name' => 'The best bag ever (10)', 'image' => 'images (10).jpeg'],
    ['name' => 'The best bag ever (11)', 'image' => 'images (11).jpeg'],
    ['name' => 'The best bag ever (13)', 'image' => 'images (13).jpeg'],
    ['name' => 'The best bag ever (6)', 'image' => 'images (6).jpeg'],
    ['name' => 'The best bag ever (14)', 'image' => 'images (14).jpeg'],
    ['name' => 'The best bag ever (15)', 'image' => 'images (15).jpeg'],
    ['name' => 'The best bag ever (16)', 'image' => 'images (16).jpeg'],
    ['name' => 'The best bag ever (17)', 'image' => 'images (17).jpeg'],
    ['name' => 'The best bag ever (18)', 'image' => 'images (18).jpeg'],
    ['name' => 'The best bag ever (19)', 'image' => 'images (19).jpeg'],
    ['name' => 'The best bag evers.', 'image' => 'images.jpeg'],
);

echo json_encode($products);
