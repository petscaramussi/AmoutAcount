<?php
function Message($message){
    echo "<p style='color: white; background:#ff4040; width:70%; text-align:center;'>$message</p>";
    }

function SucessMessage($message){
    echo "<p style='color: white; background:#008c45; width:70%; text-align:center;'>$message</p>";
}

//tratamento para usuario ou senha invalido
if(isset($_SESSION['nao_autenticado'])):
        Message("Erro, usuario ou senha invalido");
    endif;
    unset($_SESSION['nao_autenticado']);

//tratamento para senhas curtas
if(isset($_SESSION['menor'])):
        Message("A senha deve conter pelo menos 6 caracteres.");
endif;
unset($_SESSION['menor']);

//tratamento para campos em brancos
if(isset($_SESSION['branco'])):
        message("Não é permitido deixar nenhum campo em branco");
endif;
unset($_SESSION['branco']);

//tratamento para senhas diferentes
if(isset($_SESSION['senha_diferente'])):
        message("As senhas não coincidem");
endif;
unset($_SESSION['senha_diferente']);

//tratamento para usuario já existente
if(isset($_SESSION['usuario_existe'])):
    message("Erro, o usuario já existe");
endif;
unset($_SESSION['usuario_existe']);

//mensagem de sucesso
if(isset($_SESSION['status_cadastro'])):
    SucessMessage("Cadastrado com sucesso");
endif;
unset($_SESSION['status_cadastro']);

?>