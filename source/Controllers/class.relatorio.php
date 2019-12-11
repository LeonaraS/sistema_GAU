<?php

    use Dompdf\Dompdf ;

    class Relatorio
    {
        protected $cabecalho ;
        protected $indicesCorpo ;
        protected $corpo ;
        protected $layoutDoRelatorio ;
        protected $name ;

        public function __construct ()
        {
            $this->layoutDoRelatorio = __DIR__ . "/../../views/relatorio/relatorios-gau.php" ;
        }

        public function nome (string $nome)
        {
            $this->name = $nome ;
        }

        public function cabecalhos (array $cabecalho, array $indiceDeCadaDado)
        {
            $this->cabecalho = $cabecalho ;
            $this->indicesCorpo = $indiceDeCadaDado ;
        }

        public function corpo ( $corpo )
        {
            $this->corpo = $corpo ;
        }

        public function monta ()
        {
            $name = $this->name ;
            $header = $this->cabecalho ;
            $indices = $this->indicesCorpo ;
            $corpo = $this->corpo ;

            if ( ! isset ( $_GET [ "e" ] ) ) // se não for pedido para emitir como relatório
            {
                require $this->layoutDoRelatorio ; // apenas inclue
            }
            else
            {
                // se não. ou seja, se for pedido para emitir como relatório sim, faz todo aquele bagulho da classe Dompdf

                $pdf = new Dompdf ;
                ob_start () ;
                require $this->layoutDoRelatorio ;
                $pdf->loadHtml ( ob_get_clean () ) ;
                $pdf->setPaper ( "A4", "portrait" ) ;
                $pdf->render () ;
                $pdf->stream ( "GAURelatorios.pdf", ["Attachment" => false] ) ;
            }
        }
    }