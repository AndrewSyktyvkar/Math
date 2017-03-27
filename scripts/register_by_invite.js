function try_register_by_invite() {
        var form_email = document.forms["reg_form"]["email"].value;
        var form_passwd = document.forms["reg_form"]["passwd"].value;
        var form_invite = document.forms["reg_form"]["invite"].value;
        alerts.innerHTML = "";
        alerts.style.display = "none";
        $.post("/math/views/register/try_register.php", { email:form_email, passwd:form_passwd, invite:form_invite },  
                function(data) {
                  if (data != "OK") {
                    alerts.style.display = "";
                    alerts.innerHTML = data;
                  } else 
                    window.location.href = "index.php";
                });
          
      }