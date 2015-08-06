{include file='header.tpl'}

<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

{if $uri == '/accueil'}
	{include file='home.tpl'}
{/if}

<script type="text/javascript"> 
$(document).ready(function(){
	$.material.init();

	{if isset($error)}
		showError("{$error}");
	{/if}
});
</script> 

{include file='footer.tpl'}