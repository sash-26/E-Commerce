function checkvalid(){
var name=document.forms[0].FirstName.value;
if(name.length==0){
newele=document.createElement("span");
newele.appendChild(document.createTextNode("Name Is Required"));
document.getElementById("checkname").appendChild(newele);
return false;
}
else{
alert("Hello"+name);
return true;
}
var id=document.forms[0].Customer ID.value;
if(id.match(/RJ|UP|MH/)){
return true;
}
else{alert("Invalid ID");return false;}}
function showplace(){
var place=document.forms[0].Place.value;
alert("you have choosed :"+place);
}