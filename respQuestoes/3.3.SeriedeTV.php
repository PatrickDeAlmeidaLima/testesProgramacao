<?php
class SerieTV
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function obterProximaSerie($dataHora = null)
    {
        if ($dataHora === null) {
            $dataHora = date("Y-m-d H:i:s");
        }

        $sql = "SELECT st.titulo, st.canal, st.genero, sti.dia_da_semana, sti.horario
                FROM series_tv AS st
                JOIN series_tv_intervalos AS sti ON st.id = sti.id_serie_tv
                WHERE CONCAT(DATE(sti.horario), ' ', sti.horario) > '$dataHora'
                ORDER BY CONCAT(DATE(sti.horario), ' ', sti.horario) ASC
                LIMIT 1";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return null;
    }
}
$serieTV = new SerieTV($conn);
$proximaSerie = $serieTV->obterProximaSerie();
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Próxima Série de TV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h1>Próxima Série de TV</h1>

    <?php if ($proximaSerie !== null): ?>
        <p>
            <strong>Título:</strong> <?php echo $proximaSerie['titulo']; ?><br>
            <strong>Canal:</strong> <?php echo $proximaSerie['canal']; ?><br>
            <strong>Gênero:</strong> <?php echo $proximaSerie['genero']; ?><br>
            <strong>Dia da Semana:</strong> <?php echo $proximaSerie['dia_da_semana']; ?><br>
            <strong>Horário:</strong> <?php echo $proximaSerie['horario']; ?><br>
        </p>
    <?php else: ?>
        <p>Não há informações sobre a próxima série de TV.</p>
    <?php endif; ?>

    <script>
        var dataHoraAtual = new Date();
        var dataHoraFormatada = dataHoraAtual.toLocaleString();
        document.write("Data e Hora Atuais: " + dataHoraFormatada);
    </script>
</body>
</html>
