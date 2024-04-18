<?php
// ChatGPT
<?php

require __DIR__ . '/vendor/autoload.php'; // Carregar o autoloader do Composer

use Google\Client;
use Google\Service\Sheets;

$client = new Client();
$client->setApplicationName('Nome do seu aplicativo');
$client->setScopes([Sheets::SPREADSHEETS]); // Escopos necessários para gravação
$client->setAuthConfig('caminho/para/o/arquivo/client_secret.json'); // Configurar o token de acesso
$client->setAccessType('offline');

// Inicializar o serviço do Google Sheets
$service = new Sheets($client);

// ID da planilha de origem e de destino
$origemSpreadsheetId = 'https://docs.google.com/spreadsheets/d/1V9bOBQ8WoajcA7rVd1JLEZ3xEdZCJVasfw06ipRzwI4/edit#gid=0';
$destinoSpreadsheetId = 'https://docs.google.com/spreadsheets/d/1vu0TRu-nilDS4Bwl4on9Z7n6E5MtnSh-CXbB8uqNOyU/edit#gid=0';

// Intervalo de células a serem lidas na planilha de origem
$origemRange = 'Nome_da_Aba_Origem!A1:D10';

// Intervalo de células a serem escritas na planilha de destino
$destinoRange = 'Nome_da_Aba_Destino!A1'; // Escrever a partir da célula A1

// Fazer a solicitação para ler os dados da planilha de origem
$response = $service->spreadsheets_values->get($origemSpreadsheetId, $origemRange);
$values = $response->getValues();

// Se houver dados na planilha de origem, escrever na planilha de destino
if (!empty($values)) {
    // Fazer a solicitação para escrever os dados na planilha de destino
    $body = new Google\Service\Sheets\ValueRange(['values' => $values]);
    $params = ['valueInputOption' => 'RAW'];
    $result = $service->spreadsheets_values->update($destinoSpreadsheetId, $destinoRange, $body, $params);

    // Verificar se os dados foram escritos com sucesso
    if ($result->updatedCells > 0) {
        echo "Dados salvos com sucesso na planilha de destino.\n";
    } else {
        echo "Erro ao salvar os dados na planilha de destino.\n";
    }
} else {
    echo "Nenhum dado encontrado na planilha de origem.\n";
}

