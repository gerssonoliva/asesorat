<?php

class HelperJson{

  /**
   * Return data in ARRAY
  */
  public static function readJsonToArray($url = '')
  {
    $data = [];
    if(!empty($url))
    {
      $json = file_get_contents($url);
      $data = json_decode($json, true); // tipo array (json_decode($json, true))
    }
    return $data;
  }

  /**
   * Return data in JSON
  */
  public static function readJsonToObject($url = '')
  {
    $data = [];
    if(!empty($url))
    {
      $json = file_get_contents($url);
      $data = json_decode($json); // tipo object (json_decode($json))
    }
    return $data;
  }

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



  /* public static function listImgByJson($url = '')
  {
    $html = '';

    if(!empty($url))
    {
      // $data = readJson("lista_img/lst-publicidad-exterior.json") ;
      $data = readJson($url) ;

      foreach ($data as $object) {

        $html .= '<div class="col-md-3">
                    <a data-fancybox="gallery" href="'.$object->url.'"  class="text-center d-inline-block no-decoration hvr-opacity-image mb-3" href="#">
                      public static <img src="./functions/resizer.php?src=../'.$object->url.'&size=255x255" class="image img-fluid w-100" alt="">
                      <span class="mt-2 d-inline-block fw-500"> '.$object->cliente.' </span>
                      <div class="middle">
                        <i class="icon-search fs-3x"></i>
                      </div>
                    </a>
                  </div>' ;

      }
    }
    print  $html ;
  }

  public static function listImgPortafolioByJson($url = '')
  {

    $html = '';

    $json1 = readJson('lista_img/lst-gigantografias.json');
    $json2 = readJson('lista_img/lst-disenio-y-publicidad.json');
    $json3 = readJson('lista_img/lst-estructuras-metalicas.json');
    $json4 = readJson('lista_img/lst-instalaciones-de-banners.json');
    $json5 = readJson('lista_img/lst-publicidad-exterior.json');
    $json6 = readJson('lista_img/lst-soporte-publicitario.json');

    $data = array_merge($json1, $json2);

    $data = array_merge($data, $json3);
    $data = array_merge($data, $json4);
    $data = array_merge($data, $json5);
    $data = array_merge($data, $json6);

    $data = json_encode($data);
    $data = json_decode($data);

      foreach ($data as $object) {

        $html .= '<div class="col-md-3 mix '.$object->class.'">
                    <a data-fancybox="gallery" href="'.$object->url.'"  class="text-center d-inline-block no-decoration hvr-opacity-image mb-3" href="#">
                      public static <img src="./functions/resizer.php?src=../'.$object->url.'&size=255x255" class="image img-fluid w-100" alt="">
                      <span class="mt-2 d-inline-block fw-500"> '.$object->cliente.' </span>
                      <div class="middle">
                        <i class="icon-search fs-3x"></i>
                      </div>
                    </a>
                  </div>' ;

      }
    print  $html ;
  } */

}
