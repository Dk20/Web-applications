<%-- 
    Document   : login
    Created on : 28 Dec, 2016, 6:22:31 PM
    Author     : Pranab K Karmakar
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Library Management System</title>
    </head>
    <body>
    
        <h1>${message}</h1>
        <p>
        <ul>
            <li><a href="adduser.htm"/>Add User</a></li>
            <li><a href="userdisplay.htm"/>User Details Display</a></li>
            <li><a href="addbook.htm"/>Add Book</a></li>
            <li><a href="bookdisplay.htm"/> Display Book Details</a></li>
            <li><a href="issuebook.htm"/>Issue A Book</a></li>
            <li><a href="returnbook.htm"/>Return A Book</a></li>               
        </ul>
        </p>
        <a href="logout.htm">Log Out</a><br> 
      </body>
</html>
