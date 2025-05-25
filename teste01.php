<?php 

$filaAlta = [];
$filaMedia = [];
$filaBaixa = [];


$tarefa1 = [
    'descricao' => 'Estudar PHP',
    'data' => '2025-05-24',
    'prioridade' => 'alta'
];

$tarefa2 = [
    'descricao' => 'Lavar o Carro',
    'data' => '2025-05-26',
    'prioridade' => 'baixa'
];

$tarefa3 = [
    'descricao' => 'Cortar o cabelo',
    'data' => '2025-05-28',
    'prioridade' => 'media'
];

if ($tarefa1['prioridade'] == 'alta') {
    $filaAlta[] = $tarefa1;
}
if ($tarefa2['prioridade'] == 'baixa') {
    $filaBaixa[] = $tarefa2;
}
if ($tarefa3['prioridade'] == 'media'){
    $filaMedia[] = $tarefa3;
}



echo "Tarefas de prioridade ALTA:\n";
foreach ($filaAlta as $tarefa) {
    echo "- {$tarefa['descricao']} ({$tarefa['data']})\n";
}

echo "\nTarefas de prioridade MÉDIA:\n";
foreach ($filaMedia as $tarefa) {
    echo "- {$tarefa['descricao']} ({$tarefa['data']})\n";
}

echo "\nTarefas de prioridade BAIXA:\n";
foreach ($filaBaixa as $tarefa) {
    echo "- {$tarefa['descricao']} ({$tarefa['data']})\n";
}










?>