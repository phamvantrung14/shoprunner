<?php
$code = isset($code) ? $code : 404;
$title = isset($title) ? $title : "Not Founr";
$message = isset($message) ? $message : "Page Not Found";
?>

<h1>{{$code}}, {{$title}} ,{{$message}}</h1>
