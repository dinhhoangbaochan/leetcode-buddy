<?php

class Solution {

  /**
   * @param String $s
   * @return Integer
   */
  function romanToInt($s) {
      $romanNumsList = [
          'I'   =>    1,
          'V'   =>    5,
          'X'   =>    10,
          'L'   =>    50,
          'C'   =>    100,
          'D'   =>    500,
          'M'   =>    1000,
      ];
  
  
      $stringArray = str_split($s);
      $result = [];

      for ( $i = 0; $i < count($stringArray); $i++ ) {

        if ( $romanNumsList[$stringArray[$i]] < $romanNumsList[$stringArray[$i + 1]] ) {
          $quick_math = $romanNumsList[$stringArray[$i + 1]] - $romanNumsList[$stringArray[$i]];
          array_push( $result, $quick_math );
          array_splice( $stringArray, $i + 1, 1 );
        } else {
          array_push( $result, $romanNumsList[$stringArray[$i]] );
        }

      }
  
      return array_sum($result);
  }
}

$solution = new Solution();

var_dump($solution->romanToInt("XCD"));
# M => M !< C => 1000
# C => C < M => 900
# X => X < C => 90
# IV => 4
