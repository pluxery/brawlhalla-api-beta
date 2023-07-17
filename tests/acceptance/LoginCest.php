<?php

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
    }

    // tests
    public function loginWithCorrectDataTest(AcceptanceTester $I)
    {
  
    }
}
