$(document).ready(function(){
$("#pass1").click(function(){
$("#passwarning").text("This website aint safe! Enter something u never use somewhere else!");
});
  


});

function fullImage(id){
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState==4 && xmlhttp.status ==200){
		document.getElementById("big").innerHTML=xmlhttp.responseText;
	}
}
xmlhttp.open("GET","bigpic.php?id="+id,true);
$("#big").toggle(200);
xmlhttp.send();
}
function closeBigPic(){
	$("#big").hide(200);
}
function getRate(str,id){ //AJAX call
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		document.getElementById("score").innerHTML = xmlhttp.responseText;
	}
}
xmlhttp.open("GET","newrate.php?rate="+str+"&id="+id,true);
xmlhttp.send();
}

function newComment1(id){
var description = document.getElementById("newComment").value;
console.log("new comment" + description);
var datastring = "id="+id+"&description="+description;
if(description == ""){alert("Please don't post empty form!")}
else {$.ajax({
type: "POST",
url: "newcomment.php",
data: datastring,
cache: false,
success: function(html){
document.getElementById("submitted").innerHTML = html}
});
}
}

function deletePic(id){
var r = confirm("Are you sure you want to delete your pic?");
if (r == true){
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function(){
if(xmlhttp.readyState == 4 && xmlhttp.status ==200){
console.log(xmlhttp.responseText);
//alert("Your photo has been deleted;");
}}
xmlhttp.open("GET","delete.php?id="+id,true);
xmlhttp.send();

window.setTimeout("location.reload()",200);
}}


function loadProfile(name){
;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function(){
if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	document.getElementById("frontpage").innerHTML = xmlhttp.responseText;
}}
xmlhttp.open("GET","writeAccount.php?name="+name,true);
xmlhttp.send();
console.log(name)



}




