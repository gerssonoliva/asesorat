<?php
class HelperDate
{

    public static function timestampsBd($timestamps = true)
    {
        $created_at = null;

        if ($timestamps) {
            $created_at = date('Y-m-d H:m:s');
        }

        $created_at = !empty($created_at) ? "'" . $created_at . "'" : "NULL";

        return $created_at;

    }

    /**
     * value[number days add]
     */
    public static function dateUpDay($value)
    {
        $date = date("d-m-Y");
        $new_date = date("d-m-Y", strtotime($date . "+ $value days"));
    }

    /**
     * value[number days subtract]
     */
    public static function dateDownDay($value)
    {
        $date = date("d-m-Y");
        $new_date = date("d-m-Y", strtotime($date . "- $value days"));
    }

    /**
     * value[number days subtract]
     */
    public static function dateNowDownDay($value)
    {
        $date = date("Y-m-d");
        $new_date = date("Y-m-d", strtotime($date . "- $value days"));
        return $new_date;
    }

    /**
     * value[ dd/mm/yyyy ]
     * return [ yyyy-mm-dd ]
     */
    public static function formatDate_dd_mm_yyyy_to_DB( $value )
    {
      $value = trim($value);

      if(empty($value)) return null ;

      $exploded = explode("/", $value);

      //Reverse the order.
      $exploded = array_reverse($exploded);

      //Convert it back into a string.
      $new_format = implode("-", $exploded);

      return $new_format;

    }

    /**
     * value[ dd/mm/yyyy ]
     * return [ yyyy-mm-dd ]
     */
    public static function formatDate_DB_to_dd_mm_yyyyy( $value )
    {
      $value = trim($value);

      if(empty($value)) return null ;

      $exploded = explode("-", $value);

      //Reverse the order.
      $exploded = array_reverse($exploded);

      //Convert it back into a string.
      $new_format = implode("/", $exploded);

      return $new_format;

    }

}
