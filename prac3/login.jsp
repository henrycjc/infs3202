<% 
String user = request.getParameter("username");
String pass = request.getParameter("password");
int badFlag = 0;

if ((user != null) || (pass != null)) {
    if (user != null) {
        if (user.equals("admin")) {
            if (pass != null) {
                if (pass.equals("password")) {
                    session.setAttribute("auth", "1");
                    response.setStatus(response.SC_MOVED_TEMPORARILY);
                    response.setHeader("Location", "admin.jsp"); 
                } else {
                    badFlag = 1;
                }
            }
        } else {
            badFlag = 1;
        }
    }
}
%>
<!doctype html>
<!-- INFS3202 Practical 3 Solution by Henry Chladil (UQ 42934673) -->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="A restaurant finder app to help you find a nice place to eat in Indooroopilly or Taringa, Brisbane, Queensland, Australia.">
        <meta name="keywords" content="Restaurant Finder, Restaurant, Find, Eat, Eat Out, Brisbane, Indooroopilly, Taringa, Food, Thai Food, Italian Food, Tapas, Mexican Food, Japanese Food, Laksa Hut, Dos Amigos, Royal Sri Thai Restaurant, Harajuku Gyoza">
        <title>Restaurant Finder</title>
        <link rel="stylesheet" href="css/main.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <script src="js/jquery-2.1.3.min.js"></script>
        <style>
            html, body {
                background: white;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <div id="content">
                <div id="login-page">
                    <h2>Admin Login</h2>
                    <% if (badFlag == 1) { out.println("Incorrect username or password"); } %>
                    <form id="login-form" action="#" method="post">
                        <input id="username" name="username" type="text" placeholder="Email/Username"><br>
                        <input id="password" name="password" type="password" placeholder="Password"><br>
                        <button id="login-form-btn" name="login-form-btn" value="submit">Login</button>
                    </form>
                </div>
            </div>
        </div> 
        <p style="text-align: center;"><a href="index.jsp">Go back?</a></p>
    </body>
    <script>
            $(document).ready(function() {
                $('#login-form-btn').click(function() {
                    if ($("#username").val() === "") {
                        if ($("#password").val() === "") {

                        }
                    }
                });
            });
        </script>
</html>
