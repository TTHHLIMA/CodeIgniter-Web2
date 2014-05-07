
<div class="container">
    <center>
        

        <?php $atributos = array('class' => 'form-signin', 'id' => 'frmLogin'); ?>
        <?php echo form_open('verifica_login', $atributos); ?>
        <table width="300" border="0">
            <tr><td colspan="2" align="center" valign="top"> <img src="<?= base_url() ?>images/techni-translate.jpg" class="img-rounded"/></td></tr>
            <tr><td height="10" colspan="2" align="left" valign="top"></td></tr>
            <!--Benutzername : Usuario -->
            <tr><td align="left" valign="top">Benutzername</td><td align="left" valign="top"><input type="text" name="txtuser" class="span2" placeholder="" required="required"  maxlength="15"  /></td></tr>
            <?php //echo form_error('txtuser'); ?>
            <!--Kennwort : Password --> 
            <tr><td align="left" valign="top">Kennwort</td><td align="left" valign="top"><input type="password" name="txtpass" class="span2" placeholder="" required="required" maxlength="15"   /></td></tr>
            <!--Geben Sie die angezeigten Zeichen ein. : Escribe los caracteres que veas -->
            <tr><td colspan="2" align="left" valign="top">Geben Sie die angezeigten Zeichen ein.</td></tr>

            <tr><td colspan="2" align="left" valign="top"><?php echo $image; ?>&nbsp;&nbsp;<?php echo '<input type="text" name="captcha" value=""  style="width: 95px" maxlength="6" />'; ?> </td></tr>
            <tr><td height="10" colspan="2" align="left" valign="top"></td></tr>
            <tr><td align="left" valign="top"></td><td align="left" valign="top"><input type="submit" class="btn" value="&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;"></td></tr>
            <tr><td height="10" colspan="2" align="left" valign="top"></td></tr>
            <tr>
                <td colspan="2" align="left" valign="top">
                    <?php
                    if (form_error('txtpass')) {
                        echo "<div class='alert alert-error'>";
                        echo form_error('txtpass');
                        echo "</div>";
                    }
                    ?>
                    <?php
                    if (form_error('txtpass')) {
                        echo "<div class='alert alert-error'>";
                        echo form_error('captcha');
                        echo "</div>";
                    }
                    ?>            
                </td>
            </tr>

        </table>

        </form>
        <center>
            </div> <!-- /container -->


