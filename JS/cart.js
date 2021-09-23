var len = document.getElementById('len').value;

function priceadd(num) {
    var staticprice = document.getElementById("p" + num).innerHTML;
    var quantity = document.getElementById("j" + num).value;
    var k = parseFloat(staticprice) * parseFloat(quantity);
    document.getElementById("k" + num).innerHTML = k;
    var total = 0;
    var obj = document.getElementsByClassName("dis");
    for (var i = 0; i < obj.length; i++) {
        total += parseFloat(obj[i].innerHTML);
    }
    document.getElementById("a1").innerHTML = total;
}

var remprderm = document.getElementById("remprderm");
var remprdidmem = document.getElementById("remprdid");
var prdcolor = document.getElementById('prdcolor');

function removeprd_data(prdid, prdcol) {
    remprdidmem.value = prdid;
    prdcolor.value = prdcol;
    remprderm.submit();
}



var update = document.getElementById("update");
var upprdidmem = document.getElementById("upid");
var prdcolor = document.getElementById('prdcolor');
function update_data(prdid, prdcol,num) {
    upprdidmem.value = prdid;
    document.getElementsByName('num1')[0].value=prdcol;
    document.getElementsByName('num')[0].value = parseInt(document.getElementById("j" + num).value);
    update.submit();
}

function caltotal() {
    var b = document.getElementById("a1").innerHTML;
    var j = ((parseFloat(b) * 10) / 100);
    document.getElementById("a2").innerHTML = j;
    var a = (parseFloat(b) - parseFloat(j));
    document.getElementById("a3").innerHTML = a;
}


var amtfrm = document.getElementById('totamt');

function sendamt() {
    document.getElementsByName('amount')[0].value = parseFloat(document.getElementById("a3").innerHTML);
	console.log(parseInt(document.getElementsByName('amount')[0].value));
    amtfrm.submit();
}
for (var i = 0; i < len; i++) {
    priceadd(i + 1);

}
caltotal();

var clnum = 0;

function qtychg(Quantity) {
    var val = parseInt(Quantity.value);
    var max = parseInt(Quantity.max)
    if (max < Quantity.value) {
        Quantity.value = max;
    }
    if (1 > Quantity.value) {
        Quantity.value = 1;
    }
}
