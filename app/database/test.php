<?php

print_r(PDO::getAvailableDrivers());

function columnize(array $columns)
{
    return implode(', ',  $columns);
}

/**
     * Bind values to their parameters in the given statement.
     *
     * @param  \PDOStatement $statement
     * @param  array  $bindings
     * @return void
     */
    function bindValues($statement, $bindings)
    {
        foreach ($bindings as $key => $value) {
            $statement->bindValue(
                is_string($key) ? $key : $key + 1, $value,
                is_int($value) || is_float($value) ? PDO::PARAM_INT : PDO::PARAM_STR
            );
        }
    }

$array =
[
    'col1 as c',
    'col2',
    'col4',
    'col4',
    'col1',
] ;
var_export(columnize($array));
return ;
 $db_host   = 'localhost';
 $db_user   = 'escuelac_webuser2019';
 $db_pass   = 'appcumbre+*-2019';
 $db_name   = 'escuelac_web2019';

try {
    $mbd = new PDO('mysql:host=localhost;port=3306;dbname=escuelac_web2019', $db_user, $db_pass);
    foreach($mbd->query('SELECT * from user where email="armandoaepp@gmail.com" and password=md5("armando") ') as $fila) {
        print_r($fila);
    }
    $mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
