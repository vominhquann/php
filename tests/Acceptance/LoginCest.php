<?php


namespace Tests\Acceptance;

use Tests\Support\Page\Acceptance\LoginPage;
use Tests\Support\Step\Acceptance\LoginStep;

class LoginCest
{
    public function show_home_page_when_data_login_successfully(LoginStep $loginStep, LoginPage $loginPage)
    {
        $loginStep->login('hangtt@gmail.com', '123456789');
        $loginPage->checkRememberMe()->clickLoginButton();
        $loginStep->retrySee('Dashboard');
    }

    public function show_error_message_when_data_login_blank(LoginStep $loginStep, LoginPage $loginPage)
    {
        $loginStep->login('', '');
        $loginPage->clickLoginButton();
        $loginStep->retrySee('Login');
    }

    public function show_error_message_when_data_email_blank(LoginStep $loginStep, LoginPage $loginPage)
    {
        $loginStep->login('', '123456789');
        $loginPage->clickLoginButton();
        $loginStep->retrySee('Login');
    }

    public function show_error_message_when_data_email_error(LoginStep $loginStep, LoginPage $loginPage)
    {
        $loginStep->login('hangttgmail.com', '123456789');
        $loginPage->clickLoginButton();
        $loginStep->retrySee('Login');
    }

    public function show_error_message_when_data_password_blank(LoginStep $loginStep, LoginPage $loginPage)
    {
        $loginStep->login('hangtt@gmail.com', '');
        $loginPage->clickLoginButton();
        $loginStep->retrySee('Login');
    }

    public function show_error_message_when_data_password_error(LoginStep $loginStep, LoginPage $loginPage)
    {
        $loginStep->login('hangtt@gmail.com', '00000000');
        $loginPage->clickLoginButton();
        $loginStep->retrySee('These credentials do not match our records.');
    }
}


?>