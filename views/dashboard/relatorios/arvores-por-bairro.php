<?php

    require __DIR__ . "/../../../source/Controllers/class.relatorio.php" ;
    require __DIR__ . "/../../../source/Controllers/class.db.php" ;

    require __DIR__ . "/../../../vendor/autoload.php" ;

    $db = DB::conexao() ;

    $get = $db->prepare ("SELECT * FROM bairro") ;
    $get->execute () ;
    $bairros = $get->fetchAll (PDO::FETCH_OBJ) ;

    $relatorio = new Relatorio ;

    $relatorio->nome ("Relatório das árvores por bairro") ;

    $relatorio->cabecalhos (
       ["Bairro", "Propulação", "Zona"], // colunas da tabela html
       ["nome", "populacao", "zona"] // colunar para puxar da tabela do banco
    ) ;
    $relatorio->corpo ( $bairros ) ;
    $relatorio->monta () ;

    // regras

    /**
     * Puxar os dados que vocês querem (fazer o select inclusive select de múltiplas tabelas)
     * Chamar o controller de Relatorio
     * passar um nome pro relatorio
     * passar o cabeçalho da tabela html e os indices que é pra percorrer e montar a tabela
     * passar os dados do select pro método $relatorio->corpo ( $osDadosDoSelect )
     * mandar montar: $relatorio->monta ()
    */