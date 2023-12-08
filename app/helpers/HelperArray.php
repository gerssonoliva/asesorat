<?php

class HelperArray{

  /**
   * arr[ array data]
   * num[ number of items a extract of arr]
   */
  public static function array_random_assoc($arr, $num = 1) {
    $keys = array_keys($arr);
    shuffle($keys);

    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[$keys[$i]] = $arr[$keys[$i]];
    }
    return $r;
  }

  /**
   * convert array to object
   */
  public static function arrayToObject($arr) {
    $data = json_decode(json_encode($arr));
    return $data;
  }

  /**
   * convert object to array
   */
  public static function objectToArray($arr) {
    $data = json_decode(json_encode($arr), true); //Turn it into an array
    return $data;
  }

  /**
   * desordenar un array
   * Shuffle associative and non-associative array while preserving key, value pairs.
   *** Also returns the shuffled array instead of shuffling it in place.
   */
  function shuffleAssoc($list) {
    if (!is_array($list)) return $list;

    $keys = array_keys($list);
    shuffle($keys);
    $random = array();
    foreach ($keys as $key)
      $random[$key] = $list[$key];

    return $random;
  }



}
