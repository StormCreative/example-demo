<?php

include 'base_admin.php';

class B_mod extends Base_admin
{
    public $_name;
    private $_model;
    private $_fields;
    private $_table_exists;

    public function get_name ()
    {
        display( "Model Name: " );
        $this->_name = get_input();
    }

    public function form ()
    {
        $this->_model = '<?php

class ' . $this->_name . '_model extends Activerecord
{
    public function __Construct()
    {
        parent::__Construct ();

        //Set the validation from the fields, at the moment they will all be not_empty so we have something to test
        $this->validates = array();
        $this->has_many = array();
        $this->has_one = "";
    }
}';
    }

    public function save ()
    {
        mkdir( PATH . 'app/models/' . $this->_name . '/' );

        if( file_put_contents( PATH . 'app/models/' . $this->_name . '/' . $this->_name . '_model.php', $this->_model ) ) {
            display( 'Model has been created successfully!' );
        }
    }

    /**
     * Get the view fields for the edit page
     *
     * This will keep asking the user for input until the user enters 'n'
     */
    public function get_view_fields()
    {
        do {
            display ( "Enter a field: ( name:data type:max length ) \n" );
            $field = get_input ();

            if ($field != 'n') {
                $x = explode ( ":", $field );

                $this->_fields[ $x[ 0 ] ] = array( 'name' => $x[ 0 ],
                                                   'data_type' => $x[ 1 ],
                                                   'length' => $x[ 2 ] );
            }

        } while ( $field != 'n' );
    }

    /**
     * Queries the database to check if the table exists
     * Applied the result to the table_exists property
     *
     * @access public
     */
    public function check_table_exists()
    {
        $table_exists = $this->_query->getAssoc ( "SHOW TABLES LIKE '" . DB_SUFFIX . "_" . $this->_name . "'" );
        $this->_table_exists = ( !!$table_exists ? TRUE : FALSE );
    }

    /**
     * Takes the fields property and organises it into a query if the table doesnt already exist
     * If the table does already exist a warning is displayed and the script is killed
     *
     * @access public
     */
    public function form_query_create()
    {
        if( $this->_table_exists === TRUE ) {
            display( "The table '" . $this->_name . "' already exists.\n" );
        } else {
            $query = 'CREATE TABLE ' . DB_SUFFIX . '_' . $this->_name . ' (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,';

            foreach($this->_fields as $field) {
                if( $field[ 'name' ] == 'image' ) {
                    $query .= '`image_id` INT(11), ';
                }
                elseif ( $field[ 'name' ] == 'upload' ) {
                    $query .= '`uploads_id` INT(11), ';
                }
                else {
                    $query .= '`' . $field['name'] . '` ' . $field['data_type'] . '' . ( !!$field['length'] ? '(' . $field['length'] . ')' : '' ) . ',';
                }
            }

            $query .= '`create_date` TIMESTAMP )';

            if( $this->_query->plain( $query ) ) {
                display( $this->_name . " table has been created successfully\n" );
            }

            //Now we need to form the migration class
            $this->create_schema();
        }
    }

        /**
     * Method to save a migration class into the 'migrations' folder
     *
     * @access public
     */
    public function create_schema ()
    {
        //Form the schema array from the fields array because for some reason I cant just pop that into the file string
        $schema = 'array ( "id" => array( "name" => "id",
                                          "type" => "int",
                                          "limit" => "11" ),
                           "create_date" => array( "name" => "create_date",
                                                   "type" => "timestamp",
                                                   "limit" => "" ),
                  ';

        //If the user has chosen to allow images we need to add this to the schema
        if ( !!$this->_fields[ 'image' ] ) {
            $schema .= '"image_id" => array( "name" => "image_id",
                                             "type" => "int",
                                             "limit" => "11" ),';
        }

        //Same with the uploads
        if ( !!$this->_fields[ 'upload' ] ) {
            $schema .= '"uploads_id" => array( "name" => "uploads_id",
                                               "type" => "int",
                                               "limit" => "255" ),';
        }

        $i = 1;
        $count = count ( $this->_fields );

        foreach ($this->_fields as $field) {
            $comma = ( $i != $count ) ? ', ' : '';

            if ( $field[ 'name' ] != 'image' && $field[ 'name' ] != 'upload' ) {
                $schema .= '"' . $field[ 'name' ] . '" => array( "name" => "' . $field[ 'name' ] . '",
                                                                 "type" => "' . $field[ 'data_type' ] . '",
                                                                 "limit" => "' . $field[ 'length' ] . '" )' . $comma . '
                                                                 ';
            }

            $i++;
        }

        $schema .= ' )';

        /**
         * NEW
         *
         * Instead of manually triggering migrations the database will migrate on the instantiation of the model.
         * This schema will be stored inside a static method of a class that resides in the same directory as the model.
         */
        $schema_tmpl = get( PATH . "cmd/templates/schema.txt" );
        $schema_tmpl = str_replace( array( "{{CONTROLLER}}", "{{SCHEMA}}" ), array( $this->_name, $schema ), $schema_tmpl );

        if ( put( PATH . "app/models/" . $this->_name . "/" . $this->_name . "_schema.php", $schema_tmpl ) ) {
            display( "The schema has been created successfully\n" );
        }
    }
}

$mod = new B_mod();

$mod->get_name();
$mod->form();
$mod->save();
$mod->get_view_fields();
$mod->check_table_exists();
$mod->form_query_create();