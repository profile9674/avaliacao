<?php 

$filaAlta = [];
$filaMedia = [];
$filaBaixa = [];

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



adicionarTarefa($filaAlta, $filaMedia, $filaBaixa, 'Comprar pão', '2025-05-29', 'media');
adicionarTarefa($filaAlta, $filaMedia, $filaBaixa, 'Fazer exercícios', '2025-05-30', 'alta');
adicionarTarefa($filaAlta, $filaMedia, $filaBaixa, 'Limpar caixa de água', '2025-06-10', 'baixa');


listarTarefas($filaAlta, 'alta');
listarTarefas($filaMedia, 'media');
listarTarefas($filaBaixa, 'baixa');












?>