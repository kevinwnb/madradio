var base_url = "http://localhost/";
var api_base_url = "http://localhost/";

// Login
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
          window.location.replace(base_url + "inicio.php");
        } else {
          alert(data.msg);
        }
      });
  });
}

// Regístro
if (document.querySelector("#register-btn")) {
  document
    .querySelector("#register-btn")
    .addEventListener("click", function () {
      let fields = {
        nombre: document.querySelector("#nombre").value,
        email: document.querySelector("#email").value,
        password: document.querySelector("#password").value,
        repeat_password: document.querySelector("#repeat_password").value,
      };

      if (validate(fields)) {
        fetch(api_base_url + "api/register.php", {
          method: "POST",
          body: JSON.stringify(fields),
        })
          .then((res) => res.json())
          .then((data) => {
            if (data.status) {
              alert(data.msg);
              window.location.replace(base_url + "login.php");
            } else {
              alert(data.msg);
            }
          });
      }
    });
}

//Logout
if (document.querySelector("#btn-salir")) {
  document.querySelector("#btn-salir").addEventListener("click", function () {
    fetch(base_url + "api/logout.php")
      .then((res) => res.json())
      .then((data) => window.location.replace(base_url + "inicio.php"));
  });
}

// Mostrar Usuarios
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
          a.href = "modificar.php?id=" + item.id;
          a.innerText = "Modificar";
          a.classList.add("m-2");
          td_acciones.appendChild(a);

          a = document.createElement("a");
          a.href = "javascript:void(0)";
          a.innerText = "Eliminar";
          a.classList.add("m-2");
          a.setAttribute("data-bs-toggle", "modal");
          a.setAttribute("data-bs-target", "#exampleModal");
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

  document.querySelector("#crear-btn").addEventListener("click", function () {
    window.location.href(base_url + "admin/crear.php");
  });
}

// Eliminar Usuario
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

// Modificar Usuario
if (document.querySelector("#modify-user-form")) {
  let url_string = window.location.href;
  let url = new URL(url_string);
  let id = url.searchParams.get("id");

  fetch(api_base_url + "api/admin/usuarios/read.php?id=" + id)
    .then((res) => res.json())
    .then((data) => {
      document.querySelector("#nombre").value = data.nombre;
      document.querySelector("#email").value = data.email;

      var option = document.createElement("option");
      option.value = data.role_id;
      option.innerText = data.role;
      option.selected = "selected";
      document.querySelector("#role_id").appendChild(option);

      if (data.role_id == 1) {
        option = document.createElement("option");
        option.value = 2;
        option.innerText = "Cliente";
        document.querySelector("#role_id").appendChild(option);
      } else {
        option = document.createElement("option");
        option.value = 1;
        option.innerText = "Administrador";
        document.querySelector("#role_id").appendChild(option);
      }
    });

  document.querySelector("#update-btn").addEventListener("click", function () {
    let fields = {
      id: id,
      nombre: document.querySelector("#nombre").value,
      email: document.querySelector("#email").value,
      role_id: document.querySelector("#role_id").value,
      password: document.querySelector("#password").value,
      repeat_password: document.querySelector("#repeat-password").value,
    };

    if (validate(fields)) {
      fetch(api_base_url + "api/admin/usuarios/update.php", {
        method: "POST",
        body: JSON.stringify(fields),
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status) {
            window.location.href = base_url + "admin/dashboard.php";
          } else {
            alert(data.msg);
          }
        });
    }
  });

  document.querySelector("#cancel-btn").addEventListener("click", function () {
    window.location.href = base_url + "admin/dashboard.php";
  });
}

// Crear Usuario
if (document.querySelector("#create-user-form")) {
  document.querySelector("#create-btn").addEventListener("click", function () {
    let fields = {
      nombre: document.querySelector("#nombre").value,
      email: document.querySelector("#email").value,
      role_id: document.querySelector("#role_id").value,
      password: document.querySelector("#password").value,
      repeat_password: document.querySelector("#repeat_password").value,
    };
    if (validate(fields)) {
      fetch(api_base_url + "api/admin/usuarios/create.php", {
        method: "POST",
        body: JSON.stringify(fields),
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status) {
            window.location.href = base_url + "admin/dashboard.php";
          } else {
            alert(data.msg);
          }
        });
    }
  });

  document.querySelector("#cancel-btn").addEventListener("click", function () {
    window.location.href = base_url + "admin/dashboard.php";
  });
}

