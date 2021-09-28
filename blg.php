<?php
// echo 'here filtred blogs';
require('blogs.php');
// $today = date('Y-m-d H:i:s');
$today = '2021-09-05 14:07:49';
// var_dump('creation_date = '.$today);
//Filter By Upload date
//Filter By Popularity
//Filter By Type
$blogs = get_blogs('SELECT * FROM blogs WHERE creation_date = \''.$today.'\'');
echo '<pre>';
print_r($blogs);
echo '</pre>';