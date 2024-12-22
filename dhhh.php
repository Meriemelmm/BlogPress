<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evolution des Vues dans le Temps</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <h2>Évolution des vues dans le temps</h2>
    <canvas id="myChart" width="400" height="200"></canvas>

    <script>
        // Données simulées : Dates et Vues
        const dates = ["2024-12-01", "2024-12-02", "2024-12-03", "2024-12-04", "2024-12-05"];
        const vues = [150, 200, 250, 300, 350];

        // Configuration du graphique
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line', // Type de graphique (ici un graphique linéaire)
            data: {
                labels: dates, // Les dates sur l'axe des X
                datasets: [{
                    label: 'Vues', // Légende pour les vues
                    data: vues, // Les valeurs des vues
                    borderColor: 'rgba(75, 192, 192, 1)', // Couleur de la ligne
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Couleur de fond sous la ligne
                    fill: true, // Remplir sous la courbe
                    tension: 0.4 // Tension de la courbe (pour la rendre plus fluide)
                }]
            },
            options: {
                responsive: true, // Graphique responsive (s'adapte à la taille de l'écran)
                scales: {
                    x: {
                        type: 'category', // Type d'échelle pour l'axe X (dates)
                        title: {
                            display: true,
                            text: 'Date' // Titre de l'axe X
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Nombre de Vues' // Titre de l'axe Y
                        },
                        beginAtZero: true // Commencer l'axe Y à zéro
                    }
                }
            }
        });
    </script>

</body>
</html>

