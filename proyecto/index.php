<head>

</head>

<body>
    <input id="user" type="text" />
    <input id="pass" type="password" />
    <button id="submit_login">Submit</button><br>

    <input id="titulo" type="text" placeholder="titulo" /><br>
    <input id="descripcion" type="text" placeholder="descripcion" /><br>
    <input id="etiquetas" type="text" placeholder="etiquetas" /><br>
    <input id="id_categoria" type="number" placeholder="id_categoria" /><br>
    <input id="id_genero" type="number" placeholder="id_genero" /><br>
    <input id="id_usuario" type="number" placeholder="id_usuario" /><br>
    <input id="imagen" type="file" placeholder="imagen" /><br>
    <input id="audio" type="file" placeholder="audio" /><br>
    <button id="submit_pub_create">Submit</button>
    <p id="msg"></p>

    <script>
        document.querySelector("#submit_login").addEventListener("click", function() {
            fetch('http://localhost/api/login.php', {
                    method: "POST",
                    body: JSON.stringify({
                        email: "administrador@mail.com",
                        password: "123456"
                    })
                })
                .then(res => res.json())
                .then(data => {
                    document.querySelector("#msg").innerHTML = data.msg;
                });
        });

        document.querySelector("#submit_pub_create").addEventListener("click", function() {
            var formData = new FormData();
            formData.append("json", JSON.stringify({
                titulo: document.querySelector("#titulo").value,
                descripcion: document.querySelector("#descripcion").value,
                etiquetas: document.querySelector("#etiquetas").value,
                id_categoria: document.querySelector("#id_categoria").value,
                id_genero: document.querySelector("#id_genero").value,
                id_usuario: document.querySelector("#id_usuario").value,
            }));
            formData.append('imagen', document.querySelector("#imagen").files[0]);
            formData.append('audio', document.querySelector("#audio").files[0]);
            fetch('http://localhost/api/publicaciones/create.php', {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    document.querySelector("#msg").innerHTML = data.msg;
                });
        });
    </script>
</body>