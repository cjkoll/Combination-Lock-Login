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
?>
<div class="combo-box">
    <div class="combo">
        <?php
        echo $message;
        if (!isset($_POST['login_btn'])) {
            ?>
            <form method="post" action="">
                <div class="form-group">
                    <input type="password" autofocus="true"  name="password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="login_btn" class="btn btn-primary btn-block" value="Password">
                </div>
            </form>
        <?php } ?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <?php
            if (DEMO_MODE === true) {
                ?>
                <pre style="text-align: center; font-size: 16px;">Hint: Password = demo</pre>
                <?php
            }
            ?>
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>
