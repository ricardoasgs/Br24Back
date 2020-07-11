<?php
require_once "../model/company.php";
class DeleteDealController
{
    private $company;

    public function __construct()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->company = new Company();
        $result = $this->company->deleteDeal($data['id']);
        // echo $result;
        if ($result) {
            echo "O negocio foi deletado com sucesso!";
        } else {
            echo "Erro ao deletar o negocio!";
        }
    }
}
new DeleteDealController();