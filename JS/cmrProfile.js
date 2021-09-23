
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
	remind.value="0";
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
	remind.value="1";
	afteredit(0);
}

//edit profile details
var info = document.getElementsByClassName("prof-info")[0];
var fprofdetail = document.getElementsByClassName("fprofdetail")[0];
var profdet = fprofdetail.getElementsByClassName("textb");
var editbtn = document.getElementsByClassName("Edit")[0];
var submitbtn = document.getElementsByClassName("Submit")[0];
var resetbtn = document.getElementsByClassName("Reset")[0];

function edit(ealement) {
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
		icon.src="../images/icons/eye-slash.png";
	} else {
		pwdc[index].type = "password";
		icon.title = "Show Password";
		icon.src="../images/icons/eye.png" ;
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
		//				enableButton(num);	
		/*if(num==0)
		{
				alert('Password Changed Successfully!');
		}
		else if(num==1)
		{
				alert('Account Deleted Successfully!');
		}*/
		return true;
	}
}

/*		function enableButton(num) {
			if(num == 0)
			{
				document.getElementsByClassName("Change")[0].disabled = false;
			}
			else if(num == 1)
			{
				document.getElementsByClassName("delete")[0].disabled = false;
			}
			else
			{
				document.getElementsByClassName("delete")[0].disabled = true;
				document.getElementsByClassName("Change")[0].disabled = true;
			}
		}*/

var prdobj= [
	{
		"image": 'prd001',
		"name": "Note20 Ultra",
		"price": 260000
	},
	{
		"image": 'prd002',
		"name": "Galaxy s7",
		"price": 55000
	},
	{
		"image": 'prd003',
		"name": "Keyboard",
		"price": 1200
	},
	{
		"image": 'prd004',
		"name": "Screen protector",
		"price": 700
	},
	{
		"image": 'prd005',
		"name": "iPhone XS Max",
		"price": 250000
	},
	{
		"image": 'prd006',
		"name": "Mouse",
		"price": 1500
	},
	{
		"image": 'prd007',
		"name": "LG Wing 5G",
		"price": 92138
	},
	{
		"image": 'prd008',
		"name": "Galaxy S20",
		"price": 125000
	},
	{
		"image": 'prd009',
		"name": "Samsung phone",
		"price": 80000		
	}
		];

var ordobj = [	
	{	
		"orddid":"ord001",
		"prdid": 'prd005',
		"color":"red" ,
		"quantity": 15,
		"orddt": "10.2.2020",
		"deadr": "Malibu Point 10880, 90265,Malibu, California.",
		"ordsts": "processing",
	},
	{	
		"orddid":"ord002",
		"prdid": 'prd002',
		"color":"red" ,
		"quantity": 15,
		"orddt": "10.2.2020",
		"deadr": "Malibu Point 10880, 90265,Malibu, California.",
		"ordsts": "shipped",
	},
	{	
		"orddid":"ord003",
		"prdid": 'prd001',
		"color":"red" ,
		"quantity": 15,
		"orddt": "10.2.2020",
		"deadr": "Malibu Point 10880, 90265,Malibu, California.",
		"ordsts": "processing",
	},
	{	
		"orddid":"ord004",
		"prdid": 'prd006',
		"color":"red" ,
		"quantity": 15,
		"orddt": "10.2.2020",
		"deadr": "Malibu Point 10880, 90265,Malibu, California.",
		"ordsts": "shipped",
	},
	{	
		"orddid":"ord005",
		"prdid": 'prd007',
		"color":"red" ,
		"quantity": 15,
		"orddt": "10.2.2020",
		"deadr": "Malibu Point 10880, 90265,Malibu, California.",
		"ordsts": "shipped",
	},
	{	
		"orddid":"ord006",
		"prdid": 'prd004',
		"color":null,
		"quantity": 15,
		"orddt": "10.2.2020",
		"deadr": "Malibu Point 10880, 90265,Malibu, California.",
		"ordsts": "processing",
	},
	{	
		"orddid":"ord007",
		"prdid": 'prd008',
		"color":"red" ,
		"quantity": 15,
		"orddt": "10.2.2020",
		"deadr": "Malibu Point 10880, 90265,Malibu, California.",
		"ordsts": "processing",
	}
		];

var draft = ordobj;

//view list
var list_element = document.getElementById("list");
var pagination_element = document.getElementById("pagination");
var current_page = 1;
var rows = 4;

