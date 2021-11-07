<?php

$units=151;

$bill=null;

if($units <= 50)
{

    $bill=  $units * 3.5; 
   
  
    echo 'electricity bill is : '.$bill.' $';

}
elseif(($units > 50 )  && ($units <= 150) )
{

    $frist_50= 50*3.5; 

    $remain =$units -50 ;

    $bill=  $remain * 4 +  $frist_50;
    
    
    echo 'electricity bill is : '.$bill .' $';
}
elseif(  $units > 150)
{

    $frist_50= 50*3.5;

    $remain =$units -150 ;
   
    $bill=  $remain * 6.5 +  $frist_50 + 400;
      
     
    echo 'electricity bill is : '.$bill.' $';

}
else
{
  echo 'error';
}



?>