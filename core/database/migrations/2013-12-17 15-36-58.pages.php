<?php

if ( class_exists ( "query_builder" ) != TRUE )
    include "cmd/query_builder.php";

if ( class_exists ( "base_build" ) != TRUE )
    include "cmd/base_build.php";

class build_pages extends base_build
{
    private $_builder;

    protected $_schema = array ( "id" => array( "name" => "id",
                                          "type" => "int",
                                          "limit" => "11" ),
                           "create_date" => array( "name" => "create_date",
                                                   "type" => "timestamp",
                                                   "limit" => "" ),
                           "approved" => array( "name" => "approved",
                                                "type" => "int",
                                                "limit" => "11" ),
                  "image_id" => array( "name" => "image_id",
                                             "type" => "int",
                                             "limit" => "11" ),"uploads_id" => array( "name" => "uploads_id",
                                               "type" => "int",
                                               "limit" => "255" ),"title" => array( "name" => "title",
                                                                 "type" => "varchar",
                                                                 "limit" => "255" ), 
                                                                 "content" => array( "name" => "content",
                                                                 "type" => "text",
                                                                 "limit" => "" ), 
                                                                  );

    public function __Construct ( $db_name, $tablename )
    {
        $this->_tablename = $tablename;
        $this->_db_name = $db_name;

        $this->_build = new query_builder ( $db_name, "pages" );
    }

    public function put ()
    {
        $this->_build->create_table ( "pages" );

                    $this->_build->varchar ( "title", "255" );
                    $this->_build->text ( "content" );
                    $this->_build->int ( "image_id", "11");
                    $this->_build->int ( "upoad_id", "11");
        $this->_build->timestamp ( "create_date" );
        $this->_build->run ();
    }


    /**
     * Method to decide whether to create the whole table or to send it to the method so it can be altered
     *
     * @access public
     */
    public function desc ()
    {
        $table_exists = mysql_query ( "SHOW TABLES LIKE 'example_demo_pages'" );

        if ( mysql_num_rows ( $table_exists ) == 0 )
            $this->put ();

        else
            $this->alter ();
    }
}

$build = new build_pages ( $this->_db_name, "pages" );
$build->desc ();

?>