<?php
session_start();
include'usertable.php';
if(isset($_POST['submit'])&& $_POST['submit']=='Save'){
$firstname=(isset($_POST['FirstName']))?trim($_POST['FirstName']):'';
$lastname=(isset($_POST['LastName']))?trim($_POST['LastName']):'';
$emailid=(isset($_POST['Email_ID']))?trim($_POST['Email_ID']):'';
$gender=(isset($_POST['gender']))?trim($_POST['gender']):'';
$place=(isset($_POST['place']))?trim($_POST['place']):'';
$errors=array();
if(empty($firstname)){$errors[]="First Name is required.";}
if(empty($lastname)){$errors[]="Last Name is required.";}
if(empty($emailid)){$errors[]="Email ID is required.";}
if(empty($gender)){$errors[]="Gender is required.";}
if(empty($place)){$errors[]="Place is required.";}
if(count($errors)>0){
echo'<p>';
echo'Please fix the following errors.';
echo'<ul>';
foreach($errors as $error){
echo'<li>';
echo$error;
echo'</li>';
}
echo'</ul>';
echo'</p>';
die();
}
else{
$query='UPDATE users_details
        SET 
		Name="'.$firstname.'",
		Last_Name="'.$lastname.'",
		email_id="'.$emailid.'",
		gender="'.$gender.'",
		place="'.$place.'"
		WHERE
		username="'.$_SESSION['username'].'"';
mysql_query($query,$db) or die(mysql_error());
}
?>
<html>
<head>
<title>
Personal Information
</title>
</head>
<body style="background-image: url(image/background.jpg)">
<h1>Hi! <?php echo$_SESSION['username'];?>,Your Updated Personal Information Is Following:-</h1>
<table  width="100%" height="40%" >
<tr>
<?php
$query='SELECT* FROM users_details
        WHERE
		username="'.$_SESSION['username'].'"';
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_array($result);
extract($row);		
?>
<td align="middle">First Name:</td><td><?php echo$Name;?></td>
</tr>
<tr>
<td align="middle">Last Name:</td><td><?php echo$Last_Name;?></td>
</tr>
<tr>
<td align="middle">User-Name:</td><td><?php echo$username;?></td>
</tr>
<tr>
<td align="middle">Email-ID:</td><td><?php echo$email_id;?></td>
</tr>
<tr>
<td align="middle">Gender:</td><td><?php echo$gender;?></td>
</tr>
<tr>
<td align="middle">Place:</td><td><?php echo$place;?></td>
</tr>
</table>
</body>
</html>
<?php } else{?>
<html>
<head>
<title>
Personal Information
</title>
<script type="text/javascript">
function show_det(){
var a=document.createElement('form');
a.setAttribute("method","post");
a.setAttribute("href","account.php");
var b=document.createElement('table');
b.setAttribute("width","100%");
b.setAttribute("height","40%");
var c=document.createElement('tr');
var d=document.createElement('td');
d.innerHTML="First-Name:";
d.setAttribute("align","middle");
var e=document.createElement('td');
var f=document.createElement('input');
f.setAttribute("type","text");
f.setAttribute("name","FirstName");
e.appendChild(f);
c.appendChild(d);
c.appendChild(e);
var g=document.createElement('tr');
var h=document.createElement('td');
h.innerHTML="Last-Name:";
h.setAttribute("align","middle");
var i=document.createElement('td');
var j=document.createElement('input');
j.setAttribute("type","text");
j.setAttribute("name","LastName");
i.appendChild(j);
g.appendChild(h);
g.appendChild(i);
var s=document.createElement('tr');
var t=document.createElement('td');
t.setAttribute("align","middle");
t.innerHTML="Gender:";
var u=document.createElement('td');
var v=document.createElement('input');
v.setAttribute("type","text");
v.setAttribute("name","gender");
u.appendChild(v);
s.appendChild(t);
s.appendChild(u);
var w=document.createElement('tr');
var x=document.createElement('td');
x.innerHTML="Place:";
x.setAttribute("align","middle");
var y=document.createElement('td');
var z=document.createElement('input');
z.setAttribute("type","text");
z.setAttribute("name","place");
y.appendChild(z);
w.appendChild(x);
w.appendChild(y);
var k=document.createElement('tr');
var l=document.createElement('td');
l.setAttribute("align","middle");
var m=document.createElement('input');
m.setAttribute("type","submit");
m.setAttribute("name","submit");
m.setAttribute("value","Save");
l.appendChild(m);
var n=document.createElement('td');
k.appendChild(l);
k.appendChild(n);
var aa=document.createElement('tr');
var bb=document.createElement('td');
bb.innerHTML="Email-ID:";
bb.setAttribute("align","middle");
var cc=document.createElement('td');
var dd=document.createElement('input');
dd.setAttribute("type","text");
dd.setAttribute("name","Email_ID");
cc.appendChild(dd);
aa.appendChild(bb);
aa.appendChild(cc);
b.appendChild(c);
b.appendChild(g);
b.appendChild(aa);
b.appendChild(s);
b.appendChild(w);
b.appendChild(k);
a.appendChild(b);
document.body.appendChild(a);
}
</script>
</head>
<body style="background-image: url(image/background.jpg)">
<h1>Hi! <?php echo$_SESSION['username'];?>,Your Personal Information Is Following:-</h1>
<table  width="100%" height="40%" >
<tr>
<?php
$query='SELECT* FROM users_details
        WHERE
		username="'.$_SESSION['username'].'"';
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_array($result);
extract($row);		
?>
<td align="middle">First Name:</td><td><?php echo$Name;?></td>
</tr>
<tr>
<td align="middle">Last Name:</td><td><?php echo$Last_Name;?></td>
</tr>
<tr>
<td align="middle">User-Name:</td><td><?php echo$username;?></td>
</tr>
<tr>
<td align="middle">Email-ID:</td><td><?php echo$email_id;?></td>
</tr>
<tr>
<td align="middle">Gender:</td><td><?php echo$gender;?></td>
</tr>
<tr>
<td align="middle">Place:</td><td><?php echo$place;?></td>
</tr>
<tr><td align="middle"><input type="button" name="Edit" value="Edit" onclick="show_det()" /></td>
<td></td></tr>
</table>
</body>
</html>
<?php 
} 
?>