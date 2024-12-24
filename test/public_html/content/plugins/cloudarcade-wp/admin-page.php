<?php
if(isset($_POST['action'])){
	if($_POST['action'] == 'generate_token'){
		//
	}
}

?>
<div class="section">
	<div id="token-view" class="text-center" style="display: none;">
		<h3 class="text-success">Token Generated!</h3>
		<p>Copy the token below and paste it into your WordPress plugin (Cloudarcade WP). The token will only be displayed once and will expire in 10 minutes.</p>
		<div id="the-token" style="padding: 20px; font-size: 20px; background: #fff1b9; color: #000; margin-bottom: 40px;">TEST</div>
	</div>
	<div id="error-alert"></div>
	<h5>Generate Wordpress integration token</h5>
	<form method="post" enctype="multipart/form-data" id="generate-token">
		<input type="hidden" name="action" value="generate_token">
		<div class="mb-3">
			<label class="form-label">Token password</label>
			<input type="text" class="form-control" name="token_pass" value="" minlength="6" autocomplete="off" required>
		</div>
		<button class="btn btn-primary" id="btn-generate-tkn"><?php _e('Generate') ?></button>
	</form>
	<div class="mb-3"></div>
	<p>Download the Wordpress plugin <a href="https://api.cloudarcade.net/wp-plugin/cloudarcade-wp/cloudarcade-wp.zip">here</a>.</p>
	<div class="bs-callout bs-callout-info">
		This plugin is used to integrate CloudArcade with your WordPress site through the "Cloudarcade WP" plugin. It allows you to display games on your WordPress site. <a href="https://cloudarcade.net/tutorial/cloudarcade-wp-plugin-integration/" target="_blank">Click here for the guide</a>
	</div>
</div>
<script type="text/javascript">
	$( "form" ).submit(function( event ) {
		if($(this).attr('id') === 'generate-token'){
			event.preventDefault();
			$('#btn-generate-tkn').text('Generating');
			$('#btn-generate-tkn').prop('disabled', true);
			let arr = $( this ).serializeArray();
			let pass;
			arr.forEach((item)=>{
				if(item['name'] == 'token_pass'){
					pass = item['value'];
				}
			});
			if(pass){
				$.ajax({
					url: 'includes/ajax-actions.php',
					type: 'POST',
					dataType: 'json',
					data: {action: 'generate_token_wp', pass: pass},
					complete: function (data) {
						let err = 1;
						let arr_res = JSON.parse(data.responseText);
						if(arr_res){
							if(arr_res.status == 'success'){
								$('#token-view').show();
								$('#the-token').text(arr_res.value);
								$('#error-alert').html('');
								err = 0;
							}
						}
						if(err == 1){
							console.log(data.responseText);
							if(arr_res.message){
								$('#error-alert').html('<div class="alert alert-danger" role="alert">'+arr_res.message+'</div>');
							} else {
								alert('error!');
							}
						}
					}
				});
			}
		}
	});
</script>