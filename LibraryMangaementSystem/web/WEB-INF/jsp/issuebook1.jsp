<%-- 
    Document   : issuebook1
    Created on : 30 Dec, 2016, 11:53:32 AM
    Author     : Pranab K Karmakar
--%>
<%@ taglib uri="http://www.springframework.org/tags/form" prefix="form"%>  
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>  
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Book Issue</title>
    </head>
    <body>
        <h3>${message}</h3>
    <form action="issuebook1.htm" method="post">
    <table> 
     <tr><td><center>Select User</center></td></tr>
      <tr><td><center><select name="userid">
        <c:forEach items="${users}" var="users">
            <option value="${users.userId}">${users.userId}->${users.name}</option>
        </c:forEach>
     </select></center></td></tr>
     </table>
        <input type="submit" value="Next">  
    </form>
        <a href="admin.htm">Back To Main</a><br>
    </body>
</html>
