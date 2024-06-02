function deleteDoctor(id) {
    var confirmation = confirm("Are you sure?");
    if(confirmation) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(xhttp.readyState = 4 && xhttp.status == 200)
          document.getElementById('doctors_div').innerHTML = xhttp.responseText;
      };
      xhttp.open("GET", "php/manage_doctor.php?action=delete&id=" + id, true);
      xhttp.send();
    }
  }
  
  function editDoctor(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(xhttp.readyState = 4 && xhttp.status == 200)
        document.getElementById('doctors_div').innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "php/manage_doctor.php?action=edit&id=" + id, true);
    xhttp.send();
  }
  
  function updateDoctor(id) {
    var doctor_name = document.getElementById("doctor_name");
    // var supplier_email = document.getElementById("supplier_email");
    var contact_number = document.getElementById("doctor_contact_number");
    var doctor_address = document.getElementById("doctor_address");
    if(!validateName(doctor_name.value, "name_error"))
      doctor_name.focus();
    else if(!validateContactNumber(contact_number.value, "contact_number_error"))
      contact_number.focus();
    else if(!validateAddress(doctor_address.value, "address_error"))
     doctor_address.focus();
    else {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(xhttp.readyState = 4 && xhttp.status == 200)
          document.getElementById('doctor_div').innerHTML = xhttp.responseText;
      };
      xhttp.open("GET", "php/manage_doctor.php?action=update&id=" + id + "&name=" + doctor_name.value + "&contact_number=" + contact_number.value + "&address=" + doctor_address.value, true);
      xhttp.send();
    }
  }
  
  function cancel() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(xhttp.readyState = 4 && xhttp.status == 200)
        document.getElementById('doctors_div').innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "php/manage_doctor.php?action=cancel", true);
    xhttp.send();
  }
  
  function searchDoctor(text) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(xhttp.readyState = 4 && xhttp.status == 200)
        document.getElementById('doctors_div').innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "php/manage_doctor.php?action=search&text=" + text, true);
    xhttp.send();
  }
  