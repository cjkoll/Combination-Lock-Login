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
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="combo-box">
                <div class="combo">
                    <?php
                    echo $message;
                    if (!isset($_POST['SButton'])) {
                        echo '<button class="btn btn-primary btn-lg combo-btn"' . $disabled . '>0</button>' . "\n";
                        echo '<button class="btn btn-primary btn-lg combo-btn"' . $disabled . '>1</button>' . "\n";
                        echo '<button class="btn btn-primary btn-lg combo-btn"' . $disabled . '>2</button>' . "\n";
                        echo '<button class="btn btn-primary btn-lg combo-btn"' . $disabled . '>3</button>' . "\n";
                        echo '<button class="btn btn-primary btn-lg combo-btn"' . $disabled . '>4</button>' . "\n";
                        echo '<button class="btn btn-primary btn-lg combo-btn"' . $disabled . '>5</button>' . "\n";
                        echo '<button class="btn btn-primary btn-lg combo-btn"' . $disabled . '>6</button>' . "\n";
                        echo '<button class="btn btn-primary btn-lg combo-btn"' . $disabled . '>7</button>' . "\n";
                        echo '<button class="btn btn-primary btn-lg combo-btn"' . $disabled . '>8</button>' . "\n";
                        echo '<button class="btn btn-primary btn-lg combo-btn"' . $disabled . '>9</button>' . "\n";
                        echo '<form method="post" action="">' . "\n";
                        if (!isset($_POST['combo_btn'])) {
                            echo '<input  name="combo_btn" ' . $disabled . ' type="submit" class="btn btn-primary btn-lg combo-btn" id="combo_btn" value="*"  />' . "\n";
                        }
                        if (isset($_POST['combo_btn'])) {
                            echo '<input  name="combo_btn" disabled type="submit" class="btn btn-primary btn-lg combo-btn" id="combo_btn" value="*"  />' . "\n";
                        }
                        echo '<input id="HiddenComboData" style="display:none;" name="HiddenComboData" value="" size="4" type="hidden" />' . "\n";
                        echo '</form>' . "\n";
                        echo '<form method="post" action="">' . "\n";
                        if (!isset($_POST['combo_btn'])) {
                            echo '<input name="Reset" type="submit" disabled class="btn btn-primary btn-lg combo-btn" id="SButton" value="#"  />' . "\n";
                        }
                        if (isset($_POST['combo_btn'])) {
                            echo '<input name="SButton" type="submit"  class="btn btn-primary btn-lg combo-btn" id="SButton" value="#"  />' . "\n";
                        }
                        echo '<input id="usercode" name="usercode" value="' . ((isset($_POST["HiddenComboData"])) ? $_POST["HiddenComboData"] : "") . '"   type="hidden" />' . "\n";
                        echo '<div id="log"></div>' . "\n";
                        echo '</form>' . "\n";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <?php
            if (DEMO_MODE === true) {
                if (!isset($_COOKIE['show_hint_1'])) {
                    ?>
                    <a href="/combo/?show-hint" class="btn btn-primary">Show Hint</a>
                <?php } if (isset($_COOKIE['show_hint_1'])) { ?>
                    <pre style="text-align: center; font-size: 16px;">Hint: To use this form click on 0+1+2+3+4+* wait for 1 second then click # </pre>
                    <?php
                }
            }
            ?>
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>

