<?php
$string = "alexandre.it.ao";

if (str_ends_with($string, ".ao")) {
    echo "O sufixo '.ao' está presente.";
} 
elseif (str_ends_with($string, "co.ao")) {
    echo "O sufixo '.ao' está presente.";
} 
elseif (str_ends_with($string, "it.ao")) {
    echo "O sufixo '.ao' está presente.";
} 
elseif (str_ends_with($string, "edu.ao")) {
    echo "O sufixo '.ao' está presente.";
}
elseif (str_ends_with($string, "org.ao")) {
    echo "O sufixo '.ao' está presente.";
}  
else {
    echo "O sufixo '.ao' está faltando.";
}
?>