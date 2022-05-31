<!-- Extra validation for slider -->
{if $urls.current_url == "http://dominio.test/" || $urls.current_url == "http://dominio.test/index.php" }
<script type="text/javascript" src="{$urls.js_url}slider_to_modal.js" ></script>
{/if}
