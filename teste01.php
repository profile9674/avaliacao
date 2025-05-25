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
    inserirTarefaManual($filaAlta, $filaMedia, $filaBaixa);

    $continuar = readline("Adicionar outra tarefa? (s/n): ");
    if (strtolower($continuar) != 's') {
        break;
    }
}

listarTarefas($filaAlta, 'alta');
listarTarefas($filaMedia, 'media');
listarTarefas($filaBaixa, 'baixa');














?>