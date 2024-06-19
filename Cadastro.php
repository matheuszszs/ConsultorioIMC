<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Cadastro.css">
</head>

<body>
    <div class="container">
        <h1 class="titulo">Calculo de IMC</h1>
        <form action="Cadastro.php" method="POST">

            <div class="interativo">
                <label class="texto" for="nome">Nome do Paciente:</label>
                <input type="text" id="nome" step="1" name="nome" required><br><br>
                <label class="texto" for="anoNasc">Ano de Nascimento: </label>
                <input type="text" id="anoNasc" name="anoNasc" required><br><br>
                <label class="texto" for="peso">Peso: </label>
                <input type="number" id="peso" name="peso" required><br><br>
                <label class="texto" for="altura">Altura: </label>
                <input type="number" id="altura" name="altura" step="0.01" required><br><br>

            <div class="botoes">
                <input class="botao" type="submit" value="Imprimir">
                <input class="botao" type="reset" value="Limpar"><br><br>
            </div>
            </div>

        </form>

        <a href="Consultorio.php"><button class="botao">Voltar</button></a><br><br>

    </div>


    <div class="resposta">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['nome']) && isset($_POST['anoNasc']) && isset($_POST['peso']) && isset($_POST['altura'])) {
                $nome = $_POST['nome'];
                $anoNasc = $_POST['anoNasc'];
                $peso = $_POST['peso'];
                $altura = $_POST['altura'];

                $erro = empty($anoNasc) || empty($nome) || empty($peso) || empty($altura) ? "Todos os campos são obrigatórios!" :
                    ((!is_numeric($altura) || $altura <= 0) ? "Por favor insira valores válidos" : "");

                if ($erro) {
                    echo $erro;
                } else {
                    $imc = $peso / pow($altura, 2);
                    $classificacao = ($imc < 18.5) ? " $imc - Classificação: Abaixo do Peso" : (($imc < 24.9) ? " $imc - Classificação: Peso Normal" : (($imc < 29.9) ?
                        " $imc - Classificação: Sobre peso" : " $imc - Classificação: Obesidade"));
                    echo "<p style='border: 1px solid black; padding: 1.4rem; border-radius: 20px;'>$nome seu IMC é de $imc</p>";
                }
            }
        }
        ?>
    </div>
</body>

</html>