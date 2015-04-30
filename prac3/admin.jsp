<%@page import="java.io.*"%>
<%@page import="java.io.FileReader"%>
<%@page import="java.io.BufferedReader"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%!

public void overwriteInfo() throws IOException {

    File file = null;
    BufferedReader reader2 = null;
    FileWriter fw = null;
    String line;
    BufferedWriter bw = null;

    if (System.getProperty("os.name").startsWith("Windows")) {
        file = new File("H:\\Developer\\infs3202\\prac3\\data\\resdata");
    } else {
        file = new File("/var/www/htdocs/prac3/data/resdata");
    }
    fw = new FileWriter(file.getAbsoluteFile());
    bw = new BufferedWriter(fw);

    if (System.getProperty("os.name").startsWith("Windows")) {
        reader2 = new BufferedReader(new FileReader("H:\\Developer\\infs3202\\prac3\\data\\resdata_tmp"));
    } else {
        reader2 = new BufferedReader(new FileReader("/var/www/htdocs/prac3/data/resdata_tmp"));
    } 

    while((line = reader2.readLine()) != null) {
        bw.write(line + "\n");
    }
    bw.close();
}

public void updateInfo(int resNum, String name, String addr, String phone, String images, String desc) throws IOException {
    
    BufferedReader reader2 = null;
    StringBuilder sb = new StringBuilder();
    String line;
    String tmp = "";
    String[][] restaurants = new String[4][6];
    int i = -1;
    int j = 0;
    File file = null;
    FileWriter fw = null;
    BufferedWriter bw = null;

    if (System.getProperty("os.name").startsWith("Windows")) {
        file = new File("H:\\Developer\\infs3202\\prac3\\data\\resdata_tmp");
    } else {
        file = new File("/var/www/htdocs/prac3/data/resdata_tmp");
    }

    if (!file.exists()) {
        file.createNewFile();
    }

    if (System.getProperty("os.name").startsWith("Windows")) {
        reader2 = new BufferedReader(new FileReader("H:\\Developer\\infs3202\\prac3\\data\\resdata"));
    } else {
        reader2 = new BufferedReader(new FileReader("/var/www/htdocs/prac3/data/resdata"));
    } 
    fw = new FileWriter(file.getAbsoluteFile());
    bw = new BufferedWriter(fw);

    while((line = reader2.readLine()) != null) {
        if (line.startsWith("!!")) {
            i++;
            j = 0;
        } else {
            restaurants[i][j] = line.replaceAll("[\n\r]", "");
            j++;
        }
        if (i == resNum) {
            if (line.startsWith("NAME=")) {
                tmp = "NAME="+name+"\r\n";
            } else if (line.startsWith("ADDRESS=")) {
                tmp = "ADDRESS="+addr+"\r\n";
            } else if (line.startsWith("PHONE=")) {
                tmp = "PHONE="+phone+"\r\n";
            } else if (line.startsWith("IMAGES=")) {
                tmp = "IMAGES="+images+"\r\n";
            } else if (line.startsWith("DESC=")) {
                tmp = "DESC="+desc.replace("\n", "");
            } else if (line.startsWith("!!")) {
                tmp = line+"\r\n";
            }
            bw.write(tmp.replace("\n", ""));
        } else {
            bw.write(line+"\r\n");
        }
    }
    bw.close();
    overwriteInfo();
}

%>
<%

if (session.getAttribute("auth") == null) {
    response.setStatus(response.SC_MOVED_TEMPORARILY);
    response.setHeader("Location", "index.jsp"); 
} else if ((String)session.getAttribute("auth") == "0") {
    response.setStatus(response.SC_MOVED_TEMPORARILY);
    response.setHeader("Location", "index.jsp"); 
}

BufferedReader reader = null;
if (System.getProperty("os.name").startsWith("Windows")) {
    reader = new BufferedReader(new FileReader("H:\\Developer\\infs3202\\prac3\\data\\resdata"));
} else {
    reader = new BufferedReader(new FileReader("/var/www/htdocs/prac3/data/resdata"));
} 

StringBuilder sb = new StringBuilder();
String line;
String[][] restaurants = new String[4][6];
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
String form0 = request.getParameter("jform0");
String form1 = request.getParameter("jform1");
String form2 = request.getParameter("jform2");
String form3 = request.getParameter("jform3");
String newName = "";
String newAddress = "";
String newPhone = "";
String newImages = "";
String newDesc = "";
if (form0 != null) {
    if (form0 == "") {
        newName = request.getParameter("name0");
        newAddress = request.getParameter("address0");
        newPhone = request.getParameter("phone0");
        newImages = request.getParameter("images0");
        newDesc = request.getParameter("desc0");
        updateInfo(0, newName, newAddress, newPhone, newImages, newDesc);
        response.setStatus(response.SC_MOVED_TEMPORARILY);
        response.setHeader("Location", "admin.jsp"); 
    }
}

