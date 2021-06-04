<head>

</head>

<body>
    <input id="user" type="text" />
    <input id="pass" type="password" />
    <button id="submit">Submit</button>
    <p id="titulo">
    </p>
    <p id="descripcion">
    </p>
    <script>
        document.querySelector("#submit").addEventListener("click", function() {
            fetch('http://localhost/api/login.php', {
                    method: "POST",
                    body: JSON.stringify({
                        email: "administrador@mail.com",
                        password: "123456"
                    })
                })
                .then(res => res.json())
                .then(data => {
                    document.querySelector("#descripcion").innerHTML = data.data.id_usuario;
                });
        });
    </script>
</body>