<%-- 
    Document   : insert
    Created on : 29 Dec, 2016, 1:09:48 PM
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
    
    
}
</script>
    </head>
    <body>
        <h1>${message}</h1>
        <center><div>
        <form name="myForm" action="insertbook.htm" method="post" onsubmit="return validateForm();">
            Book Name:<input type="text" name="bookname" required/> <br>
            Author Name :<input type="text" name="authorname" required/> <br>
            Number of Books Added:<input type="text" name="bookno" required/> <br>
            <input type="submit" value="Add Book"/>
        </form></div>
            <a href="admin.htm">Back To Main</a><br>
        </center>
    </body>
</html>
