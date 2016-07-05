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

$location = SITE_BASE . 'combo/';
$LIlocation = SITE_BASE;
$message = '<div class="code" style="color: #00C817;">SECURE</div>' . "\n";
if (empty($_SESSION['combo']) && empty($_SESSION['username'])) {
    redirect_to($location);
}
if (isset($_POST['login_btn'])) {
    $password = $_POST['password'];
    SQLClean($password);
    $found_password = new Users();
    $found_password->AuthenticatePassword($password);
    if ($found_password->id != '') {
        $session->PasswordIn($found_password);
        $message = '<div class="code" style="color: #00C817;">UNLOCKED</div>' . "\n";
        redirect_wait($LIlocation);
    } else {
        $message = '<div class="code" style="color: #F90602;">ERROR</div>' . "\n";
        unset($_SESSION['combo']);
        unset($_SESSION['username']);
        redirect_wait($location);
    }
} else {
    $password = "";
}