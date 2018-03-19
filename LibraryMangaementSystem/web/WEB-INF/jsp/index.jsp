<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Welcome to Spring Web MVC project</title>
    </head>

    <body>
        <h1>${message}</h1>
        <center>
        <form action="library.htm" method="post">
            Employee UserName:<input type="text" name="user_name" required/> <br>
            Password:<input type="password" name="password" required/><br>
            <input type="submit" value="Enter"/>
        </form>
            <a href="employee.htm">Resgister New Employee</a>
        </center>
    </body>
</html>
