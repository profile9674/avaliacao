<?php 
$filaAlta = [];
$filaMedia = [];
$filaBaixa = [];
$pilhaArquivadas = [];

function inserirTarefaManual(&$alta, &$media, &$baixa) {
    $descricao = readline("Digite a tarefa: ");
    $data = readline("Data: ");

    echo "Qual a prioridade da tarefa?\n";
    echo "1 - Alta\t";
    echo "2 - Média\t";
    echo "3 - Baixa\n";
    $opcao = readline("Escolha (1, 2 ou 3): ");

    switch ($opcao) {
        case '1': $prioridade = 'alta'; break;
        case '2': $prioridade = 'media'; break;
        case '3': $prioridade = 'baixa'; break;
        default:
            echo "Inválida.\n";
            return;
    }

    adicionarTarefa($alta, $media, $baixa, $descricao, $data, $prioridade);
    echo "Adicionada!!!\n";
}

function adicionarTarefa(&$alta, &$media, &$baixa, $descricao, $data, $prioridade) {
    $tarefa = ['descricao' => $descricao, 'data' => $data, 'prioridade' => $prioridade];
    if ($prioridade == 'alta') $alta[] = $tarefa;
    elseif ($prioridade == 'media') $media[] = $tarefa;
    elseif ($prioridade == 'baixa') $baixa[] = $tarefa;
}

function listarTarefas($fila, $prioridadeNome) {
    echo "\nTarefas de prioridade $prioridadeNome:\n";
    if (empty($fila)) 
    { 
        echo "Nenhuma\n"; return; 
    }
    foreach ($fila as $tarefa) {
        echo "{$tarefa['descricao']} - {$tarefa['data']}\n";
    }
}

function removerTarefa(&$alta, &$media, &$baixa) {
    echo "De qual prioridade deseja remover?\n";
    echo "1 - Alta\t2 - Média\t3 - Baixa\n";
    $opcao = readline("Escolha (1, 2 ou 3): ");

    switch ($opcao) {
        case '1': $fila = &$alta; $prioridade = 'alta'; break;
        case '2': $fila = &$media; $prioridade = 'media'; break;
        case '3': $fila = &$baixa; $prioridade = 'baixa'; break;
        default: echo "Prioridade inválida.\n"; return;
    }

    if (empty($fila)) { echo "Aqui não tem nada.\n"; return; }

    echo "\nPrioridade $prioridade:\n";
    foreach ($fila as $i => $tarefa) {
        echo "$i - {$tarefa['descricao']} ({$tarefa['data']})\n";
    }

    $indice = readline("Digite o nº da tarefa p/ remover: ");
    if (isset($fila[$indice])) {
        unset($fila[$indice]);
        echo "Removida.\n";
    } else {
        echo "Inválido.\n";
    }
}

function arquivarTarefa(&$alta, &$media, &$baixa, &$pilha) {
    echo "De qual prioridade a tarefa foi concluída?\n";
    echo "1 - Alta\t2 - Média\t3 - Baixa\n";
    $opcao = readline("Escolha (1, 2 ou 3): ");

    switch ($opcao) {
        case '1': $fila = &$alta; $prioridade = 'alta'; break;
        case '2': $fila = &$media; $prioridade = 'media'; break;
        case '3': $fila = &$baixa; $prioridade = 'baixa'; break;
        default: echo "Opção inválida.\n"; return;
    }

    if (empty($fila)) { echo "Nada aqui.\n"; return; }

    foreach ($fila as $i => $tarefa) {
        echo "$i - {$tarefa['descricao']} ({$tarefa['data']})\n";
    }

    $indice = readline("Digite o nº da tarefa para arquivar/concluir: ");
    if (isset($fila[$indice])) {    /////// evita dar o erro caso a tarefa nao exista
        $tarefaArquivada = $fila[$indice];
        unset($fila[$indice]); ///////// move para fila, se nao usar unset ela vai continuar sendo listada
        $pilha[] = $tarefaArquivada;
        echo "Arquivada.\n";
    } else {
        echo "Inválido.\n";
    }
}

function listarArquivadas($pilha) {
    echo "\nTarefas Arquivadas:\n";
    if (empty($pilha)) { echo "Nada ainda\n"; return; }

    for ($i = count($pilha) - 1; $i >= 0; $i--) {
        $tarefa = $pilha[$i];
        echo "{$tarefa['descricao']} - {$tarefa['data']} ({$tarefa['prioridade']})\n";
    }
}


while (true) {
    echo "\n--- MENU TAREFAS ---\n";
    echo "1 - Adicionar\n";
    echo "2 - Listar\n";
    echo "3 - Remover\n";
    echo "4 - Arquivar/Concluir\n";
    echo "5 - Ver concluídas (arquivadas)\n";
    echo "6 - Sair\n";
    $opcao = readline("Escolha uma opção: ");

    switch ($opcao) {
        case '1':
            inserirTarefaManual($filaAlta, $filaMedia, $filaBaixa);
            break;

        case '2':
            echo "\nQual prioridade deseja listar?\n";
            echo "1 - Alta\n2 - Média\n3 - Baixa\n4 - Todas\n";
            $opcaoLista = readline("nº: ");
            switch ($opcaoLista) {
                case '1': listarTarefas($filaAlta, 'alta'); break;
                case '2': listarTarefas($filaMedia, 'media'); break;
                case '3': listarTarefas($filaBaixa, 'baixa'); break;
                case '4':
                    listarTarefas($filaAlta, 'alta');
                    listarTarefas($filaMedia, 'media');
                    listarTarefas($filaBaixa, 'baixa');
                    break;
                default: echo "Opção inválida.\n"; break;
            }
            break;

        case '3':
            removerTarefa($filaAlta, $filaMedia, $filaBaixa);
            break;

        case '4':
            arquivarTarefa($filaAlta, $filaMedia, $filaBaixa, $pilhaArquivadas);
            break;

        case '5':
            listarArquivadas($pilhaArquivadas);
            break;

        case '6':
            echo "Tchauu...\n";
            break 2;

        default:
            echo "Opção inválida!\n";
            break;
    }
}










?>