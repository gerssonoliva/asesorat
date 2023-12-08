<?php
class BuilderQueries
{

  public $bindings = [
    'select' => [],
    'from'   => [],
    'join'   => [],
    'where'  => [],
    'having' => [],
    'order'  => [],
    'union'  => [],
  ];


    /**
     * The columns that should be returned.
     *
     * @var array
     */
    public $columns;

    /**
     * Indicates if the query returns distinct results.
     *
     * @var bool
     */
    public $distinct = false;

    /**
     * The table which the query is targeting.
     *
     * @var string
     */
    public $from;




      /**
     * Set the columns to be selected.
     *
     * @param  array|mixed  $columns
     * @return $this
     */
    public function select($columns = ['*'])
    {
        $this->columns = is_array($columns) ? $columns : func_get_args();

        return $this->columns;
    }

    /**
     * Execute a query for a single record by ID.
     *
     * @param  int    $id
     * @param  array  $columns
     * @return mixed|static
     */
    public function find($id, $columns = ['*'])
    {
        return $this->where('id', '=', $id)->first($columns);
    }


    public function columnize(array $columns)
    {
        return implode(', ',  $columns);
    }


}