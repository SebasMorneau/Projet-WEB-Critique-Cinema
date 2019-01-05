window.onload = function () {

	if(document.getElementById("boutonEcrire") != null){

		document.getElementById("boutonEcrire").onclick = function(){
		divScroolDown();
		};
	}
	if(document.getElementById("editAdmin") != null){

		document.getElementById("editAdmin").onclick = function(){
		ckScroolDown();
		};
	}
}


function divScroolDown(){
	
        $(".boiteEcrire").slideDown("slow");
}
function ckScroolDown(){
	
        $("#ckEditor").slideDown("slow");
}