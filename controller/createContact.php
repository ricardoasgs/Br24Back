<?php
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
        if ($result) {
            echo "O contato criado com sucesso!";
        } else {
            echo "Erro ao gravar Contato!";
        }
    }
}
new CreateContactController();