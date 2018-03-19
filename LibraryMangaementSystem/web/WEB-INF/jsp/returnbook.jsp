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
        <title>Book Return</title>
    </head>
    <body>
        <h3>${message}</h3>
    <form action="returnbook1.htm" method="post">
    <table> 
        <tr><td><center>Select User</center></td></tr>
      <tr><td><center><select name="userid">
        <c:forEach items="${users}" var="users">
            <option value="${users.userId}">${users.userId}->${users.name}</option>
        </c:forEach>
     </select></center></td></tr>
     <tr><td><center>Select Book</center></td></tr>
      <tr><td><center><select name="stockid">
        <c:forEach items="${books}" var="books">
            <option value="${books.stockId}">${books.bookId}->${books.bookName}->${books.authorName}</option>
        </c:forEach>
     </select></center></td></tr>
    Date of return :<input type="date" name="dor" required/> <br>
    </table>
        <input type="submit" value="Return">  
    </form>
    <a href="admin.htm">Back To Main</a><br>
    </body>
</html>
