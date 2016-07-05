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

define('DEBUG_MODE', true);
if (DEBUG_MODE == true) {
    ini_set('display_errors', 1);
    ini_set('log_errors', 0);
    error_reporting(E_ALL);
}
if (DEBUG_MODE == false) {
    error_reporting(0);
    ini_set('log_errors', 0);
}
define('DEMO_MODE', true);
date_default_timezone_set('America/New_York');
define('DS', DIRECTORY_SEPARATOR);
define('SYSTEM_PATH', $_SERVER['DOCUMENT_ROOT']);
define('PHP_SELF', $_SERVER['PHP_SELF']);
define('REQUEST_URI', $_SERVER['REQUEST_URI']);
define('SERVER_PORT', $_SERVER['SERVER_PORT']);
if (SERVER_PORT == '80') {
    define('SERVER_PRE', 'http://');
} elseif (SERVER_PORT == '443') {
    define('SERVER_PRE', 'https://');
}
define('SITE_BASE', SERVER_PRE . $_SERVER['HTTP_HOST'] . DS);
define('INCLUDES_PATH', SYSTEM_PATH . DS . 'includes' . DS);
define('PAGE_FUNCTIONS_PATH', SYSTEM_PATH . DS . 'page-functions' . DS);
define('CLASS_PATH', INCLUDES_PATH . 'class' . DS);
define('FUNCTIONS_PATH', INCLUDES_PATH . 'functions' . DS);
define('CONFIG_PATH', INCLUDES_PATH . 'config' . DS);
define('LAYOUT_PATH', SYSTEM_PATH . DS . 'layout' . DS);
define('PRIVATE_PATH', INCLUDES_PATH . DS . 'private' . DS);
define('PUBLIC_PATH', INCLUDES_PATH . DS . 'public' . DS);
require_once FUNCTIONS_PATH . 'inc-page.php';
define("DATE_FORMAT", "d/m/Y");
define("USER_TABLE", DB_PREFIX . '');
if (REQUEST_URI == '/') {
    $page_Request = 'index.php';
} elseif (REQUEST_URI == '/index.php') {
    $page_Request = 'index.php';
} else {
    $page_Request_substr = substr(REQUEST_URI, 1, 255);
    $page_Request = str_replace('/', '.php', $page_Request_substr);
}
if (file_exists(PAGE_FUNCTIONS_PATH . $page_Request)) {
    require_once PAGE_FUNCTIONS_PATH . $page_Request;
}