// Mostrar Publicaciones Usuario
if (document.querySelector("#tabla-publicaciones-usuario")) {
  let url_string = window.location.href;
  let url = new URL(url_string);
  let id = url.searchParams.get("id");

  fetch(api_base_url + "api/publicaciones/all-by-user.php")
    .then((res) => res.json())
    .then((data) => {
      if (data.status) {
        data.publicaciones.forEach((item) => {
          var tr = document.createElement("tr");
          var th = document.createElement("th");
          th.scope = "row";
          var img = document.createElement("img");
          img.src = item.url_imagen;
          img.style.width = "150px";
          th.appendChild(img);
          var td_titulo = document.createElement("td");
          var td_fecha = document.createElement("td");
          var td_acciones = document.createElement("td");
          td_titulo.innerText = item.titulo;
          td_fecha.innerText = item.fecha;
          var a = document.createElement("a");
          a.href = "modificar.php?id=" + item.id;
          a.innerText = "Modificar";
          a.classList.add("m-2");
          td_acciones.appendChild(a);

          a = document.createElement("a");
          a.href = "javascript:void(0)";
          a.innerText = "Eliminar";
          a.classList.add("m-2");
          a.setAttribute("data-bs-toggle", "modal");
          a.setAttribute("data-bs-target", "#exampleModal");
          a.addEventListener("click", function () {
            document
              .querySelector("#confirm-delete-pub")
              .setAttribute("data-idpublicacion", item.id);
          });
          td_acciones.appendChild(a);

          tr.appendChild(th);
          tr.appendChild(td_titulo);
          tr.appendChild(td_fecha);
          tr.appendChild(td_acciones);

          document
            .querySelector("#tabla-publicaciones-usuario tbody")
            .appendChild(tr);
        });
      } else {
        alert(data.msg);
      }
    });

  document.querySelector("#crear-btn").addEventListener("click", function () {
    window.location.href(base_url + "admin/crear.php");
  });
}

// Eliminar publicacion
if (document.querySelector("#confirm-delete-pub")) {
  document
    .querySelector("#confirm-delete-pub")
    .addEventListener("click", function () {
      fetch(api_base_url + "api/publicaciones/delete.php", {
        method: "POST",
        body: JSON.stringify({
          id: document.querySelector("#confirm-delete-pub").dataset
            .idpublicacion,
        }),
      })
        .then((res) => res.json())
        .then((data) => window.location.reload());
    });
}

// Crear Publicación
if (document.querySelector("#create-pub-form")) {
  fetch(api_base_url + "api/generos/all.php")
    .then((res) => res.json())
    .then((data) => {
      data.generos.forEach((item) => {
        var option = document.createElement("option");
        option.value = item.id;
        option.innerText = item.nombre;
        document.querySelector("#id_genero").appendChild(option);
      });
    });

  document.querySelector("#create-btn").addEventListener("click", function () {
    let fields = {
      titulo: document.querySelector("#titulo").value,
      descripcion: document.querySelector("#descripcion").value,
      etiquetas: document.querySelector("#etiquetas").value,
      id_categoria: document.querySelector("#id_categoria").value,
      id_genero: document.querySelector("#id_genero").value,
    };

    let files = {
      imagen: document.querySelector("#imagen").files[0],
      audio: document.querySelector("#audio").files[0],
    };

    if (validate(fields) & validateFiles(files)) {
      let formData = new FormData();
      formData.append("json", JSON.stringify(fields));

      formData.append("imagen", document.querySelector("#imagen").files[0]);
      formData.append("audio", document.querySelector("#audio").files[0]);

      fetch(api_base_url + "api/publicaciones/create.php", {
        method: "POST",
        body: formData,
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status) {
            window.location.href = base_url + "publicaciones/mi-contenido.php";
          } else {
            alert(data.msg);
          }
        });
    }
  });

  document.querySelector("#cancel-btn").addEventListener("click", function () {
    window.location.href = base_url + "publicaciones/mi-contenido.php";
  });
}

