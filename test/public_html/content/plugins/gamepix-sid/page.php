<?php

if(!USER_ADMIN){
	die('404');
}

?>

<div class="section">
	<p>Change all of your GamePix (source) games SID.</p>
	<div class="alert alert-info" role="alert">
		Newly added or imported GamePix games SID not changed automatically, so you need to use this plugin after add GamePix games.
	</div>
	<form id="plugin-gamepix-sid">
		<div class="form-group">
			<label for="sid">Your SID:</label>
			<input type="text" class="form-control" name="sid" value="1" required/>
		</div>
		<button type="submit" class="btn btn-primary btn-md">Update</button>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$( "form" ).submit(function( event ) {
			let arr = $( this ).serializeArray();
			if($(this).attr('id') === 'plugin-gamepix-sid'){
				event.preventDefault();
				$.ajax({
					url: "<?php echo DOMAIN ?>content/plugins/gamepix-sid/action.php",
					type: 'POST',
					dataType: 'json',
					data: arr,
					success: function (data) {
						//console.log(data.responseText);
					},
					error: function (data) {
						//console.log(data.responseText);
					},
					complete: function (data) {
						console.log(data.responseText);
						if(data.responseText === 'ok'){
							$('.section').before('<div class="alert alert-success alert-dismissible fade show" role="alert">SID updated<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						} else if(data.responseText === 'no-games'){
							alert('You don\'t have any Gamepix games!');
						} else {
							alert('Error! Check console log for more info!');
						}
					}
				});
			}
		});
	})
</script>