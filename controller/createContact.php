<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");
require_once "../model/company.php";
class CreateContactController
{
    private $company;

    public function __construct()
    {
        $this->company = new Company();
        $this->create();
    }

    public function createNewContact()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->company->createContact($data);
        echo $result;
//         if ($result) {
//             echo "O contato criado com sucesso!";
//         } else {
//             echo "Erro ao gravar Contato!";
//         }
    }
}
new CreateContactController();