// Modificar Publicación
if (document.querySelector("#modify-pub-form")) {
  let url_string = window.location.href;
  let url = new URL(url_string);
  let id = url.searchParams.get("id");

  let id_categoria = null;
  let id_genero = null;

  fetch(api_base_url + "api/publicaciones/read.php?id=" + id)
    .then((res) => res.json())
    .then((data) => {
      document.querySelector("#titulo").value = data.titulo;
      document.querySelector("#descripcion").value = data.descripcion;
      document.querySelector("#etiquetas").value = data.etiquetas;
      id_categoria = data.id_categoria;
      id_genero = data.id_genero;
    });

  fetch(api_base_url + "api/categorias/all.php")
    .then((res) => res.json())
    .then((data) => {
      data.categorias.forEach((item) => {
        var option = document.createElement("option");
        option.value = item.id;
        option.innerText = item.nombre;
        if (item.id == id_categoria) {
          option.selected = "selected";
        }
        document.querySelector("#id_categoria").appendChild(option);
      });
    });

  fetch(api_base_url + "api/generos/all.php")
    .then((res) => res.json())
    .then((data) => {
      data.generos.forEach((item) => {
        var option = document.createElement("option");
        option.value = item.id;
        option.innerText = item.nombre;
        if (item.id == id_genero) {
          option.selected = "selected";
        }
        document.querySelector("#id_genero").appendChild(option);
      });
    });

  document.querySelector("#modify-btn").addEventListener("click", function () {
    let fields = {
      id: id,
      titulo: document.querySelector("#titulo").value,
      descripcion: document.querySelector("#descripcion").value,
      etiquetas: document.querySelector("#etiquetas").value,
      id_categoria: document.querySelector("#id_categoria").value,
      id_genero: document.querySelector("#id_genero").value,
    };
    if (validate(fields)) {
      let formData = new FormData();
      formData.append("json", JSON.stringify(fields));

      formData.append("imagen", document.querySelector("#imagen").files[0]);
      formData.append("audio", document.querySelector("#audio").files[0]);
      fetch(api_base_url + "api/publicaciones/update.php", {
        method: "POST",
        body: formData,
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status) {
            window.location.href = base_url + "publicaciones/mi-contenido.php";
          } else {
            alert(data.msg);
          }
        });
    }
  });

  document.querySelector("#cancel-btn").addEventListener("click", function () {
    window.location.href = base_url + "publicaciones/mi-contenido.php";
  });
}

if (document.querySelector("form#contacto")) {
  document
    .querySelector("button#send-btn")
    .addEventListener("click", function () {
      let fields = {
        nombre: document.querySelector("#nombre").value,
        email: document.querySelector("#email").value,
        telefono: document.querySelector("#telefono").value,
        mensaje: document.querySelector("#mensaje").value,
      };
      if (validate(fields)) {
        fetch(base_url + "api/contacto.php", {
          method: "POST",
          body: JSON.stringify(fields),
        })
          .then((res) => res.json())
          .then((data) => alert(data.msg));
      }
    });
}

if (document.querySelector(".explorar")) {
  if (document.querySelector("#btn_enviar")) {
    document
      .querySelector("#btn_enviar")
      .addEventListener("click", function () {
        let fields = {
          id_publicacion: parseInt(
            document.querySelector(".modal #id_publicacion").value
          ),
          comentario: document.querySelector("#comentario").value,
        };

        if (validate(fields)) {
          fetch(base_url + "api/comentarios/create.php", {
            method: "POST",
            body: JSON.stringify(fields),
          })
            .then((res) => res.json())
            .then((data) =>
              getComments(
                document.querySelector(".modal #id_publicacion").value
              )
            );
        }
      });
  }

  document.querySelectorAll(".btn-comment").forEach((e) => {
    e.addEventListener("click", function () {
      if (document.querySelector(".modal #id_publicacion")) {
        document.querySelector(".modal #id_publicacion").value = e.id
          .split("_")
          .pop();
      }
      getComments(e.id.split("_").pop());
    });
  });
}

function getComments(id_publicacion) {
  let id = parseInt(id_publicacion);
  document.querySelector(".modal .modal-body").innerHTML = "";
  fetch(base_url + "api/comentarios/all.php?id=" + id)
    .then((res) => res.json())
    .then((data) => {
      if (data.comentarios.length == 0) {
        let p = document.createElement("p");
        p.classList.add("d-block");
        p.classList.add("text-center");
        p.classList.add("m-3");
        p.innerText = "No hay comentarios";
        document.querySelector(".modal .modal-body").appendChild(p);
      } else {
        data.comentarios.forEach((c) => {
          let div = document.createElement("div");
          div.classList.add("p-3");
          div.classList.add("border");
          div.classList.add("rounded");
          div.classList.add("m-2");
          let div2 = document.createElement("div");
          div2.classList.add("d-flex");
          div2.classList.add("justify-content-between");
          let small = document.createElement("small");
          small.innerText = c.nombre_usuario;
          let small2 = document.createElement("small");
          small2.innerText = c.fecha;
          div2.appendChild(small);
          div2.appendChild(small2);
          div.appendChild(div2);
          let p = document.createElement("p");
          p.innerText = c.comentario;
          p.classList.add("m-2");
          div.appendChild(p);
          document.querySelector(".modal .modal-body").appendChild(div);
        });
      }
    });
}