if (form1 != null) {
    if (form1 == "") {
        newName = request.getParameter("name1");
        newAddress = request.getParameter("address1");
        newPhone = request.getParameter("phone1");
        newImages = request.getParameter("images1");
        newDesc = request.getParameter("desc1");
        updateInfo(1, newName, newAddress, newPhone, newImages, newDesc);
        response.setStatus(response.SC_MOVED_TEMPORARILY);
        response.setHeader("Location", "admin.jsp"); 
    }
}

if (form2 != null) {
    if (form2 == "") {
        newName = request.getParameter("name2");
        newAddress = request.getParameter("address2");
        newPhone = request.getParameter("phone2");
        newImages = request.getParameter("images2");
        newDesc = request.getParameter("desc2");
        updateInfo(2, newName, newAddress, newPhone, newImages, newDesc);
        response.setStatus(response.SC_MOVED_TEMPORARILY);
        response.setHeader("Location", "admin.jsp"); 
    }
}

if (form3 != null) {
    if (form3 == "") {
        newName = request.getParameter("name3");
        newAddress = request.getParameter("address3");
        newPhone = request.getParameter("phone3");
        newImages = request.getParameter("images3");
        newDesc = request.getParameter("desc3");
        updateInfo(3, newName, newAddress, newPhone, newImages, newDesc);
        response.setStatus(response.SC_MOVED_TEMPORARILY);
        response.setHeader("Location", "admin.jsp"); 
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
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfCH7xjYSb_f6bzVgvuntHX-Fo7cITBgk"></script>
        <script>
            var options = {
                autoOpen: false,
                height: 700,
                width: 500,
                show: {
                    effect: "blind",
                    duration: 1000
                },
                hide: {
                    effect: "explode",
                    duration: 1000
                }};
            $(document).ready(function() {
                $("#dialog0").dialog(options);
                $("#dialog1").dialog(options);
                $("#dialog2").dialog(options);
                $("#dialog3").dialog(options);

                $("#edit0").click(function() {
                    console.log("clicked");
                    $("#dialog0").dialog("open");
                });
                $("#edit1").click(function() {
                    console.log("clicked");
                    $("#dialog1").dialog("open");
                });
                $("#edit2").click(function() {
                    console.log("clicked");
                    $("#dialog2").dialog("open");
                });
                $("#edit3").click(function() {
                    console.log("clicked");
                    $("#dialog3").dialog("open");
                });
            });
        </script>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="brand">
                    <span class="brand-name">Restaurant Finder</span> 
                </div>
                <div id="login">
                    <form class="navbar-login" id="logout" action="logout.jsp">
                        <button class="login-button">Logout</button>
                    </form>
                </div>
            </div>
            <div id="content">
                <div id="location">
                    <h2>Restaurants</h2>
                    <div class="restable">
                        <table border="1">
                            <% 
                                for (i = 0; i < restaurants.length; i++) {
                                    out.println("<tr><td>" + restaurants[i][0].replace("NAME=", "") + "</td><td><button id=\""+"edit"+i+"\">Edit</button></td></tr>");
                                }
                            %>
                        </table>
                    </div>
                    <div title="Dos Amigos" id="dialog0">
                        <form id="form0" action="admin.jsp" method="post">
                            <table style="text-align: right;">
                                <input type="hidden" name="jform0" id="jform0">
                                <tr><td>Name:</td><td><input type="text" id="name0" name="name0"value="<% out.println(restaurants[0][0].replace("NAME=", "")); %>"></td></tr>
                                <tr><td>Address:</td><td><input type="text" id="address0" name="address0"value="<% out.println(restaurants[0][1].replace("ADDRESS=", "")); %>"></td></tr>
                                <tr><td>Phone:</td><td><input type="text" id="phone0" name="phone0" value="<% out.println(restaurants[0][2].replace("PHONE=", "")); %>"></td></tr>
                                <tr><td>Images:</td><td><input type="text" id="images0" name="images0" value="<% out.println(restaurants[0][3].replace("IMAGES=", "")); %>"></td></tr>
                                <tr><td></td><td style="font-size: 10px;">Note, all images must be delimitered by a #.</td></tr>
                                <tr><td>Description</td></tr>
                                <tr><td></td><td><textarea rows="10" cols="25" type="text" id="desc0" name="desc0"><%out.println(restaurants[0][4].replace("DESC=", "").replace("\n", ""));%></textarea></td></tr>
                                <tr><td></td><td style="font-size: 10px;">New lines are represented by #s.</td></tr>
                                <tr><td><button id="form0savebtn">Save</button></td><td><button id="form0clearbtn">Clear</button></td>
                            </table>

                        </form>
                    </div>
                    <div id="dialog1">
                        <form id="form1" action="admin.jsp" method="post">
                            <table style="text-align: right;">
                                <input type="hidden" name="jform1" id="jform1">
                                <tr><td>Name:</td><td><input type="text" id="name1" name="name1" value="<% out.println(restaurants[1][0].replace("NAME=", "")); %>"></td></tr>
                                <tr><td>Address:</td><td><input type="text" id="address1" name="address1" value="<% out.println(restaurants[1][1].replace("ADDRESS=", "")); %>"></td></tr>
                                <tr><td>Phone:</td><td><input type="text" id="phone1" name="phone1" value="<% out.println(restaurants[1][2].replace("PHONE=", "")); %>"></td></tr>
                                <tr><td>Images:</td><td><input type="text" id="images1" name="images1" value="<% out.println(restaurants[1][3].replace("IMAGES=", "")); %>"></td></tr>
                                <tr><td></td><td style="font-size: 10px;">Note, all images must be delimitered by a #.</td></tr>
                                <tr><td>Description</td></tr>
                                <tr><td></td><td><textarea rows="10" cols="25" type="text" id="desc1" name="desc1"><% out.println(restaurants[1][4].replace("DESC=", "")); %></textarea></td></tr>
                                <tr><td></td><td style="font-size: 10px;">New lines are represented by #s.</td></tr>
                                <tr><td><button id="form1savebtn">Save</button></td><td><button id="form0clearbtn">Clear</button></td>
                            </table>

                        </form>
                    </div>
                    <div id="dialog2">
                        <form id="form2" action="admin.jsp" method="post">
                            <table style="text-align: right;">
                                <input type="hidden" name="jform2" id="jform2">
                                <tr><td>Name:</td><td><input type="text" id="name2" name="name2" value="<% out.println(restaurants[2][0].replace("NAME=", "")); %>"></td></tr>
                                <tr><td>Address:</td><td><input type="text" id="address2" name="address2" value="<% out.println(restaurants[2][1].replace("ADDRESS=", "")); %>"></td></tr>
                                <tr><td>Phone:</td><td><input type="text" id="phone2" name="phone2" value="<% out.println(restaurants[2][2].replace("PHONE=", "")); %>"></td></tr>
                                <tr><td>Images:</td><td><input type="text" id="images2" name="images2" value="<% out.println(restaurants[2][3].replace("IMAGES=", "")); %>"></td></tr>
                                <tr><td></td><td style="font-size: 10px;">Note, all images must be delimitered by a #.</td></tr>
                                <tr><td>Description</td></tr>
                                <tr><td></td><td><textarea rows="10" cols="25" type="text" id="desc2" name="desc2"><% out.println(restaurants[2][4].replace("DESC=", "")); %></textarea></td></tr>
                                <tr><td></td><td style="font-size: 10px;">New lines are represented by #s.</td></tr>
                                <tr><td><button id="form2savebtn">Save</button></td><td><button id="form0clearbtn">Clear</button></td>
                            </table>

                        </form>
                    </div>
                    <div id="dialog3">
                        <form id="form3" action="admin.jsp" method="post">
                            <table style="text-align: right;">
                                <input type="hidden" name="jform3" id="jform3">
                                <tr><td>Name:</td><td><input type="text" id="name3" name="name3" value="<% out.println(restaurants[3][0].replace("NAME=", "")); %>"></td></tr>
                                <tr><td>Address:</td><td><input type="text" id="address3" name="address3" value="<% out.println(restaurants[3][1].replace("ADDRESS=", "")); %>"></td></tr>
                                <tr><td>Phone:</td><td><input type="text" id="phone3" name="phone3" value="<% out.println(restaurants[3][2].replace("PHONE=", "")); %>"></td></tr>
                                <tr><td>Images:</td><td><input type="text" id="images3" name="images3" value="<% out.println(restaurants[3][3].replace("IMAGES=", "")); %>"></td></tr>
                                <tr><td></td><td style="font-size: 10px;">Note, all images must be delimitered by a #.</td></tr>
                                <tr><td>Description</td></tr>
                                <tr><td></td><td><textarea rows="10" cols="25" type="text" id="desc3" name="desc3"><% out.println(restaurants[3][4].replace("DESC=", "")); %></textarea></td></tr>
                                <tr><td></td><td style="font-size: 10px;">New lines are represented by #s.</td></tr>
                                <tr><td><button id="form3savebtn">Save</button></td><td><button id="form3clearbtn">Clear</button></td>
                            </table>

                        </form>
                    </div>
                </div>
                <div id="restaurants">
                    <h2>Control Panel</h2>
                    <div style="text-align: center;">
                        <form id="logoutform" name="logoutform" action="logout.jsp" method="post">
                            <button id="logoutbtn" name="logoutbtn">Logout</button> 
                        </form>
                    </div>
                    <br>
                    <br>
                    <div style="text-align: center;">
                        <a href="index.jsp">Go back?</a>
                    </div>

                </div>
            </div>
        </div> 
    </body>
</html>