<?php
require_once "../model/company.php";
class DeleteCompanyController
{
    private $company;

    public function __construct()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->company = new Company();
        if ($this->company->deleteCompany($data['id']) == true) {
            echo "A empresa deletado com sucesso!";
        } else {
            echo "Erro ao deletar empresa!";
        }
    }
}
new DeleteCompanyController();