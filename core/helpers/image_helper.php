<?php

class Image_helper
{
    /**
     * Method to save one image into the database and return the ID of the saved row
     *
     * @param string $imagename default NULL
     *
     * @return int $id
     *
     * @access static public
     */
    public static function save_one($imagename = "")
    {
        $image = new Image_model();

        if (!!$_POST[ 'normal_uploader' ] && !$imagename) {
            $uploader = new Ajax_uploadify ( FALSE, TRUE );
            $imagename = $uploader->get_name ();
        }

        if ( !!$imagename )
            $image->save ( array ( 'imgname' => $imagename ) );

        return $image->attributes[ 'id' ];
    }

    /**
     * Method to save more than one image
     * Loops through each image to save them, then added the ID to a array
     * This needs to be called with self::multi_image_move otherwise the database rows will not have images associated with them
     *
     * @param array $images
     *
     * @return array $ids
     *
     * @access static public
     */
    public static function save_many($images)
    {
        $ids = array();

        foreach ($images as $image) {

            if (!!$image[ 'imgname' ]) {
                $image_model = new image_model();
                $image_model->save( array( 'imgname' => $image[ 'imgname' ] ) );
                $ids[] = $image_model->attributes[ 'id' ];
            }
        }

        return $ids;
    }

    /**
     * Method to move multiple images to our server
     * Uses the exact same process as a single image but needs to remove the first element of the array so we dont get duplicates,
     * then re arrange the array so we can loop through and save each image
     *
     * @param array $files
     *
     * @access static public
     */
    public static function multi_image_move()
    {
        $n = count( $_FILES[ 'images' ][ 'name' ] );

        for ($i = 0; $i < $n; $i++) {
            $uploader = new AJAX_uploadify( FALSE );
            $_POST['multi-image'][] = array( 'imgname' => $uploader->get_name() );

            unset( $_FILES[ 'images' ][ 'name' ][ 0 ] );
            unset( $_FILES[ 'images' ][ 'type' ][ 0 ] );
            unset( $_FILES[ 'images' ][ 'tmp_name' ][ 0 ] );
            unset( $_FILES[ 'images' ][ 'error' ][ 0 ] );
            unset( $_FILES[ 'images' ][ 'size' ][ 0 ] );

            $_FILES[ 'images' ][ 'name' ] = array_values( $_FILES[ 'images' ][ 'name' ] );
            $_FILES[ 'images' ][ 'type' ] = array_values( $_FILES[ 'images' ][ 'type' ] );
            $_FILES[ 'images' ][ 'tmp_name' ] = array_values( $_FILES[ 'images' ][ 'tmp_name' ] );
            $_FILES[ 'images' ][ 'error' ] = array_values( $_FILES[ 'images' ][ 'error' ] );
            $_FILES[ 'images' ][ 'size' ] = array_values( $_FILES[ 'images' ][ 'size' ] );
        }
    }
}
