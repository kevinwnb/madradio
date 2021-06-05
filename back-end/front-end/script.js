var base_url = "http://localhost/front-end/";
var api_base_url = "http://localhost/";

if (document.querySelector("#login-btn")) {
  document.querySelector("#login-btn").addEventListener("click", function () {
    fetch(api_base_url + "api/login.php", {
      method: "POST",
      body: JSON.stringify({
        email: document.querySelector("#email").value,
        password: document.querySelector("#password").value,
      }),
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.status) {
          window.location.replace(base_url + "inicio.html");
        } else {
          alert(data.msg);
        }
      });
  });
}

if (document.querySelector("#register-btn")) {
  document
    .querySelector("#register-btn")
    .addEventListener("click", function () {
      fetch(api_base_url + "api/register.php", {
        method: "POST",
        body: JSON.stringify({
          nombre: document.querySelector("#nombre").value,
          email: document.querySelector("#email").value,
          password: document.querySelector("#password").value,
          repeat_password: document.querySelector("#repeat-password").value,
        }),
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status) {
            alert(data.msg);
            window.location.replace(base_url + "login.html");
          } else {
            alert(data.msg);
          }
        });
    });
}
