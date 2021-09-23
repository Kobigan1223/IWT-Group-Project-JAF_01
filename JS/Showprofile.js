
//change navigation bar
var container = document.getElementsByClassName("container");
var nav = document.getElementsByTagName("li");



/*Profile Pic change*/
var preview = document.getElementById("profimg");
var defaultimg = preview.src;
var removedpimg = "../images/userprofpics/no_avatar.jpg";
var removeimgbtn = document.getElementById("removeimg");
var cancelimgbtn = document.getElementById("cancelimg");
var uploadimgbtn = document.getElementById("uploadimg");
var editimgbtn = document.getElementById("editimg");
var submitimgbtn = document.getElementById("submitimg");
var pinstruction = document.getElementById("pinstruction");
var remind = document.getElementById("remind");

function showPreview(event) {
	if (event.target.files.length > 0) {
		var src = URL.createObjectURL(event.target.files[0]);
		preview.src = src;
	}
	afteredit(0);
}

function editp() {
	uploadimgbtn.style.display = "block";
	editimgbtn.style.display = "none";
	removeimgbtn.removeAttribute("disabled");
	submitimgbtn.setAttribute("disabled", "true");
	pinstruction.style.display = "block";
	cancelimgbtn.removeAttribute("disabled");
	remind.value = "0";
}

function afteredit(num) {
	if (num == 0) {
		submitimgbtn.removeAttribute("disabled");
		cancelimgbtn.removeAttribute("disabled");
	} else if (num == 1) {
		submitimgbtn.setAttribute("disabled", "true");
		cancelimgbtn.setAttribute("disabled", "true");
	}
	uploadimgbtn.style.display = "none";
	editimgbtn.style.display = "block";
	removeimgbtn.setAttribute("disabled", "true");
	pinstruction.style.display = "none";
}

function cancimg() {
	preview.src = defaultimg;
	afteredit(1);
}

function removedit() {
	preview.src = removedpimg;
	remind.value = "1";
	afteredit(0);
}

//edit profile details
var info = document.getElementsByClassName("prof-info")[0];
var fprofdetail = document.getElementsByClassName("fprofdetail")[0];
var profdet = fprofdetail.getElementsByClassName("textb");
var editbtn = document.getElementsByClassName("Edit")[0];
var submitbtn = document.getElementsByClassName("Submit")[0];
var resetbtn = document.getElementsByClassName("Reset")[0];

function edit() {
	for (var i = 0; i < 4; i++) {
		profdet[i].removeAttribute("disabled");
	}
	editbtn.setAttribute("disabled", "true");
	resetbtn.removeAttribute("disabled");
	submitbtn.removeAttribute("disabled");
	fprofdetail.setAttribute("onsubmit", "edits();return false;");
	//info.scrollIntoView();
}


function editc() {
	for (var i = 0; i < 4; i++) {
		profdet[i].setAttribute("disabled", "true");
	}
	editbtn.removeAttribute("disabled");
	resetbtn.setAttribute("disabled", "true");
	submitbtn.setAttribute("disabled", "true");
}


//Show hide password
var pwdc = document.getElementsByClassName("pwdc");

function shpwd(index, icon) {
	if (pwdc[index].type == "password") {
		pwdc[index].type = "text";
		icon.title = "Hide Password";
		icon.src = "../images/icons/eye-slash.png";
	} else {
		pwdc[index].type = "password";
		icon.title = "Show Password";
		icon.src = "../images/icons/eye.png";
	}
}

//form validation
function checkPassword(num) {
	if (document.getElementsByClassName("Pwd")[num].value != document.getElementsByClassName("rePwd")[num].value) {
		alert("Passwords are mismatched!!");
		//				enableButton(3);
		return false;
	} else {
		//				alert("Passwords matched!!");
		//	
		return true;
	}
}

var viewprdfrm = document.getElementById("viewprdfrm");
var viewprdidmem = document.getElementById("viewprdid");
//viw product html opener
function viewprd(prdid) {
	viewprdidmem.value = prdid;
	viewprdfrm.submit();
}
var remprderm = document.getElementById("remprderm");
var remprdidmem = document.getElementById("remprdid");

/*Remove product data*/
function removeprd_data(prdid) {
	//console.log(prdid);
	remprdidmem.value = prdid;
	remprderm.submit();
}


function show(panindex, opener) {
	if (opener) {
		var url = window.location.href.split('?')[0];
		window.history.replaceState(null, null, url);
	}
	for (var i = 0; i < container.length; i++) {
		container[i].style.display = "none";
		if (i == 3) i = 4;
		nav[i].classList.remove("active");
	}
	if (panindex != 1) {
		document.getElementsByClassName('cpwd')[0].reset();
	}
	container[panindex].style.display = "block";
	if (panindex == 3) panindex = 4;
	nav[panindex].classList.add("active");

}
if (window.history.replaceState) {
	window.history.replaceState(null, null, window.location.href);
}
var stschgfrm = document.getElementById('stschgfrm');

function stchg(orderid, status, prdid) {
	document.getElementsByName('order_id')[0].value = orderid;
	document.getElementsByName('order_status')[0].value = status;
	document.getElementsByName('ord_st_prdid')[0].value = prdid;
	stschgfrm.submit();
}

var res = (window.location).toString();
var pos = res.indexOf("?");
if (pos != -1) {
	var str = res.substring(pos + 1);
	var str2 = res.substring(pos + 1);
	if (str === 'viewproducts') {
		show(2, 1);
	}

}
