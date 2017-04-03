function send_request_for_invite() {
    var form_email = document.forms["req_form"]["email"].value;
	var form_name = document.forms["req_form"]["name"].value;
	var form_surname = document.forms["req_form"]["surname"].value;
    var form_message = document.forms["req_form"]["message"].value;
    alerts.innerHTML = "";
	alerts.style.display = "none";
    $.post("/math/views/request_invite/send_request.php", { email:form_email, name:form_name, surname:form_surname, message:form_message },
        function(data) {
			if (data != "OK") {
				alerts.style.display = "";
				alerts.innerHTML = data;
			} 
		});
}