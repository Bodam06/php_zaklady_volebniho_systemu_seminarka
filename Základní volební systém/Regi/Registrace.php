<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminární práce - volební systém - Registrace</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark">
<a href="../"><h1 class ="text-center text-info p-3">Volební systém</h1></a>
<div class="bg-info py-4">
        <h2 class="text-center">Registrace</h2>
        <div class="container text-center">
            <form action="../Akce/registr.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" name="Jmeno" placeholder="Zadejte Vaše jméno" required="required">
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control w-50 m-auto" name="email" placeholder="Zadejte Vaš email" required="required">
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto" name="Heslo" placeholder="Zadejte heslo" required="required" minlength="5">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto" name="Overeni_hesla" placeholder="Ověření hesla" required="required">
                </div>
                <br>
                <div class="mb-3">
                    <p>Zadejte fotografii</p>
                    <input type="file" class="form-control w-50 m-auto" name="Fotografie">
                </div>

                <div class="mb-3">
                    <p>Vyberte standart</p>
                    <select name="stb" class="form-select w-50 m-auto">
                        <option value="Volič">Volič</option>
                        <option value="Strana">Strana</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary my-4">Registrovat se</button>
                <p>Už jste zaregistrovaní? <a href="../prihlas.php" class="text-white">Přihlašte se zde</a></p>
            </form>
        </div> 
    </div>
</body>
</html>
