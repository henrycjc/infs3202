<%
out.println(session);
if (session.getAttribute("auth") == null) {
	response.setStatus(response.SC_MOVED_TEMPORARILY);
    response.setHeader("Location", "index.jsp"); 
} else {
	session.setAttribute("auth", "0");
	response.setStatus(response.SC_MOVED_TEMPORARILY);
    response.setHeader("Location", "index.jsp"); 
}
%>