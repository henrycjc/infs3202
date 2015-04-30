<%@page import="java.io.FileReader"%>
<%@page import="java.io.BufferedReader"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
BufferedReader reader = null;
if (System.getProperty("os.name").startsWith("Windows")) {
    reader = new BufferedReader(new FileReader("H:\\Developer\\infs3202\\prac3\\data\\resdata"));
} else {
    reader = new BufferedReader(new FileReader("/var/www/htdocs/prac3/data/resdata"));
} 

StringBuilder sb = new StringBuilder();
String line;
String[][] restaurants = new String[4][5];
int i = -1;
int j = 0;
while((line = reader.readLine()) != null) {
    if (line.startsWith("!!")) {
        i++;
        j = 0;
    } else {
        restaurants[i][j] = line.replaceAll("[\n\r]", "");
        j++;
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
        <c:import url="data/resdata"/>
        <title>Restaurant Finder</title>
        <link rel="stylesheet" href="css/main.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfCH7xjYSb_f6bzVgvuntHX-Fo7cITBgk"></script>
        <script src="js/main.js"></script>
        
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="brand">
                    <span class="brand-name">Restaurant Finder</span> 
                </div>
                <div id="login">
                    <form class="navbar-login" id="login" action="login.jsp">
                        <button class="login-button">Login</button>
                    </form>
                </div>
            </div>
            <div id="content">
                <div id="location">
                    <h2>Location</h2>
                    <h4 style="text-align: center;">Welcome guest, you are in <span id="suburb">{{suburb}}</span></h4>
                    <div id="map-canvas">
                    </div>
                </div>
                <div id="restaurants">
                    <h2>Restaurants</h2>
                    <script>
                    var opts = {collapsible: true, active: false};
                    $(function() {
                        $("#accord0").accordion(opts);
                        $("#accord1").accordion(opts);
                        $("#accord2").accordion(opts);
                        $("#accord3").accordion(opts);
                    });
                    </script>
                    <table>
                        <tr>
                            <td>
                                <ul class="res">
                                    <li><% out.println(restaurants[0][0].replace("NAME=", "")); %></li>
                                        <ul class="nobullet">
                                            <li><% out.println(restaurants[0][1].replace("ADDRESS=", "")); %></li>
                                            <li><% out.println(restaurants[0][2].replace("PHONE=", "")); %></li>
                                            <li><div id="accord0">
                                                  <h3>More Info</h3>
                                                  <div>
                                                    <% out.println(restaurants[0][4].replace("DESC=", "").replace("#","<br>")); %>
                                                  </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                            <td> <% String[] images = restaurants[0][3].replace("IMAGES=","").split("#"); %>
                                <img alt="Dos Amigos" src="<% out.println(images[0]); %>" width="200">
                            </td>
                        </tr>
                        <tr>
                             <td>
                                <ul class="res">
                                    <li><% out.println(restaurants[1][0].replace("NAME=", "")); %></li>
                                        <ul class="nobullet">
                                            <li><% out.println(restaurants[1][1].replace("ADDRESS=", "")); %></li>
                                            <li><% out.println(restaurants[1][2].replace("PHONE=", "")); %></li>
                                            <li<div id="accord1">
                                                  <h3>More Info</h3>
                                                  <div>
                                                    <% out.println(restaurants[1][4].replace("DESC=", "").replace("#","<br>")); %>
                                                  </div></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                            <td> <% String[] images1 = restaurants[1][3].replace("IMAGES=","").split("#"); %>
                                <img alt="Laksa Hut" src="<% out.println(images1[0]); %>" width="200">
                            </td>
                        </tr>
                        <tr>
                             <td>
                                <ul class="res">
                                    <li><% out.println(restaurants[2][0].replace("NAME=", "")); %></li>
                                        <ul class="nobullet">
                                            <li><% out.println(restaurants[2][1].replace("ADDRESS=", "")); %></li>
                                            <li><% out.println(restaurants[2][2].replace("PHONE=", "")); %></li>
                                            <li><div id="accord2">
                                                  <h3>More Info</h3>
                                                  <div>
                                                    <% out.println(restaurants[2][4].replace("DESC=", "").replace("#","<br>")); %>
                                                  </div></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                            <td> <% String[] images2 = restaurants[2][3].replace("IMAGES=","").split("#"); %>
                                <a href="#" data-lightbox="thai" data-title="Royal Sri Thai">
                                <img alt="Royal Sri Thai" src="<% out.println(images2[0]); %>" width="200"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="res">
                                    <li><% out.println(restaurants[3][0].replace("NAME=", "")); %></li>
                                        <ul class="nobullet">
                                            <li><% out.println(restaurants[3][1].replace("ADDRESS=", "")); %></li>
                                            <li><% out.println(restaurants[3][2].replace("PHONE=", "")); %></li>
                                            <li><div id="accord3">
                                                  <h3>More Info</h3>
                                                  <div>
                                                    <% out.println(restaurants[3][4].replace("DESC=", "").replace("#","<br>")); %>
                                                  </div></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                            <td> <% String[] images3 = restaurants[3][3].replace("IMAGES=","").split("#"); %>
                                <a href="#" data-lightbox="thai" data-title="Royal Sri Thai">
                                <img alt="Royal Sri Thai" src="<% out.println(images3[0]); %>" width="200"></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div> 
    </body>
</html>