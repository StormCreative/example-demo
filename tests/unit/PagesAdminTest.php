<?php
use Codeception\Util\Stub;

class pagesAdminTest extends \Codeception\TestCase\Test
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    /**
     * @var the model object
     */
    private $_model;

    /**
     * @var some mock data
     */
    private $_data = array ( "pages" => array ( "title" => "Unit Test Data", "content" => "Unit Test Data", "upload" => "Unit Test Data" ) );

    protected function _before()
    {
        $this->_model = new pages_model();
    }

    protected function _after() {}

    public function testInstantiation ()
    {
        $this->assertInstanceOf ( 'pages_model', $this->_model );
    }

    public function testSaveWithoutTitle() {
                unset ( $this->_data[ "pages" ][ "title" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "pages" ] ) );
           }

           public function testSaveWithoutContent() {
                unset ( $this->_data[ "pages" ][ "content" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "pages" ] ) );
           }

           public function testSaveWithoutUpload() {
                unset ( $this->_data[ "pages" ][ "upload" ] );
                $this->assertFalse( $this->_model->save ( $this->_data[ "pages" ] ) );
           }

           

    public function testSaveSuccessful ()
    {
        $this->assertTrue ( $this->_model->save ( $this->_data[ 'pages' ] ) );
    }
}

?>