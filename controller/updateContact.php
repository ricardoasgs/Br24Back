<?php
require_once "../model/company.php";

class UpdateContactController
{
    private $company;

    public function __construct()
    {
        $this->company = new Company();
        $this->update();
    }

    public function update()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->company->updateContact($data);
        if ($result) {
            echo "O contato foi atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar o contato!";
        }
    }
}
new UpdateContactController();