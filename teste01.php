<?php 

$filaAlta = [];
$filaMedia = [];
$filaBaixa = [];

function inserirTarefaManual(&$alta, &$media, &$baixa) {
    $descricao = readline("Digite a descrição da tarefa: ");
    $data = readline("Digite a data da tarefa (AAAA-MM-DD): ");
    $prioridade = readline("Digite a prioridade (alta, media ou baixa): ");

    adicionarTarefa($alta, $media, $baixa, $descricao, $data, $prioridade);
    echo "Tarefa adicionada!!!\n";
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
    echo "3 - Sair\n";
    $opcao = readline("Escolha uma opção: ");

        switch ($opcao) {
            case '1':
                inserirTarefaManual($filaAlta, $filaMedia, $filaBaixa);
                break;
            
            case '2':
                listarTarefas($filaAlta, 'alta');
                listarTarefas($filaMedia, 'media');
                listarTarefas($filaBaixa, 'baixa');
                break;

            case '3':
            case 's':
            case 'S':
                echo "Tchauu...\n";
                break 2; 
            
            default:
                echo "Opção inválida!\n";
                break;
    }
}















?>