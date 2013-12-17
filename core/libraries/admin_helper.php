<?php

class admin_helper
{
    public function get_images( $data )
    {
        $images = array();

        foreach ( explode ( ',', $data ) as $image ) {
            $image_model = new image_model();
            $image_model->find( $image );

            unset( $image_model->attributes[ 'validates' ] );

            $images[] = $image_model->attributes;
        }

        return array_filter( $images );
    }
}
