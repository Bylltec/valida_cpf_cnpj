<?php
include("valida_CPF_CNPJ.php");

echo $cpf_cnpj = "32.171.721/0001-50";
//echo $cpf_cnpj = "011.652.381-60";
echo "\n";

if (validaCpfCnpj($cpf_cnpj)) {
    echo "Documento Válido\n";
}
else{
    echo "Documento Inválido\n";
}

?>
