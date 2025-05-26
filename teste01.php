<?php 

$filaAlta = [];
$filaMedia = [];
$filaBaixa = [];

function inserirTarefaManual(&$alta, &$media, &$baixa) {
    $descricao = readline("Digite a descrição da tarefa: ");
    $data = readline("Digite a data da tarefa (AAAA-MM-DD): ");

    echo "Qual a prioridade da tarefa?\n";
    echo "1 - Alta\t";
    echo "2 - Média\t";
    echo "3 - Baixa\n";
    $opcao = readline("Escolha (1, 2 ou 3): ");

    switch ($opcao) {
        case '1':
            $prioridade = 'alta';
            break;
        case '2':
            $prioridade = 'media';
            break;
        case '3':
            $prioridade = 'baixa';
            break;
        default:
            echo "Prioridade inválida. Tarefa não adicionada.\n";
            return;
    }

    adicionarTarefa($alta, $media, $baixa, $descricao, $data, $prioridade);
    echo "Adicionada!!!\n";
}

function adicionarTarefa(&$alta, &$media, &$baixa, $descricao, $data, $prioridade) {
    $tarefa = [
        'descricao' => $descricao,
        'data' => $data,
        'prioridade' => $prioridade
    ];
    if ($prioridade == 'alta') {
        $alta[] = $tarefa;
    } elseif ($prioridade == 'media') {
        $media[] = $tarefa;
    } elseif ($prioridade == 'baixa') {
        $baixa[] = $tarefa;
    }
}


function listarTarefas($fila, $prioridadeNome) {
    echo "\nTarefas de prioridade $prioridadeNome: \n";

    if (empty($fila)) {
        echo "- Nenhuma tarefa.\n";
        return;
    }

    foreach ($fila as $tarefa) {
        echo "- {$tarefa['descricao']} - {$tarefa['data']}\n";
    }
}

while (true) {
    echo "\n--- MENU TAREFAS ---\n";
    echo "1 - Adicionar tarefa\n";
    echo "2 - Listar tarefas\n";
    echo "3 - Remover tarefa\n";
    echo "4 - Sair\n";
    $opcao = readline("Escolha uma opção: ");

        switch ($opcao) {
            case '1':
                inserirTarefaManual($filaAlta, $filaMedia, $filaBaixa);
                break;
            
            case '2':
    echo "\nQual prioridade deseja listar?\n";
    echo "1 - Alta\n";
    echo "2 - Média\n";
    echo "3 - Baixa\n";
    echo "4 - Todas\n";
    $opcaoLista = readline("nº: ");

    switch ($opcaoLista) {
        case '1':
            listarTarefas($filaAlta, 'alta');
            break;
        case '2':
            listarTarefas($filaMedia, 'media');
            break;
        case '3':
            listarTarefas($filaBaixa, 'baixa');
            break;
        case '4':
            listarTarefas($filaAlta, 'alta');
            listarTarefas($filaMedia, 'media');
            listarTarefas($filaBaixa, 'baixa');
            break;
        default:
            echo "Opção inválida.\n";
            break;
}
break;
            

            case '3':
                removerTarefa($filaAlta, $filaMedia, $filaBaixa);
                break;


            case '4':
                echo "Tchauu...\n";
                break 2; 
            
            default:
                echo "Opção inválida!\n";
                break;
    }
}

function removerTarefa(&$alta, &$media, &$baixa) {
    echo "De qual prioridade deseja remover?\n";
    echo "1 - Alta\t";
    echo "2 - Média\t";
    echo "3 - Baixa\n";
    $opcao = readline("Escolha(1, 2 ou 3): ");

    switch ($opcao) {
        case '1':
            $prioridade = 'alta';
            $fila = &$alta;
            break;
        case '2':
            $prioridade = 'media';
            $fila = &$media;
            break;
        case '3':
            $prioridade = 'baixa';
            $fila = &$baixa;
            break;
        default:
            echo "Prioridade inválida.\n";
            return;
    }

    if (empty($fila)) {
        echo "Aqui não tem nada.\n";
        return;
    }

    echo "\nPrioridade $prioridade:\n";
    foreach ($fila as $i => $tarefa) {
        echo "$i - {$tarefa['descricao']} ({$tarefa['data']})\n";
    }

    $indice = readline("Digite o nº da tarefa para remover: ");

    if (isset($fila[$indice])) {
        unset($fila[$indice]);
        echo "Tarefa removida.\n";
    } else {
        echo "Inválido.\n";
    }
}












?>