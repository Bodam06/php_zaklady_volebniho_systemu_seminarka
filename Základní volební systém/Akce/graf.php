<?php
session_start();
include ('pripojeni.php'); 


if (!$connect) {
    die("Připojení selhalo: " . mysqli_connect_error());
}


$sql = "SELECT Jmeno AS Strana, Hlasy FROM user_data WHERE Standart = 'Strana'";
$result = $connect->query($sql);


if (!$result) {
    die("Chyba při provádění dotazu: " . $connect->error);
}


$Strany = [];
$Hlasy = [];


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $Strany[] = htmlspecialchars($row['Strana']); 
        $Hlasy[] = (int)$row['Hlasy'];
    }
} else {
    echo "<p class='text-center text-danger'>Žádná data k zobrazení.</p>";
}

$connect->close();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Výsledky voleb</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-color:rgb(255, 255, 255);
            color: #212529;
            font-family: 'Roboto', Arial, sans-serif;
        }
        h1 {
            text-align: center;
            color: #343a40;
            margin-top: 20px;
            margin-bottom: 40px;
        }
        canvas {
            display: block;
            margin: 0 auto;
            max-width: 800px; 
            max-height: 600px; 
        }
        footer {
            text-align: center;
            margin-top: 50px;
            font-size: 0.9rem;
            color: #6c757d;
        }
        .btn-custom {
            background-color: #343a40;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-custom:hover {
            background-color: #495057;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Výsledky voleb</h1>
        <canvas id="electionChart"></canvas>
        <div class="text-center mt-4">
            <a href="../">
                <button class="btn btn-custom">Zpátky</button>
            </a>
        </div>
    </div>

    <footer>
        <p></p>
    </footer>

    <script>
        
        const strany = <?php echo json_encode($Strany); ?>;
        const hlasy = <?php echo json_encode($Hlasy); ?>;

        
        const generateRandomColor = () => {
            const r = Math.floor(Math.random() * 256);
            const g = Math.floor(Math.random() * 256);
            const b = Math.floor(Math.random() * 256);
            return `rgba(${r}, ${g}, ${b}, 0.8)`; 
        };

        const colors = strany.map(() => generateRandomColor()); 

        // Konfigurace grafu
        const ctx = document.getElementById('electionChart').getContext('2d');
        const electionChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: strany, 
                datasets: [{
                    label: 'Počet hlasů',
                    data: hlasy, 
                    backgroundColor: colors, 
                    borderColor: colors.map(color => color.replace('0.8', '1')), 
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, 
                scales: {
                    y: {
                        beginAtZero: true, 
                        title: {
                            display: true,
                            text: 'Počet hlasů'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Strany'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false, 
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.raw} hlasů`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
