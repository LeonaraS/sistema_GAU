<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatórios | GAU</title>
    
    <link rel="stylesheet" href="./../../../node_modules/bootstrap/dist/css/bootstrap.min.css">

</head>
<body>

    <?php if ( ! isset ( $_GET [ "e" ] ) ): ?>

        <nav class="bg-dark p-3">
            <a class="btn btn-primary rounded-0 btn-sm" href="?e=true">Gerar PDF</a>
        </nav>

    <?php endif ?>

    <div class="text-center p-3">
        <p>
            GAU - <?= $name ?? "Relatórios" ?> <br/>
            <?= date ("d/m/Y") ?>
        </p>
    </div>

    <table class="table table-striped">
        <thead>
            <tr scope="col">
                <?php
                    if ( isset ( $header ) )
                    {
                        foreach ( $header as $item)
                        {
                            echo "<th>", $item, "</th>" ;
                        }
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                if ( isset ( $corpo ) AND isset ( $indices ) )
                {
                    foreach ($corpo as $linha )
                    {
                        echo "<tr>" ;
                            foreach ($indices as $dado)
                            {
                                echo "<td>{$linha->$dado}</td>" ;
                            }
                        echo "</tr>" ;
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>