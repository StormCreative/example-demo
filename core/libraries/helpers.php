<?php

class helpers
{
    /*
    * Converts string into a friendly URL string
    *
    * @param $string
    * @return the friendly URL
    */
    public function friendly_url($string)
    {
        $string = preg_replace( "`\[.*\]`U", "", $string );
        $string = preg_replace( '`&(amp;)?#?[a-z0-9]+;`i', '-', $string );
        $string = htmlentities( $string, ENT_COMPAT, 'utf-8' );
        $string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i", "\\1", $string );
        $string = preg_replace( array( "`[^a-z0-9]`i","`[-]+`") , "-", $string );

        return strtolower( trim( $string, '-' ) );
    }

    public static function mailer(array $config, $data)
    {
        if (!!$_POST) {
            $mail = new Mail($config['template'], $data);
            $mail->to = $config['to'];
            $mail->from = $config['from'];
            $mail->subject = $config['subject'];

            $mail->send();
        }
    }

    public static function admin_auth()
    {
        if (!User_Authorizor::authorize()) {
            header('location: '.DIRECTORY.'admin');
        }
    }

}