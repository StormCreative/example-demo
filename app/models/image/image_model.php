<?php

class image_model extends activerecord
{
    public function __Construct()
    {
        parent::__Construct ();

        //Set the validation from the fields, at the moment they will all be not_empty so we have something to test
        $this->validates = array();
        $this->has_many = array();
        $this->has_one = "";
    }

    public static function save_multi( $images = array(), $post_id = '' )
    {
    	foreach( $images as $image ) {
    		$image_model = new Image_model();
    		$image_model->save( array( 'imgname' => $image[ 'imgname' ], 'news_id' => $post_id ) );
    	}
    }

    public function get_multiple_images($images)
    {
        $image_model = new Image_model();
        
        $image_names = array();

        $images = explode(',', $images);

        foreach ($images as $image) {
            $image_names[] = $image_model->get_image_info($image);
        }

        return $image_names;
    }

    public function get_image_info($id)
    {
        $this->find($id);

        return $this->imgname;
    }
}
