var preview = document.getElementsByClassName("proimg");
var prdfrm = document.getElementsByClassName("prdfrm")[0];
var profdet = prdfrm.getElementsByClassName("textb");
var editbtn = document.getElementsByClassName("Edit")[0];
var submitbtn = document.getElementsByClassName("Submit")[0];
var resetbtn = document.getElementsByClassName("Reset")[0];
var colorchk = document.getElementsByClassName("colorchk")[0];
var colorfield = document.getElementsByClassName("colorfield")[0];
var inputfield = document.getElementsByClassName("inputfield");
var selcat = document.getElementById('selcat');
var inplen = profdet.length;
var remind = document.getElementsByClassName("remind");
var imglock= [0,0,0,0];
var categorymem ="";

//disable inputs
function disablein() {
	for (var i = 0; i < inplen; i++) {
		profdet[i].setAttribute("disabled", "true");
	}
}
//color enable
function endcol() {
	if (!colorchk.checked) {
		colorfield.value=null;
		colorfield.setAttribute("disabled", "true");
	} else {
		colorfield.removeAttribute("disabled");

	}

}



///receive product information
var res = (window.location).toString();
/*res+="?prd005";*/
var pos = res.indexOf("?");
function getprd() {
	if (pos != -1) {
		disablein();
		receiveprd();
	} else {
		edit();
	}
}
getprd();

function receiveprd() {	
	prdfrm.setAttribute("onreset", "editc();");
}


//edit product details

function edit() {
	var condition = "";
	for (var i = 0; i < inplen; i++) {
		profdet[i].removeAttribute("disabled");
	}
	endcol();
	editbtn.setAttribute("disabled", "true");
	resetbtn.removeAttribute("disabled");
	submitbtn.removeAttribute("disabled");
	prdfrm.setAttribute("onsubmit", "return edits();");	
}

function edits() {
	var entry=true;
	if(selcat.value=='not selected'){
		entry=false;
		alert("Category Not Selected!!");
	}
	if((colorchk.checked && trimfield(inputfield[5].value)=='')){
		entry=false;
		alert("Wrong input in text area!!");
		inputfield[5].value=null;
	}
	var countl=0;
	var nonlocked =[];
	for (var i = 0; i < 4; i++) {
		if(imglock[i]!=0)
		{
			nonlocked[countl]=(i+1);
			countl++;
		}
	}

	if(countl!=0){
		var msg="Image ";
		for (var i = 0; i < nonlocked.length; i++) {
			//console.log("no"+nonlocked[i]);
			if(i>0)msg +=",";
			msg +=nonlocked[i];
		}
		msg +=" not Locked!!";
		alert(msg);
		entry=false;
	}
	if(entry){
		return true;
	}
	return false;

}

function editc() {	
	if (pos != -1){
		for (var i = 0; i < inplen; i++) {
			profdet[i].setAttribute("disabled", "true");
		}
		getprd();
		editbtn.removeAttribute("disabled");
		resetbtn.setAttribute("disabled", "true");
		submitbtn.setAttribute("disabled", "true");
	}else{
		edit();
	}
	for (var i = 0; i < 4; i++) {
		cancimg(i);
	}
}
function trimfield(str) 
{ 
	return str.replace(/^\s+|\s+$/g,''); 
}


/*Product Pic change*/

var defaultimg = [];
for (var i = 0; i < preview.length; i++) {
	defaultimg[i] = preview[i].src;
}
var removedpimg = "../images/products/noimage.jpg";
var removeimgbtn = document.getElementsByClassName("removeimg");
var cancelimgbtn = document.getElementsByClassName("cancelimg");
var uploadimgbtn = document.getElementsByClassName("uploadimg");
var editimgbtn = document.getElementsByClassName("editimg");



function showPreview(event, index) {
	if (event.target.files.length > 0) {
		var src = URL.createObjectURL(event.target.files[0]);
		preview[index].src = src;
	}
	afteredit(0, index);
	saveedit(index);
}

function editp(index) {
	uploadimgbtn[index].style.display = "block";
	editimgbtn[index].style.display = "none";
	removeimgbtn[index].removeAttribute("disabled");
	cancelimgbtn[index].removeAttribute("disabled");
	preview[index].classList.remove("locked");
	remind[index].value="0";
	imglock[index]=1;
	edit();

}

function afteredit(num, index) {
	if (num == 0) {
		cancelimgbtn[index].removeAttribute("disabled");
	} else if (num == 1) {
		cancelimgbtn[index].setAttribute("disabled", "true");
	}
	uploadimgbtn[index].style.display = "none";
	editimgbtn[index].style.display = "block";
	removeimgbtn[index].setAttribute("disabled", "true");
	
}

function saveedit(index) {
	cancelimgbtn[index].setAttribute("disabled", "true");
	imglock[index]=0;
	preview[index].classList.add("locked");
}

function cancimg(index) {
	preview[index].src = defaultimg[index];
	document.getElementById("file-ip-" + (index + 1)).value = null;
	afteredit(1, index);
	imglock[index]=0;
	remind[index].value="0";
}

function removedit(index) {
	preview[index].src = removedpimg;
	remind[index].value="1";	
	document.getElementById("file-ip-" + (index + 1)).value = null;
	afteredit(0, index);
	saveedit(index);
}

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
