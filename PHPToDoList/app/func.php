<?php
function validTitle($title){
    $title = filter_var($title, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    //remove html code tooo!
    $title = trim($title);

    return $title;
}

function validMonth($month)
{    
   if(filter_var($month, FILTER_VALIDATE_INT))
    {
        if(($month > 0) && ($month < 13))
        {
            return $month;
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

}

function dateMonth($month)
{
    //month and max days in month
    $month_arr = array(
        array("01","31"),
        array("02","28"),
        array("03","31"),
        array("04","30"),
        array("05","31"),
        array("06","30"),
        array("07","31"),
        array("08","31"),
        array("09","30"),
        array("10","31"),
        array("11","30"),
        array("12","31")
    );

    for ($i = 1; $i < (count($month_arr) + 1); $i++) 
    { 
        if($month == $i)
        {
            --$i; 
            $j = $i;
            $dateMonth = implode($month_arr[$i]);
            return $dateMonth;
        }
    }
}

function validYear($year)
{
    $yr = date("Y");
    $yrLimit = $yr + 31;

    if(filter_var($year, FILTER_VALIDATE_INT))
    {
        if(($year >= $yr) && ($year < $yrLimit))
        {
            return $year;
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
}

function futureDate($month, $year)
{

    $date = $year.$month;
    $yr_month_day = date('Y-m-d', strtotime($date));
    $date = $yr_month_day;

    return $date;
}
?>