<?php require 'includes/conn.php' ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Simple To DO List to organize your day! You can even set future things you need to do by month or year!" />
    <meta name="keywords" content="to do list" />
    <meta name="author" content="Doyin Odugbesan">
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>To Do List</title> 
    <link rel="stylesheet" href="css/style.css">   

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<style>
  body{
    background: #2a4661; ;
    color: white;
  }
  label {
    font-size: 20px;
    /*font-weight: bold;*/
    margin-left: 20px;
    color: black;
  }
</style>
<body>
<a class="skip-link" href="#maincontent">Skip to main</a>
<div class="sidenav">
  <a href="index.php">Home</a>
  <a href="month.php">Monthly</a>
  <a href="year.php">Yearly</a>
</div>

  
