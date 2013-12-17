<?php

class pages_schema
{
	public static function get_schema()
	{
		return array ( "id" => array( "name" => "id",
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
	}
}


?>