<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminární práce - volební systém</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    a h1 {
    text-decoration: none;
}

</style>
<body class="bg-dark">
    <a href="../"><h1 class ="text-center text-info p-3">Volební systém</h1></a>
    <div class="bg-info py-4">
        <h2 class="text-center">Přihlášení</h2>
        <div class="container text-center">
            <form action="./Akce/login.php" method="POST" >
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" name="Jmeno" placeholder="Zadejte Vaš jmeno" required = "required" >
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control w-50 m-auto" name="email" placeholder="Zadejte email" required = "required" >
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto" name="Heslo" placeholder="Zadejte heslo" required = "required" >
                </div>

                <div class="mb-3">
                    <select name="stb"class ="form-select w-50 m-auto">
                        <option value="Volič">Volič</option>
                        <option value="Strana">Strana</option>
                    </select>
                </div>
                <button type = "submit" class="btn btn-primary my-4 "> Login</button>
                <p>Nemáte učet? <a href="./Regi/Registrace.php" class ="text-white"	>Registrujte se tady</a></p><br>
                <p>Výsledky <a href="Akce/graf.php" class ="text-white"	>zde</a></p>


                
            </form>

    </div>
</body>
</html>