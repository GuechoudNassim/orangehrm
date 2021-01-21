<?php
$imagePath = theme_path("images/login");
echo stylesheet_tag(theme_path('css/login.css'));
$loginImage = sfConfig::get('sf_web_dir') . DIRECTORY_SEPARATOR . sfConfig::get('ohrm_resource_dir')
    . DIRECTORY_SEPARATOR . '/themes/default/images/login/login.svg';
?>


    <h3 class="text-center text-white mb-5 pt-5">Talenteo.tms</h3>
    <section class="h-100 mb-5">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">

                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-5 mt-5">Connectez-vous</h4>
                            <form id="frmLogin" method="post" action="<?php echo url_for('auth/validateCredentials'); ?>" class="my-login-validation" novalidate="">
                                <input type="hidden" name="actionID"/>
                                <input type="hidden" name="hdnUserTimeZoneOffset" id="hdnUserTimeZoneOffset" value="0" />
                                <?php
                                echo $form->renderHiddenFields(); // rendering csrf_token
                                ?>
                                <div class="form-group ">

                                    <input id="email" placeholder="<?php echo __('E-Mail Address'); ?>" type="email" class="form-control mb-5" name="txtUsername" id="txtUsername" type="text"  required autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="form-group">

                                    <input  placeholder="<?php echo __('Password'); ?>"  class="form-control"  name="txtPassword"  autocomplete="off" type="password" required data-eye>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                        <label for="remember" class="custom-control-label">se souvenir de moi</label>
                                        <a href="<?php echo url_for('auth/requestPasswordResetCode'); ?>" class="float-right">
                                            mot de passe oublié?
                                        </a>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <button  type="submit" class="btn btn-primary btn-block btnsubmite mt-5">
                                        SE CONNECTER
                                    </button>
                                </div>
                                <div class="mt-4 mb-3 text-center">
                                    <?php echo __('vous n\'avez pas de compte ?'); ?> <a href="#"><?php echo __('Contactez-nous'); ?></a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



<!---->
<!--<div class="alert alert-primary" role="alert">-->
<!--    This is a primary alert—check it out!-->
<!--</div>-->
<!--<div id="divLogin">-->
<!--    <div id="divLogo">-->
<!--        <img src="--><?php //echo "{$imagePath}/logo.png"; ?><!--" />-->
<!--    </div>-->
<!--    <div id="divLoginImageContainer">-->
<!--        <div id="divLoginImage">--><?php //echo
//            file_get_contents($loginImage);?>
<!--        </div>-->
<!--        <div id="divLoginForm">-->
<!--            <form id="frmLogin" method="post" action="--><?php //echo url_for('auth/validateCredentials'); ?><!--">-->
<!--                <input type="hidden" name="actionID"/>-->
<!--                <input type="hidden" name="hdnUserTimeZoneOffset" id="hdnUserTimeZoneOffset" value="0" />-->
<!--                --><?php
//                    echo $form->renderHiddenFields(); // rendering csrf_token
//                ?>
<!--                <div id="logInPanelHeading">--><?php //echo __('LOGIN Panel'); ?><!--</div>-->
<!---->
<!--                <div id="divUsername" class="textInputContainer">-->
<!--                    --><?php //echo $form['Username']->render(); ?>
<!--                  <span class="form-hint" >--><?php //echo __('Username'); ?><!--</span>-->
<!--                </div>-->
<!--                <div id="divPassword" class="textInputContainer">-->
<!--                    --><?php //echo $form['Password']->render(); ?>
<!--                 <span class="form-hint" >--><?php //echo __('Password'); ?><!--</span>-->
<!--                </div>-->
<!--                <div id="divLoginHelpLink">--><?php
//                    include_component('core', 'ohrmPluginPannel', array(
//                        'location' => 'login-page-help-link',
//                    ));
//                    ?><!--</div>-->
<!--                <div id="divLoginButton">-->
<!--                    <input type="submit" name="Submit" class="button" id="btnLogin" value="--><?php //echo __('LOGIN'); ?><!--" />-->
<!--                    --><?php //if (!empty($message)) : ?>
<!--                    <span id="spanMessage">--><?php //echo __($message); ?><!--</span>-->
<!--                    --><?php //endif; ?>
<!--                    <div id="forgotPasswordLink">-->
<!--                        <a href="--><?php //echo url_for('auth/requestPasswordResetCode'); ?><!--">--><?php //echo __('Forgot your password?'); ?><!--</a>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</div>-->
<!---->
<!--<div style="text-align: center">-->
<!--    --><?php //include_component('core', 'ohrmPluginPannel', array(
//                'location' => 'other-login-mechanisms',
//            )); ?>
<!--</div>-->

<?php include_partial('global/footer_nazzim'); ?>

<script type="text/javascript">
    
    function calculateUserTimeZoneOffset() {
        var myDate = new Date();
        var offset = (-1) * myDate.getTimezoneOffset() / 60;
        return offset;
    }
            
    function addHint(inputObject, hintImageURL) {
        if (inputObject.val() == '') {
            inputObject.css('background', "url('" + hintImageURL + "') no-repeat 10px 3px");
        }
    }
            
    function removeHint() {
       $('.form-hint').css('display', 'none');
    }
    
    function showMessage(message) {
        if ($('#spanMessage').length == 0) {
            $('<span id="spanMessage"></span>').insertAfter('#btnLogin');
        }

        $('#spanMessage').html(message);
    }
    
    function validateLogin() {
        var isEmptyPasswordAllowed = false;
        
        if ($('#txtUsername').val() == '') {
            showMessage('<?php echo __js('Username cannot be empty'); ?>');
            return false;
        }
        
        if (!isEmptyPasswordAllowed) {
            if ($('#txtPassword').val() == '') {
                showMessage('<?php echo __js('Password cannot be empty'); ?>');
                return false;
            }
        }
        
        return true;
    }
    
    function refreshSession() {
        setTimeout(function() {
            location.reload();
        }, 20 * 60 * 1000);
    }

    $(document).ready(function() {
        if ($('#installation').val())  {
            var login = $('#installation').val();

            $("#loginSuccessMessage").attr("value", login);
        }

        refreshSession();

        /*Set a delay to compatible with chrome browser*/
        setTimeout(checkSavedUsernames,100);
        
        $('#txtUsername').focus(function() {
            removeHint();
        });
        
        $('#txtPassword').focus(function() {
             removeHint();
        });
        
        $('.form-hint').click(function(){
            removeHint();
            $('#txtUsername').focus();
        });
        
        $('#hdnUserTimeZoneOffset').val(calculateUserTimeZoneOffset().toString());
        
        $('#frmLogin').submit(validateLogin);
        
    });

    function checkSavedUsernames(){
        if ($('#txtUsername').val() != '') {
            removeHint();
        }
    }

    if (window.top.location.href != location.href) {
        window.top.location.href = location.href;
    }
</script>
