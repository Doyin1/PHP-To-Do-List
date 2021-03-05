<?php

if(isset($_POST['title']))
{
    require '../includes/conn.php';
    include 'func.php';

    $title = $_POST['title'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $dateMonth;
    $futureDate;
  
    if( (!empty($title)) &&  (empty($month)) && (empty($year)) )
    { //need to filter 0 so its registered as not empty
        $title = validTitle($title);

        $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
        $res = $stmt->execute([$title]); 

        if($res)
        {
            header("Location: ../index.php");
        }
        else
        {           
            header("Location: ../index.php?mess=error");
        }
        $conn= null;
        exit();

    }
    else if( (!empty($title)) && (!empty($month)) && (empty($year)) )
    {
        $title = validTitle($title);
        $month = validMonth($month);
        $dateMonth = dateMonth($month);
        $year = date("Y");

        $futureDate = futureDate($dateMonth, $year);
          
        $stmt = $conn->prepare("INSERT INTO todos (title, future_datetime) VALUES (?,?)");
        $res = $stmt->execute([$title ,$futureDate]); 

        if($res)
        {
            header("Location: ../index.php");
        }
        else
        {           
           header("Location: ../index.php?mess=error");
        }
        $conn= null;
        exit();
    }  
    else if( (!empty($title)) && (!empty($month)) && (!(empty($year))))
    {
        $title = validTitle($title);
        $month = validMonth($month);
        $dateMonth = dateMonth($month);
        $year = validYear($year);

        $futureDate = futureDate($dateMonth, $year);
          
        $stmt = $conn->prepare("INSERT INTO todos (title, future_datetime) VALUES (?,?)");
        $res = $stmt->execute([$title ,$futureDate]); 

        if($res)
        {
            header("Location: ../index.php");
        }
        else
        {           
           header("Location: ../index.php?mess=error");
        }
        $conn= null;
        exit();
    }     
    else 
    {
        header("Location: ../index.php?mess=error");
    }
}
else
{
    header("Location: ../index.php?mess=error");
}




?>
