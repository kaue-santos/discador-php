<?php

namespace App\Files;

class CSV{

    public static function lerArquivo($arquivo, $cabecalho = true, $delimitador = ','){

        if(!file_exists($arquivo)){
            die("Arquivo n encontrado!");
        }

        $dados = [];

        $csv = fopen($arquivo, 'r');

        $cabecalhoDados = $cabecalho ? fgetcsv($csv,0,$delimitador) : [];

        while($linha = fgetcsv($csv,0,$delimitador)){
            $dados[] = $cabecalho ? array_combine($cabecalhoDados, $linha) : $linha;
        }

        return $dados;
    }
}