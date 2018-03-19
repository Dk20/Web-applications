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
                <th>USER ID</th>
                <th>NAME</th>
                <th>DATE OF BIRTH</th>
                <th>ADDRESS</th>
                <th>PINCODE</th>
                <th>PHONE NUMBER</th>
                <th>EMAIL ID</th>
                <th>AVAILABLE ISSUES</th>
                <th>EDIT</th>
                <th>DELETE</th>
                </tr>
            <c:forEach items="${userdetails}" var="userdetail">
                <tr>
                    <td><c:out value="${userdetail.userId}"/></td>
                    <td><c:out value="${userdetail.name}"/></td>
                    <td><c:out value="${userdetail.doB}"/></td>
                    <td><c:out value="${userdetail.address}"/></td>
                    <td><c:out value="${userdetail.pincode}"/></td>
                    <td><c:out value="${userdetail.phNo}"/></td>
                    <td><c:out value="${userdetail.emailId}"/></td>
                    <td><c:out value="${userdetail.availableIssues}"/></td>
                    <td><a href="edituser.htm?id=${userdetail.userId}">Edit</a></td>
                    <td><a href="dltuser.htm?id=${userdetail.userId}">Delete</a></td>
                    </tr>
            </c:forEach>
        </table>
        <a href="admin.htm">Back To Main</a><br>       
    </body>
</html>
