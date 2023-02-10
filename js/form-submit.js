function saveData() {
  // let formElement = document.getElementsByClassName('form-data');

  // for (let count = 0; count < formElement.length; count++) {
  //     form_data.append(formElement[count].name, formElement[count].value);
  // }

  // document.getElementById('submit').disabled = true;

  // get form elements
  const name1 = document.getElementById("name");
  const phone = document.getElementById("phone");
  const email = document.getElementById("email");
  const subject = document.getElementById("subject");
  const message = document.getElementById("message");
  const nameErr = document.getElementById("nameErr");
  const phoneErr = document.getElementById("phoneErr");
  const emailErr = document.getElementById("emailErr");
  const subjectErr = document.getElementById("subjectErr");
  // const msgErr = document.getElementById("msgErr");
  const error = document.querySelectorAll(".error");

  let form = document.getElementById("myForm");

  // listen to submit event
  // form.addEventListener("submit", function (e) {
  //   e.preventDefault();

  // reset error messages
  error.forEach(function (el) {
    el.textContent = "";
  });

  // validate name
  if (name1.value === "") {
    nameErr.textContent = "Name is required";
    name1.focus();
    return false;
  }

  // validate phone no
  if (phone.value === "") {
    phoneErr.textContent = "Phone number  is required";
    phone.focus();
    return false;
  }

  if (!/^\d{10}$/.test(phone.value)) {
    phoneErr.textContent = "Phone number must be 10 digits";
    phone.focus();
    return false;
  }

  // validate email
  if (email.value === "") {
    emailErr.textContent = "Email is required";
    email.focus();
    return false;
  }

  // check if email is valid
  if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)) {
    emailErr.textContent = "Email is not valid";
    email.focus();
    return false;
  }

  // validate subject
  if (subject.value === "") {
    subjectErr.textContent = "Subject is required";
    subject.focus();
    return false;
  }

  // validate name
  //   if (message.value === "") {
  //     msgErr.textContent = "Message is required";
  //     message.focus();
  //     return false;
  //   }

  // // form is valid
  // form.submit();

  let form_data = new FormData(form);

  let ajax_request = new XMLHttpRequest();

  ajax_request.open("POST", "./php/contactus.php", true);

  ajax_request.send(form_data);

  ajax_request.onreadystatechange = function () {
    if (ajax_request.readyState === this.DONE && ajax_request.status === 200) {
      // document.getElementById('submit').disabled = false;

      document.getElementById("myForm").reset();

      document.getElementById("alert").innerHTML = ajax_request.responseText;

      setTimeout(function () {
        document.getElementById("alert").innerHTML = "";
      }, 2000);
    }
  };

  // });
}

/*----------------------------------------Appointment---------------------------------------------------------*/

function appointData() {
  // let formElement = document.getElementsByClassName('form-data');

  // for (let count = 0; count < formElement.length; count++) {
  //     form_data.append(formElement[count].name, formElement[count].value);
  // }

  // document.getElementById('submit').disabled = true;

  // get form elements
  const service = document.getElementById("services");
  const date = document.getElementById("date");
  const time = document.getElementById("times");
  const name1 = document.getElementById("names");
  const phone = document.getElementById("phones");
  const email = document.getElementById("emails");
  // const promo = document.getElementById("promo-code");
  // const newsletter = document.getElementById("newsletter-cb");
  const serviceErr = document.getElementById("serviceErr");
  const dateErr = document.getElementById("dateErr");
  const timeErr = document.getElementById("timesErr");
  const nameErr = document.getElementById("namesErr");
  const phoneErr = document.getElementById("phonesErr");
  const emailErr = document.getElementById("emailsErr");
  const error = document.querySelectorAll(".error");

  let form = document.getElementById("form");

  // listen to submit event
  // form.addEventListener("submit", function (e) {
  //   e.preventDefault();

  // reset error messages
  error.forEach(function (el) {
    el.textContent = "";
  });

  // validate service
  if (service.value === "") {
    serviceErr.textContent = "Service is required";
    service.focus();
    return false;
  }

  // validate date
  if (date.value === "") {
    dateErr.textContent = "Date is required";
    date.focus();
    return false;
  }

  // validate time
  if (time.value === "") {
    timeErr.textContent = "Time is required";
    time.focus();
    return false;
  }

  // validate name
  if (name1.value === "") {
    nameErr.textContent = "Name is required";
    name1.focus();
    return false;
  }

  // validate phone no
  if (phone.value === "") {
    phoneErr.textContent = "Phone number  is required";
    phone.focus();
    return false;
  }

  if (!/^\d{10}$/.test(phone.value)) {
    phoneErr.textContent = "Phone number must be 10 digits";
    phone.focus();
    return false;
  }

  // validate email
  if (email.value === "") {
    emailErr.textContent = "Email is required";
    email.focus();
    return false;
  }

  // check if email is valid
  if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)) {
    emailErr.textContent = "Email is not valid";
    email.focus();
    return false;
  }

  // validate message
  //   if (message.value === "") {
  //     msgErr.textContent = "Message is required";
  //     message.focus();
  //     return false;
  //   }

  // // form is valid
  // form.submit();

  let form_data = new FormData(form);

  let ajax_request = new XMLHttpRequest();

  ajax_request.open("POST", "./php/appointment.php", true);

  ajax_request.send(form_data);

  ajax_request.onreadystatechange = function () {
    if (ajax_request.readyState === this.DONE && ajax_request.status === 200) {
      // document.getElementById('submit').disabled = false;

      document.getElementById("form").reset();

      document.getElementById("done").innerHTML = ajax_request.responseText;

      setTimeout(function () {
        document.getElementById("done").innerHTML = "";
      }, 20000);
    }
  };

  // });
}

//----------------------------------------------------------------------------------//

// window.onload = function () {
//   const popup = document.querySelectorAll(".popupForm");
//   popup.style.display = "block";
// };
