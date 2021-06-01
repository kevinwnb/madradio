<head>

</head>

<body>
    <input id="user" type="text" />
    <input id="pass" type="password" />
    <button id="submit">Submit</button>
    <script>
        document.querySelector("#submit").addEventListener("click", function() {
            fetch('http://localhost/api/login.php', {
                    method: "POST",
                    body: JSON.stringify({
                        email: "cliente@mail.com",
                        password: "123456"
                    })
                })
                .then(res => res.json())
                .then(data => {
                    alert(JSON.stringify(data));
                });
        });
    </script>
</body>