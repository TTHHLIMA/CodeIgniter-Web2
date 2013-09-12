<div class="wrapper">	
    <div class="container">
		<section class="row">
			<div class="span6">
                            <?php $atributos = array('class' => 'well form-inline span5', 'id' => 'frmLogin'); ?>
                            <?php echo form_open('verifica_login', $atributos); ?>
					<input type="text" name="txtuser" class="span2" placeholder="Nombre de usuario..." required="required"  />
                                        <?php echo form_error('txtuser'); ?>
					<input type="password" name="txtpass" class="span2" placeholder="Password..." required="required"  />
                                        <?php echo form_error('txtpass'); ?>
                                        <input type="submit" class="btn btn-primary" value="Login">
				</form>
			</div>
		</section>
    </div> <!-- /container -->
</div>
	
	