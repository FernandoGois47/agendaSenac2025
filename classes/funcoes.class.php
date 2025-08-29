<?php
    class Funcoes {
        public function dtNasc($vlr, $tipo) {
            switch ($tipo) {
                case 1:
                    $rst = implode("-", array_reverse(explode("/", $vlr))); //converte data do formato brasileiro para internacional
                    break; 

                case 2:
                    $rst = implode("/", array_reverse(explode("-", $vlr))); //converte data do formato internacional para brasileiro
                    break;
            }
            return $rst;//retorna o valor convertido
        }

        
        //novas funções podem ser criadas aqui
    }

    
?>