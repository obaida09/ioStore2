<?php 

// 	function Obaida_strlen($string) {
//   	for ($i=0; true; $i++) {
//   	  if(!isset($string[$i])) {
//         break;
//   	  }
//   	}
// 	  return $i;
// 	}
	
// // 	echo Obaida_strlen('obaida');
	
// 	function Obaida_count($array) {
//   	for ($i=0; true; $i++) {
  	  
//   	  if(!isset($array[$i])) {
//         break;
//   	  }
//   	}
// 	  return $i;
// 	}
	
// // 	echo Obaida_count(array('lastname', 'email', 'phone', 'af'));
	

	
// 	$name = 'obaida Mohammed Ibrahim aj';
	
// 	print_r(explode(' ', $name));
	
// 	// function obaida_explode($sparetor, $string) {
	  
	  
// 	//   $result = [];
// 	//   $x = 0;
	  
//   	// for ($i=0; $i < Obaida_strlen($string); $i++) {
  	  
//   	//   if ($sparetor == null) {
  	    
//   	//     $result[] = $string[$i];
  	    
//   	//   } else {
  	    
//     // 	  if($string[$i] == $sparetor) {
//     //       $x++;
//     //       $i++;
//   	//     }
  	    
//   	//     $result[$x] .= $string[$i];
//   	//   }
  	  

//   	// }
// 	//   print_r($result);
// 	// }
	
// 	// echo obaida_explode(' ' ,'obaida Mohammed Ibrahim aj');
	
	
	
	
	
// 	$array = array('lastname', 'email', 'phone');
//   // echo $comma_separated = implode(" ", $array);
  
  
//   function obaida_implode($sparetor, $array) {
    
//     $result;
    
//     for ($i=0; $i < Obaida_count($array); $i++) {
     
//       $result .= $array[$i] . $sparetor;
      
//     }
//     return $result;
//   }
	
	
// 	echo obaida_implode(" ", $array);







function partsSums($ls) {

    $count = count($ls);
    $result = [];

    foreach ($ls as  $value) {
        $result[] = array_sum($ls);
        array_shift($ls);
    }

    // for ($i=0; $i < $count; $i++) { 

    //     $result[] = array_sum($ls);
    //     array_shift($ls);

    // }
    $result[] = 0;
    print_r($result);
}

echo partsSums([0, 1, 3, 6, 10]);




echo 'hello world' . '<br>';


function obadia_strlen($str){
    for($i = 0 ; $i < 10; $i++){
        if($str[$i] !== ) {
            echo $str[$i];
        }
    }
}

obadia_strlen('obaida');

function toCamelCase($str){
    // for($i = 0 ; $i < )
}


echo toCamelCase("the_stealth_warrior");