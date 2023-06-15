<?php
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
$sqlSeries = "INSERT INTO series_tv (titulo, canal, genero) VALUES
    ('Série 1', 'Canal 1', 'Gênero 1'),
    ('Série 2', 'Canal 2', 'Gênero 2'),
    ('Série 3', 'Canal 3', 'Gênero 3')";
$conn->query($sqlSeries);
$sqlIntervalos = "INSERT INTO series_tv_intervalos (id_serie_tv, dia_da_semana, horario) VALUES
    (1, 'Quinta-feira', '20:00:00'),
    (2, 'Sexta-feira', '19:30:00'),
    (3, 'Sabado', '21:15:00')";
$conn->query($sqlIntervalos);
$conn->close();
?>
