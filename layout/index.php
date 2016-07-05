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
$show_user = new Users();
$show_user->find_by_id(1);
$Decrypted_combo = CJKEncrypt::unlock($show_user->combo);
$Decrypted_username = CJKEncrypt::unlock($show_user->username);
$Decrypted_password = CJKEncrypt::unlock($show_user->password);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert"> <strong>Well done!</strong> You successfully logged in in to the system. </div>
            <div class="alert alert-info" role="alert"> <strong>Heads up!</strong> Using special data encryption and decryption the user info is protected see below. </div>
            <div class="pull-right"> <a href="<?php echo $logout ?>" class="btn btn-primary">Logout</a></div>
            <h2>Decrypted Values</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Combo</th>
                        <th>Username</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $show_user->id; ?></td>
                        <td><?php echo $Decrypted_combo; ?></td>
                        <td><?php echo $Decrypted_username; ?></td>
                        <td><?php echo $Decrypted_password; ?></td>
                    </tr>
                </tbody>
            </table>
            <h2>Encrypted Values</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Combo</th>
                        <th>Username</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $show_user->id; ?></td>
                        <td><?php echo $show_user->combo; ?></td>
                        <td><?php echo $show_user->username; ?></td>
                        <td><?php echo $show_user->password; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>