<?php
/************************************************/
/*	Stripe Webhook Test							*/
/* 	Building a simple test suite to send 		*/
/*	webhooks to your stripe listener			*/
/*												*/
/* 	Author: David Dexter						*/
/************************************************/
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="css/test.css" />
</head>
<body>
<div class="container">
	<a name="top"></a>
	<header>
		<h5>Webhook test suite for</h5> 
		<a href="https://stripe.com" target="_blank"><img src="img/logo.png" /></a>
		<div class="clearfix"></div>
	</header>
	
	<form id="stripeform" action="request.php" method="post">
		<div class="row-fluid">
			<div class="span4">
				<ul id="webhooks" class="nav nav-list">
					<?php
						foreach($webhooks as $key => $val){
							echo '<li class="nav-header">'.$key.'</li>';
							foreach($val as $w){
								echo '<li><a href="#top" data-hook="'.$w.'"><i class="icon-arrow-right" style="opacity: 0.15;margin-left:5px"></i>'.$w.'</a></li>';
							}
						}
					?>
				</ul>
			</div>
			<div id="content" class="span8">
				<h4><i class="icon-plus" style="margin:4px 4px 0 0;"></i>Add Your URL</h4>
				<input name="server" type="text" placeholder="http://www.example.com/" class="required input-xxlarge" />
				
				<div id="results-div">
					<h4>
						<i class="icon-leaf" style="margin:4px 4px 0 0;"></i>
						Results <span></span> 
						<a href="#top" id="clear"><i class="icon-remove" style="margin:6px 3px 0 0;"></i><small>clear</small></a></h4>
					<textarea id="result" name="result" rows="20" class="span12"></textarea>
				</div>
				
				<h4>Webhook <span></span></h4>
				<textarea name="request" id="webhook-window" rows="20" class="required span12"></textarea>
				<div id="loader"><img src="img/loading.gif" alt="loading..." /></div>
				<button id="submit" type="submit" class="btn btn-primary">Send Webhook</button>
			</div>
		</div>
	</form>
	
	<footer>
		<p><small>Developed by <a href="http://twitter.com/dpdexter">@dpdexter</a> at <a href="http://twitter.com/brilliantretail">@brilliantretail</a> | Stripe is a trademark of Stripe, Inc.</small></p>
	</footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery-1.8.0.min.js" type="text/javascript"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/form.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){
		var v = $('#stripeform').validate({
			submitHandler: function(form) {
				jQuery(form).ajaxSubmit({
					beforeSubmit: function(){
						$('#submit').hide();
						$('#loader').show();
					},
					success: function(responseText, statusText, xhr, $form){
						$('#results-div').slideDown();
						$('html, body').animate({scrollTop:0}, 'slow');
						$('#result').val(responseText);
						$('#submit').show();
						$('#loader').hide();
					}
				});
			}
		});
		$('#clear').on('click',function(){
											_clear();
											return false;
										});
		$('#webhooks li a').on('click',
								function(){
									var a = $(this);
									var hook = a.attr('data-hook');
									
									/* Resets */
									_clear();
									
									/* Set the selection */
									a.parent().addClass('active');
									
									/* Set the title */
									$('#content h4 span').html(hook);
									
									$('#webhook-window').load('webhooks/'+hook, function() {
										$('html, body').animate({scrollTop:0}, 'slow');
									});
									return false;
								});
	});
	function _clear()
	{
		$('#webhook-window').html('');						
		$('#content h4 span').html('');
											
		/* Remove all selections */
			$('#webhooks li').removeClass('active');
		
		$('#submit').show();
		$('#loader').hide();
		$('#results-div').hide();
	}
</script>
</body>
</html>