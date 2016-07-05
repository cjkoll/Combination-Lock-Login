<?php

/*
 *  Copyright 2016 Chris Koll Tampa Bay Web Design (info@tampabay-webdesign.com).
 *  All rights reserved.
 *  Redistribution and use in source and binary forms, with or without
 *  modification, are permitted provided that the following conditions are met:
 *  Redistributions of source code must retain the above copyright notice, this
 *  list of conditions and the following disclaimer.
 *  Redistributions in binary form must reproduce the above copyright notice,
 *  this list of conditions and the following disclaimer in the documentation
 *  and/or other materials provided with the distribution.
 *  
 *  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 *  AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 *  IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 *  ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 *  LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 *  CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 *  SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 *  INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 *  CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 *  ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 *  POSSIBILITY OF SUCH DAMAGE.
 *  
 */

class Session {

    function __construct() {
        session_start();
        $this->check_login();
        if ($this->logged_in) {
            $_SESSION['logged_in'] = $_SESSION['combo'] . $_SESSION['username'] . $_SESSION['password'];
        } else {
            unset($_SESSION['logged_in']);
        }
    }

    public $combo_in = false;
    public $username_in = false;
    public $password_in = false;
    public $loged_in = false;

    public function ComboIn($combo) {
        if ($combo) {
            $this->combo = $_SESSION['combo'] = $combo->combo;
            $this->combo_in = true;
        }
    }

    public function ComboOut() {
        unset($_SESSION['combo']);
        $this->combo_in = false;
    }

    public function UsernameIn($username) {
        if ($username) {
            $this->username = $_SESSION['username'] = $username->username;
            $this->combo_in = true;
            $this->username_in = true;
        }
    }

    public function UsernameOut() {
        unset($_SESSION['username']);
        $this->username_in = false;
    }

    public function PasswordIn($password) {
        if ($password) {
            $this->password = $_SESSION['password'] = $password->password;
            $this->combo_in = true;
            $this->username_in = true;
            $this->password_in = true;
        }
    }

    public function PasswordOut() {
        unset($_SESSION['password']);
        $this->password_in = false;
    }

    public function LogedIn() {
        if ($_SESSION['combo'] == true && $_SESSION['username'] == true && $_SESSION['password'] == true) {
            $this->loged_in = true;
        }
    }

    private function check_login() {
        if (isset($_SESSION['combo']) && isset($_SESSION['username']) && isset($_SESSION['password'])) {
            $this->combo = $_SESSION['combo'];
            $this->username = $_SESSION['username'];
            $this->password = $_SESSION['password'];
            $this->logged_in = true;
        } else {
            unset($this->combo);
            unset($this->username);
            unset($this->password);
            $this->logged_in = false;
        }
    }

}

$session = new Session();
