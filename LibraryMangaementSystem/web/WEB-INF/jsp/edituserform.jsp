<%-- 
    Document   : login
    Created on : Sep 28, 2016, 12:31:36 PM
    Author     : Admin
--%>

<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Edit Employee</title>
        <script>
function validateForm() {
    var x = document.forms["myForm"]["email"].value;
    var name = document.forms["myForm"]["name"].value;
    var ph = document.forms["myForm"]["ph"].value;
    var pin = document.forms["myForm"]["pin"].value;
    var alpha = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (!name.match(alpha)) {
        alert('Invalid Name!!');       
        return false;
   }
        if(!phone.match(/^\d{10}$/))
        {
        alert("Please enter 10 digit numeric characters for your Phone Number (Allowed input:0-9)");
        return false;
        }
        if(!pin.match(/^\d{6}$/))
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
        <h1>${message}</h1><div>
        <form name="myForm" action="editusersave.htm" method="post" onsubmit="return validateForm();">  
    <table>
        <c:forEach items="${userdetails}" var="login">
        <tr><td><center>User ID<input type="text" name="id" value="${login.userId}" readonly /></center</td></tr>
        <tr><td><center>Name<input type="text" name="name" value="${login.name}"  required/></center</td></tr>
        <tr><td><center>DAte of birth<input type="date" name="dob" value="${login.doB}"  required/></center</td></tr>
        <tr><td><center>Address<input type="text" name="address" value="${login.address}"  required/></center</td></tr>
        <tr><td><center>Pincode<input type="text" name="pin" value="${login.pincode}"  required/></center</td></tr>
        <tr><td><center>Phone number<input type="text" name="ph" value="${login.phNo}"  required/></center</td></tr>
        <tr><td><center>Email Id<input type="text" name="email" value="${login.emailId}"  required/></center</td></tr>
        <tr><td><center>Available Issues<input type="text" name="ai" value="${login.availableIssues}"  readonly/></center</td></tr>
        
</c:forEach> 
      </table>
      <table>
          <tr><td><center><input type="submit" value="Update" /></center></td></tr>  
      </table>
   </form></div>
       <a href="admin.htm">Back To Main</a><br>         
    </body>
</html>
