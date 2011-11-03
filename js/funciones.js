/*
	Confusión: 
		los campos externaldField llaman a Lookup.php
		los campos lookup llaman a Search.php
		CAMBIAR ESTO!!!!!!!!!!!
*/
function reloadLookups(){
	$(".externalField").each(function(){
		var x = $(this); 
		var value_id= x.attr('value_id')
		var text = $("#"+value_id).val(); 
		$.ajax({
			url :"lib/Lookup.php",
			data: {
				database:    x.attr('database'),
				table:       x.attr('table'),
				fieldRet:    x.attr('fieldRet'),
				value_id:    text, 
				fieldShow:   x.attr('id')  
			},
			success: function(data) {
				if(data != ""){
					var resultado = JSON.parse(data);
					n = $("#"+resultado.fieldShow);
					n.text(resultado.ret);
				}
			}
		});
	});
}
$(function() {
	$(".date").each(function(){
		$(this).datepicker({dateFormat:'yy-mm-dd'});
	});
	$(".lookup").each(function(){
		var comp = $(this); 
		comp.click(function(){
			//$(this).search();
		});
		var url = "lib/Search.php"
			+ "?database="   + comp.attr('database')
			+ "&table="      + comp.attr('table')
			+ "&fieldSearch="+ comp.attr('fieldSearch')
			+ "&fieldRet="   + comp.attr('fieldRet')
			+ "&filterField="+ comp.attr('filterField')
			+ "&filterValue="+ comp.attr('filterValue')
		;
		comp.change(function (){
			reloadLookups();	
		});
		comp.autocomplete({
			source : url, 
			minLength : 0,
			focus : function(event, ui) {
				comp.val(ui.item.ret);
				return false;
			},
			select: function(event, ui){
				comp.val(ui.item.ret);
				reloadLookups();
				return false;
			}
		}).data( "autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.autocomplete", item )
				.append( "<a>" + item.label + "</a>" )
				.appendTo( ul );
		};
	});
	reloadLookups();	
});
