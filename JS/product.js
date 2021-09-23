
var addcartfrm = document.getElementById('addcartfrm');
function sendcartf(choice){
	document.getElementsByName('cartchoice')[0].value=choice;
	addcartfrm.removeAttribute('onsubmit');
	addcartfrm.submit();
}

var openprdfrm = document.getElementById('openprd');
function openprd(prdid){
	document.getElementsByName('Product')[0].value=prdid;
	openprdfrm.submit();
}
var addwishprdfrm = document.getElementById('wishprd');
function addwish(prdid){
	document.getElementsByName('wishaddProduct')[0].value=prdid;
		//console.log("wish"+prdid);
	addwishprdfrm.submit();
}



// Image box
var modalimg = document.getElementsByClassName("modalimg")[0];
var bimg = document.getElementsByClassName("bimg")[0];
var simg = document.getElementsByClassName('simg');
var defimg = "";
var defbcol = simg[0].style.borderColor;

var clnum = 0;
function qtychg(Quantity){
	var val=parseInt(Quantity.value);
	var max =parseInt(Quantity.max)
	if(max<Quantity.value){
		Quantity.value=max;
	}
	if(1>Quantity.value){
		Quantity.value=1;
	}
}
function imgchg(num) {
	if (num < 4) {
		defimg = bimg.src;
		bimg.src = simg[num].src;
		simg[num].classList.add("sactive");
	} else if (num == 4) {
		bimg.src = defimg;
		for (var i = 0; i < 4; i++) {
			if (i != clnum) {
				simg[i].classList.remove("sactive");
			}
		}
	}
	if (num > 4) {
		defimg = bimg.src;
		bimg.src = simg[num - 5].src;
		modalimg.src = simg[num - 5].src;
		for (var i = 0; i < 4; i++) {
			simg[i].classList.remove("sactive");
		}
		simg[num - 5].classList.add("sactive");
		clnum = num - 5;
	}
}
imgchg(0);


// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
bimg.addEventListener("click", function () {
	modal.style.display = "block";
});
// When the user clicks on <span> (x), close the modal
span.addEventListener("click", function () {

	modal.style.display = "none";
});
// When the user clicks anywhere outside of the modal, close it
window.addEventListener("click", function (event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
});
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

