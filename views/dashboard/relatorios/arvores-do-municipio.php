<?php

    require __DIR__ . "/../../../source/Controllers/class.relatorio.php" ;
    require __DIR__ . "/../../../source/Controllers/class.db.php" ;

    require __DIR__ . "/../../../vendor/autoload.php" ;

    $db = DB::conexao() ;

    $get = $db->prepare ("SELECT * FROM arvore") ;
    $get->execute () ;
    $arvores = $get->fetchAll (PDO::FETCH_OBJ) ;

    $relatorio = new Relatorio ;

    $relatorio->nome ("Relatório das árvores do município") ;

    $relatorio->cabecalhos (
       ["Altura da árvore", "Largura da árvore", "Data da poda", "Observações"], // colunas da tabela html
       ["altura", "largura", "data_poda", "observacao"] // colunar para puxar da tabela do banco
    ) ;
    $relatorio->corpo ( $arvores ) ;
    $relatorio->monta () ;