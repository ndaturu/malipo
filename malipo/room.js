var home=document.getElementById("home");
	var homeC=document.getElementByClassName('container');
var about=document.getElementById('about');
var results=document.getElementById('results');
var contact=document.getElementById('contacts');
var economy=document.getElementById('economy');
var body=document.getElementByTagName('body');
home.onclick = function (event) {
	home.style.display="block";
}
about.onclick = function (event) {
	about.style.display="block";
}
results.onclick = function (event) {
	results.style.display="none";
}
contact.onclick = function (event) {
	contact.style.display="none";
}
economy.onclick = function (event) {
	economy.style.display="block";
}
window.onload = function(event) {
   
}