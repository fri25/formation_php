<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script>
        async function login(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById("loginForm"));
            const response = await fetch("process_login.php", {
                method: "POST",
                body: formData
            });
            const data = await response.json();
            if (data.jwt) {
                localStorage.setItem("jwt", data.jwt);
                window.location.href = "protected.php";
            } else {
                alert("Échec de la connexion !");
            }
        }
    </script>
</head>
<body>
    <form id="loginForm" onsubmit="login(event)">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
