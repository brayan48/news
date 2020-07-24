<?php
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'noticias';
// Table's primary key
$primaryKey = 'not_clave_int';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes + the primary key column for the id
$columns = array(
    array(
        'db' => 'not_clave_int',
        'dt' => 'DT_RowId','field' => 'not_clave_int',
        'formatter' => function( $d, $row ) {
            // Technically a DOM id cannot start with an integer, so we prefix
            // a string. This can also be useful if you have multiple tables
            // to ensure that the id is unique with a different prefix
            return 'row_'.$d;
        }
    ),
    array( 'db' => 'not_clave_int', 'dt' => '0', 'field' => 'not_clave_int' ),
    array( 'db' => 'not_titulo',  'dt' => '1', 'field' => 'not_titulo' ),
    array( 'db' => 'not_imagen', 'dt' => '2', 'field' => 'not_imagen', 'formatter' => function($d, $row){
        return '<img src="'.$d.'?'.time().'" style="width: 60px;height: 60px"></div>';
    }),
    array( 'db' => 'not_texto',  'dt' => '3', 'field' => 'not_texto' ),
    array( 'db' => 'not_palabras',  'dt' => '4', 'field' => 'not_palabras' )
);
 
// SQL server connection information
/*$sql_details = array(
    'user' => 'usrpavas',
    'pass' => '9A12)WHFy$2%',
    'db'   => 'bdservicio',
    'host' => 'localhost'
);*/

$sql_details = array(
    'user' => '',
    'pass' => '',
    'db'   => '',
    'host' => ''
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
$joinQuery = ' FROM noticias';
$extraWhere = "";
$groupBy ="";
require( '../../../db/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy )
);

?>