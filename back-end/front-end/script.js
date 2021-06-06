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

if (document.querySelector("#tabla-usuarios")) {
  fetch(api_base_url + "api/admin/usuarios/all.php")
    .then((res) => res.json())
    .then((data) => {
      if (data.status) {
        data.usuarios.forEach((item) => {
          var tr = document.createElement("tr");
          var th = document.createElement("th");
          th.scope = "row";
          th.innerText = item.id;
          var td_nombre = document.createElement("td");
          var td_email = document.createElement("td");
          var td_role = document.createElement("td");
          var td_acciones = document.createElement("td");
          td_nombre.innerText = item.nombre;
          td_email.innerText = item.email;
          td_role.innerText = item.role;
          var a = document.createElement("a");
          a.href = "modificar.html?id=" + item.id;
          a.innerText = "Modificar";
          a.classList.add("m-2");
          td_acciones.appendChild(a);

          a = document.createElement("a");
          a.href = "javascript:void(0)";
          a.innerText = "Eliminar";
          a.classList.add("m-2");
          a.setAttribute("data-toggle", "modal");
          a.setAttribute("data-target", "#exampleModal");
          a.addEventListener("click", function () {
            document
              .querySelector("#admin-confirm-delete-user")
              .setAttribute("data-idusuario", item.id);
          });
          td_acciones.appendChild(a);

          tr.appendChild(th);
          tr.appendChild(td_nombre);
          tr.appendChild(td_email);
          tr.appendChild(td_role);
          tr.appendChild(td_acciones);

          document.querySelector("#tabla-usuarios tbody").appendChild(tr);
        });
      } else {
        alert(data.msg);
      }
    });
}

if (document.querySelector("#admin-confirm-delete-user")) {
  document
    .querySelector("#admin-confirm-delete-user")
    .addEventListener("click", function () {
      fetch(
        api_base_url +
          "api/admin/usuarios/delete.php?id=" +
          document.querySelector("#admin-confirm-delete-user").dataset.idusuario
      )
        .then((res) => res.json())
        .then((data) => window.location.reload());
    });
}

if (document.querySelector("#admin-confirm-delete-user")) {
  document
    .querySelector("#admin-confirm-delete-user")
    .addEventListener("click", function () {
      fetch(
        api_base_url +
          "api/admin/usuarios/delete.php?id=" +
          document.querySelector("#admin-confirm-delete-user").dataset.idusuario
      )
        .then((res) => res.json())
        .then((data) => window.location.reload());
    });
}

if (document.querySelector("#modify-user-form")) {
  var url_string = window.location.href;
  var url = new URL(url_string);
  var id = url.searchParams.get("id");

  fetch(api_base_url + "api/admin/usuarios/read.php?id=" + id)
    .then((res) => res.json())
    .then((data) => {
      var option = document.createElement("option");
      option.value = data.role_id;
      option.innerText = data.role;
      option.selected = "selected";
      document.querySelector("#select-role").appendChild(option);

      if (data.role_id == 1) {
        option = document.createElement("option");
        option.value = 2;
        option.innerText = "Cliente";
        document.querySelector("#select-role").appendChild(option);
      } else {
        option = document.createElement("option");
        option.value = 1;
        option.innerText = "Administrador";
        document.querySelector("#select-role").appendChild(option);
      }
    });
}