function DisplayList(items, wrapper, rows_per_page, page) {
	wrapper.innerHTML = "";
	page--;
	var start = rows_per_page * page;
	var end = start + rows_per_page;
	var item = [];
	var item_element = "";
	if (end > items.length) {
		end = items.length;
	}
	for (var i = start; i < end; i++) {
			for(var j =0 ; j<ordobj.length;j++){
				if(ordobj[j]["image"]==items[i]["image"])
					break;
			}
		for (var j = 0; j < prdobj.length; j++) {
				if (prdobj[j]["image"] == items[i]["prdid"])
					break;
			}
			item = "<div class=\"prleft\">" +
				"<img width=\"50px\" src=\"../images/Products/" + prdobj[j]["image"] + "/img1.jpg\">" +
				"</div>" +
				"<div class=\"prright\">" +
					"<div class=\"scol1\">" +
						"<h3>" + items[i]["orddid"] + "</h3>" +
						"<div class=\"data\">" +
							"<h4>Product:</h4>" +
							"<p>" + prdobj[j]["name"] + "</p>" +
						"</div>";
						if(items[i]["color"]!=null){
						item+="<div class=\"data\">" +
								"<h4 >Color:</h4>" +
								"<p>" + items[i]["color"] + "</p>" +
							"</div>" ;
						}
						item+="<div class=\"data\">" +
							"<h4>Quantity:</h4>" +
							"<p>" + items[i]["quantity"] + "</p>" +
						"</div>"+
						"<div class=\"data\">" +
							"<h4>Order Date:</h4>" +
							"<p>" + items[i]["orddt"] + "</p>" +
						"</div>"+
						"<div class=\"data\">" +
							"<h4>Order Status:</h4>" +
							"<p>" + items[i]["ordsts"] + "</p>" +
						"</div>"+				
					"</div>" +
				"<div class=\"scol2\">" +
					"<button class=\"buttons0 removeb\" onclick=\"removeprd_data(" + i + ",'"+items[i]["orddid"]+"')\">Remove</button>" +
			"</div>" +		
				"</div>";
		item_element = document.createElement("div");
		item_element.classList.add("prod-data");
		item_element.innerHTML = item;
		wrapper.appendChild(item_element);
	}
}

function SetupPageination(items, wrapper, rows_per_page) {
	wrapper.innerHTML = "";
	var page_count = Math.ceil(items.length / rows_per_page);
	for (let i = 1; i < page_count + 1; i++) {
		var btn = PaginationButton(i, items);
		wrapper.appendChild(btn);
	}
}

function PaginationButton(page, items) {
	let button = document.createElement('button');
	button.innerText = page;
	button.classList.add('pgbtn')
	if (current_page == page) {
		button.classList.add('active');
	}
	button.addEventListener('click', function () {
		current_page = page;
		DisplayList(items, list_element, rows, current_page);
		var btns = document.getElementsByClassName("pgbtn");
		for (var i = 0; i < btns.length; i++) {
			if (btns[i].className == "pgbtn active")
				btns[i].classList.remove('active');
		}
		button.classList.add('active');
	});
	return button;
}

function prdopen() {
	if (draft.length > 0) {
		DisplayList(draft, list_element, rows, current_page);
		SetupPageination(draft, pagination_element, rows);
	} else {
		item_element = document.createElement("div");
		item_element.innerHTML = "<h3>" + "No Products Available!!" + "</h3>";
		list_element.appendChild(item_element);
	}
}

var remfrm = document.getElementById('remfrm');
/*Remove product data*/
function removeprd_data(ordid,prdid) {
	console.log(ordid);	
	document.getElementsByName('ordid')[0].value = ordid;
	document.getElementsByName('prodid')[0].value = prdid;
	remfrm.submit();
}

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

//change navigation bar
function show(panindex,opener) {
	if(opener){
		var url =window.location.href.split('?')[0];
		window.history.replaceState( null, null, url);
	}
	for (var i = 0; i < 3; i++) {
		nav[i].classList.remove("active");
		container[i].style.display = "none";
	}
	if(panindex!=1){
		document.getElementsByClassName('cpwd')[0].reset();
		document.getElementsByClassName('dpwd')[0].reset();
	}
	//container[1].scrollIntoView();
	container[panindex].style.display = "block";
	nav[panindex].classList.add("active");
}