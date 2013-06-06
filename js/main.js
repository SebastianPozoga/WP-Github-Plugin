/**
 *	Main Js file
 */

var pageUrl = "http://easysolar.pozoga.eu/";

jQuery(document).ready(init);

function init(){
	//init
	initRecomender();
	initRecomenderForm();

	//Injects
	jQuery(".inject-recomender input").val( getRecomender() );//.css('visibility','hidden');
	//.css('visibility','hidden');
};


function initRecomender(){
	if(getRecomender()) return;
	var recomender = getURLParameter("recomender");	
	if(!recomender) return;
	jQuery.cookie("recomender", recomender, {expires : 64, path: '/'});
};

function getRecomender(){
	return jQuery.cookie("recomender");
};

/*function getUrlParams(){
	if(!window.location.hash) {
		return {};
	}
	var json =  window.location.hash.substring(1);
	return JSON.parse(json);
};*/

function getURLParameter(name) {
    return decodeURI(
        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
    );
}



function updateRecomenderForm(){
	var i = jQuery("#recomenderFormInput").val();
	var o = jQuery("#recomenderFormOut");
	var c = jQuery("#recomenderFormCode");
	//email parse
	if(validateEmail(i)){
		var link = pageUrl+"?recomender="+i;
		o.html(link);
		c.val("<a href=\""+link+"\">Polecam EasySolar.pl - ogniwa fotowoltaiczne</a>");
	}else{
		o.html("Podaj poprawny adres email");
		c.val("");
	}
};

function initRecomenderForm(){
	var html = "<div class='recomenderForm'>Aby uzyskać indywidualny link rekomendacyjny podaj swój adres email:<br/> <input id='recomenderFormInput' /><div id='recomenderFormOut'></div><div><div>Pobierz kod:</div><textarea id='recomenderFormCode' style='width:100%'></textarea></div></div>";
	jQuery(".inject-recomenderForm").html( html );
	jQuery("#recomenderFormInput").on('change keyup',updateRecomenderForm);
};

function validateEmail(email) { 
    var re = /[A-z0-9]+@[A-z0-9]+.[A-z]{2,3}/g;
    return re.test(email);
} 
