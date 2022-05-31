/*
 * Extra validations for slider
 * 
 * Show the content in a modal window if the slide url is in the pinned list.
 */
 
function show_modal(page_link){
	var title = "Greetings";
	var body = '';
	var json_data;
	var url_api = 'http://4ZEMBU5RVV36E2PCNEV2T3FRYM3SZNRF@lovepets.test/api/cms_pages/?output_format=JSON&display=full&filter[id_lang]=1&filter[link_rewrite]='+page_link;
	
	$.getJSON(url_api, function (data, textStatus, jqXHR){
		json_data = data;
		body = '<div class="row"><div class="col-md-12 col-sm-12">'+json_data.cms_pages[0].content+'</div></div>';

		//~ $("#MyPopupHomeSlider .modal-title").html(title);
		$("#MyPopupHomeSlider .modal-body").html(body);
		$("#MyPopupHomeSlider").modal("show")
	});
}

$('div#sphomepage-slider2 a').off('click').on('click', function(e){
	e.preventDefault();
	
	var slide_link = $(this).attr('href');
	//~ var page_links = [
		//~ 'aviso-legal',
		//~ 'terminos-y-condiciones-de-uso',
		//~ 'privacidad-confidencialidad',
	//~ ];
	var page_links = $(".slider_url_pages").text();
	page_links = page_links.split(",");
	
	var in_array = false;
	var page_link = '';
	
	for(let i = 0; i <= page_links.length-1; i++){
		//~ console.log(page_links[i].trim());
		if(slide_link.indexOf(page_links[i].trim()) != -1){
			in_array = true;
			page_link = page_links[i].trim();
		}
	}
	
	// Si el enlace del slide es de alguna de las páginas de bases legales, mostramos el contenido en una modal.
	// Si no, abrimos el enlace normalmente.
	if(in_array){
		show_modal(page_link);
	}else{
		document.location.href = slide_link;
	}
});
