var len = document.getElementById('len').value;
for (var i = 0; i < len; i++) {
    priceadd(i + 1);
}
function priceadd(num) {
    var staticprice = document.getElementById("pro" + num).value;
    var quantity = document.getElementById("qua" + num).innerHTML;
    var k = parseFloat(staticprice) * parseFloat(quantity);
    document.getElementById("cha" + num).innerHTML = k;
    console.log(quantity);
   var total = 0;
    var obj = document.getElementsByClassName("tota");
    for (var i = 0; i < obj.length; i++) {
        total += parseFloat(obj[i].innerHTML);
    }
    document.getElementById("amou").innerHTML = total;
     var b = document.getElementById("amou").innerHTML;
    var j = ((parseFloat(b) * 10) / 100);
    document.getElementById("disc").innerHTML = j;
   var a = (parseFloat(b) - parseFloat(j));
    document.getElementById("finalamo").innerHTML = a;
}