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
        <title>${message}</title>
    </head>
    <body>
        <h1>${message}</h1>
        <table border="1">
            <tr>
                <th>BOOK ID</th>
                <th>STOCK ID</th>
                <th>BOOK NAME</th>
                <th>AUTHOR NAME</th>
             </tr>
            <c:forEach items="${bookdetails}" var="bookdetail">
                <tr>
                    <td><c:out value="${bookdetail.bookId}"/></td>
                    <td><c:out value="${bookdetail.stockId}"/></td>
                    <td><c:out value="${bookdetail.bookName}"/></td>
                    <td><c:out value="${bookdetail.authorName}"/></td>
            </c:forEach>
        </table>
        <a href="admin.htm">Back To Main</a><br>       
    </body>
</html>
