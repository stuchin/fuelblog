<?php echo Form::open(); ?>
	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Username', 'username'); ?>

			<div class="input">
				<?php echo Form::input('username', Input::post('username'), array('class' => 'span4')); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Password', 'password'); ?>

			<div class="input">
				<?php echo Form::input('password'); ?>
			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Log in', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>
