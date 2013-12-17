<?php

$I = new WebGuy($scenario);
$I->wantTo('Test the pages edit page');
$I->amOnPage('admin/pages/edit');

/** First check form cannot be sent if the user doesnt input any values **/
$I->amGoingTo('Submit user form with invalid values');
$I->click('Save');

$I->see("Title can not be empty");
            $I->see("Content can not be empty");
            $I->see("Upload can not be empty");
            

$I->amGoingTo("Submit pages form without a title");
                                        $I->click("Save");
                                        $I->fillField ( "pages[content]", "Acceptance Test" );
                        $I->fillField ( "pages[upload]", "Acceptance Test" );
                        $I->amGoingTo("Submit pages form without a content");
                                        $I->click("Save");
                                        $I->fillField ( "pages[title]", "Acceptance Test" );
                        $I->fillField ( "pages[upload]", "Acceptance Test" );
                        $I->amGoingTo("Submit pages form without a upload");
                                        $I->click("Save");
                                        $I->fillField ( "pages[title]", "Acceptance Test" );
                        $I->fillField ( "pages[content]", "Acceptance Test" );
                        

?>