function validate(fields) {
  document.querySelectorAll(".error").forEach((e) => e.remove());
  document
    .querySelectorAll(".form-control.border.border-danger")
    .forEach((e) => {
      e.classList.remove("border");
      e.classList.remove("border-danger");
    });
  let errores = 0;

  Object.keys(fields).forEach((key) => {
    if (
      document.querySelector("#" + key) &&
      document.querySelector("#" + key).hasAttribute("required") &&
      fields[key] == ""
    ) {
      errores++;
      document.querySelector("#" + key).classList.add("border");
      document.querySelector("#" + key).classList.add("border-danger");
      let small = document.createElement("small");
      small.innerText =
        document.querySelector("#" + key).previousElementSibling.innerText +
        " es requerido";
      small.classList.add("error");
      small.classList.add("text-danger");
      //li.classList.add("valid-feedback");
      document
        .querySelector("#" + key)
        .parentNode.insertBefore(
          small,
          document.querySelector("#" + key).nextSibling
        );
    }

    if (key == "id_categoria" && fields[key] == 0) {
      errores++;
      document.querySelector("#" + key).classList.add("border");
      document.querySelector("#" + key).classList.add("border-danger");
      let small = document.createElement("small");
      small.innerText =
        document.querySelector("#" + key).previousElementSibling.innerText +
        " es requerido";
      small.classList.add("error");
      small.classList.add("text-danger");
      //li.classList.add("valid-feedback");
      document
        .querySelector("#" + key)
        .parentNode.insertBefore(
          small,
          document.querySelector("#" + key).nextSibling
        );
    }

    if (key == "id_genero" && fields[key] == 0) {
      errores++;
      document.querySelector("#" + key).classList.add("border");
      document.querySelector("#" + key).classList.add("border-danger");
      let small = document.createElement("small");
      small.innerText =
        document.querySelector("#" + key).previousElementSibling.innerText +
        " es requerido";
      small.classList.add("error");
      small.classList.add("text-danger");
      //li.classList.add("valid-feedback");
      document
        .querySelector("#" + key)
        .parentNode.insertBefore(
          small,
          document.querySelector("#" + key).nextSibling
        );
    }

    if (key == "email" && (fields[key] != "") & !validateEmail(fields[key])) {
      errores++;
      document.querySelector("#" + key).classList.add("border");
      document.querySelector("#" + key).classList.add("border-danger");
      let small = document.createElement("small");
      small.innerText =
        document.querySelector("#" + key).previousElementSibling.innerText +
        " es inválido";
      small.classList.add("error");
      small.classList.add("text-danger");
      //li.classList.add("valid-feedback");
      document
        .querySelector("#" + key)
        .parentNode.insertBefore(
          small,
          document.querySelector("#" + key).nextSibling
        );
    }

    if (
      key == "password" &&
      fields[key] != "" &&
      fields["repeat_password"] != "" &&
      fields[key] != fields["repeat_password"]
    ) {
      errores++;
      document.querySelector("#" + key).classList.add("border");
      document.querySelector("#" + key).classList.add("border-danger");
      document.querySelector("#repeat_password").classList.add("border");
      document.querySelector("#repeat_password").classList.add("border-danger");
      let small = document.createElement("small");
      small.innerText =
        document.querySelector("#" + key).previousElementSibling.innerText +
        " no coincide";
      small.classList.add("error");
      small.classList.add("text-danger");
      //li.classList.add("valid-feedback");
      document
        .querySelector("#" + key)
        .parentNode.insertBefore(
          small,
          document.querySelector("#" + key).nextSibling
        );
      document
        .querySelector("#repeat_password")
        .parentNode.insertBefore(
          small,
          document.querySelector("#repeat_password").nextSibling
        );
    }
  });

  return errores == 0;
}

function validateFiles(files) {
  let errores = 0;
  Object.keys(files).forEach((key) => {
    if (
      document.querySelector("#" + key).hasAttribute("required") &&
      files[key] == undefined
    ) {
      errores++;
      document.querySelector("#" + key).classList.add("border");
      document.querySelector("#" + key).classList.add("border-danger");
      let small = document.createElement("small");
      small.innerText =
        document.querySelector("#" + key).previousElementSibling.innerText +
        " es requerido";
      small.classList.add("error");
      small.classList.add("text-danger");
      //li.classList.add("valid-feedback");
      document
        .querySelector("#" + key)
        .parentNode.insertBefore(
          small,
          document.querySelector("#" + key).nextSibling
        );
    }
  });

  return errores == 0;
}

function validateEmail(email) {
  const re =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}
