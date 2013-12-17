<?php

class home extends C_Controller
{
    public function index()
    {
        /*
        $data_parse = new Data_parser();
        die( $data_parse->format( array( array( 'id' => 1, 'name' => 'Foo' ),
                                         array( 'id' => 2, 'name' => 'Dave' ),
                                         array( 'id' => 3, 'name' => 'Bar' ) ), '', 'json' ) );

        */
        
        
        $this->addTag ('title', 'Home');
        $this->addTag ( 'meta_keywords', 'Pegisis');
        $this->addTag ( 'meta_desc', 'Pegisis');

        $this->addStyle('layout');

        $this->setView('home/index');
    }

    public function page($id="")
    {
        $pages_model = new Pages_model();

        $pages_model->find($id);

        $this->addTag('page', $pages_model->attributes);
        
        // Whatever these SEO bits are in the database table
        $this->addTag('title', $pages_model->seo_title);
        $this->addTag( 'meta_desc', $pages_model->seo_desc);

        $this->setView('home/page');
    }
    
}
