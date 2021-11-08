<?php


  $ASCII= ord("A");

  if($ASCII==90|| $ASCII==122)
  {
    echo" <p>the next caracter is: &#65</p>";
  }
  else{
    echo" <p>the next caracter is: &#". ++$ASCII ."</p>";
  }


?>
