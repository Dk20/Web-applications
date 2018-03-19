<%-- 
    Document   : employee
    Created on : 29 Dec, 2016, 11:48:42 AM
    Author     : Pranab K Karmakar
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <script>
function validateForm() {
    var x = document.forms["myForm"]["email_id"].value;
    var Name = document.forms["myForm"]["Name"].value;
    var Ph_no = document.forms["myForm"]["Ph_no"].value;
    var Pincode = document.forms["myForm"]["Pincode"].value;
    var alpha = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (!Name.match(alpha)) {
        alert('Invalid Name!!');       
        return false;
   }
        if(!Ph_no.match(/^\d{10}$/))
        {
        alert("Please enter 10 digit numeric characters for your Phone Number (Allowed input:0-9)");
        return false;
        }
        if(!Pincode.match(/^\d{6}$/))
        {
        alert("Please enter 6 digit numeric characters for your Pin Number (Allowed input:0-9)");
        return false;
        }
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
}
</script>
    </head>
    <body>
        <h1>${message}</h1>
        <center><div>
        <form name="myForm" action="addemployee.htm" method="post" onsubmit="return validateForm();">
            Employee Name:<input type="text" name="Name" required/> <br>
            Date of birth :<input type="date" name="DoB" required/> <br>
            Address:<input type="text" name="Address" required/> <br>
            Pincode:<input type="text" name="Pincode" required/> <br>
            Phone:<input type="text" name="Ph_no" required/> <br>
            Email id:<input type="text" name="email_id" required/> <br>
            user name:<input type="text" name="user_name" required/> <br>
            Password:<input type="password" name="password" required/> <br>          
            <input type="submit" value="Register"/>
        </form></div>
            <a href="admin.htm">Back To Main</a><br>
        </center>
    </body>
</html>
