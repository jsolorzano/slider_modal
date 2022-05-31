{if $save}
	<div class="bootstrap">
		<div class="module_confirmation conf confirm alert alert-success">
			<button type="button" class="close" data-dismiss="alert">x</button>
			Urls guardadas correctamente
		</div>
	</div>
{/if}

<form action="" method="post">
	<div>
		<label for="url_pages">URLs</label>
		<input type="text" class="form-control" value="{$urlvalue}" name="slider_url_pages" id="slider_url_pages" aria-describedby="urlHelp" placeholder="Introdúzca las urls"/>
		<small id="urlHelp" class="form-text text-muted">Introdúzca las urls amigables separadas por comas (,)</small>
	</div>
	<button type="submit" name="submitUrls" class="btn btn-primary">Enviar</button>
</form>
