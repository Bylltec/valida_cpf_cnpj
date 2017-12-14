<?php
function validaCnpj($doc, $menos, $limite){

    $total = 0;
    $base = 2;
    $cont = (count($doc) - $menos);

    while ($cont >=  0) {
        //echo $doc[$cont]." * ".$base." = ".$doc[$cont] * $base."\n";
        $total += ($doc[$cont] * $base++);

        if ($base == $limite) {
            $base = 2;
        }

        $cont--;
    }

    $resto = (int)($total % 11);

    //echo "\n";

    if ($resto < 2) {
        return 0;
    }
    else{
        return 11 - $resto;
    }
}

function validaCpf($doc, $menos, $limite){
    $total = 0;
    $base = 2;
    $cont = (count($doc) - $menos);

    while ($cont >=  0) {
        //echo $doc[$cont]." * ".$base." = ".$doc[$cont] * $base."\n";
        $total += ($doc[$cont] * $base++);

        if ($base == $limite) {
            $base = 2;
        }

        $cont--;
    }

    $resto = (int)($total % 11);

    //echo "\n";

    if ($resto < 2) {
        return 0;
    }
    else{
        return 11 - $resto;
    }
}

function validaCpfCnpj($cpf_cnpj){

    $cpf_cnpj = preg_replace("/[^0-9]/", '',$cpf_cnpj);

    $doc = [];
    $posicao = 0;

    while($posicao <= (strlen($cpf_cnpj) - 1)){

        $doc[$posicao] = substr($cpf_cnpj, $posicao, 1);
        $posicao++;
    };

    $menos = 3;
    $dvs = [];

    if (strlen($cpf_cnpj) == 11) {
        if (!($cpf_cnpj == "00000000000" || $cpf_cnpj == "11111111111" ||
              $cpf_cnpj == "22222222222" || $cpf_cnpj == "33333333333" ||
              $cpf_cnpj == "44444444444" || $cpf_cnpj == "55555555555" ||
              $cpf_cnpj == "66666666666" || $cpf_cnpj == "77777777777" ||
              $cpf_cnpj == "88888888888" || $cpf_cnpj == "99999999999")) {

                  $limite = 12;
                  $dv1 = 9;
                  $dv2 = 10;

                  for ($i=0; $i < 2; $i++) {
                      $dvs[$i] = validaCpf($doc, $menos--, $limite);
                  }

                  if ($doc[$dv1] == $dvs[0] && $doc[$dv2] == $dvs[1]) {
                      return true;
                  }
                  else{
                      return false;
                  }
        }
        else{
            return false;
        }
    }
    else{
        if (!($cpf_cnpj == "00000000000000" || $cpf_cnpj == "11111111111111"||
              $cpf_cnpj == "22222222222222" || $cpf_cnpj == "33333333333333"||
              $cpf_cnpj == "44444444444444" || $cpf_cnpj == "55555555555555"||
              $cpf_cnpj == "66666666666666" || $cpf_cnpj == "77777777777777"||
              $cpf_cnpj == "88888888888888" || $cpf_cnpj == "99999999999999")) {
                  $limite = 10;
                  $dv1 = 12;
                  $dv2 = 13;

                  for ($i=0; $i < 2; $i++) {
                      $dvs[$i] = validaCnpj($doc, $menos--, $limite);
                  }

                  if ($doc[$dv1] == $dvs[0] && $doc[$dv2] == $dvs[1]) {
                      return true;
                  }
                  else{
                      return false;
                  }
        }
        else{
            return false;
        }
    }
}
?>
