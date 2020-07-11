<?php
require_once "../model/company.php";
class DeleteContactController
{
    private $company;

    public function __construct()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->company = new Company();
        $result = $this->company->deleteContact($data['id']);
        // echo $result;
        if ($result) {
            echo "O contato foi deletado com sucesso!";
        } else {
            echo "Erro ao deletar o contato!";
        }
    }
}
new DeleteContactController();