function matchpass(){  
var firstpassword=document.f1.password.value;  
var secondpassword=document.f1.password2.value;   
if(firstpassword===secondpassword){  
return true;  
}  
else{  
alert("password must be same!");  
return false;  
}  
}  
function Validate() 
{
    var val = document.f1.name.value;
    
    if (!val.match(/^[a-zA-Z ]+$/)) 
    {
        alert('Only alphabets are allowed in Name Field');
        return false;
    }
    
    return true;
}
function phone(){
var val = document.f1.num.value;
if(isNaN(val))
{
alert("Enter the valid Mobile Number(Like : 9566137117)");
document.f1.num.focus();
return false;
}
return true;
}
function ValidateEmail()
{
var val = document.f1.Email.value;
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(val.value.match(mailformat))
{
document.f1.Email.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
document.f1.Email.focus();
return false;
}
}
date.max = new Date().toISOString().split("T")[0];

