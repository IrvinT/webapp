{include file='header.tpl'}

<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

{if $uri == '/accueil' || $uri == '/'}
	{include file='home.tpl'}
{/if}

<script type="text/javascript"> 
$(document).ready(function(){
	$.material.init();

	{if isset($session.pseudo)}
		pseudo = "{$session.pseudo}";
	{/if}

	{if isset($error)}
		showError("{$error}");
	{/if}
	{if isset($confirmation)}
		showConfirmation("{$confirmation}");
	{/if}
	{if isset($information)}
		showInformation("{$information}");
	{/if}
});
</script> 

{include file='footer.tpl'}