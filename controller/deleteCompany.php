<?php
require_once "../model/company.php";
class DeleteCompanyController
{
    private $company;

    public function __construct()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->company = new Company();
        $result = $this->company->deleteCompany($data['id']);
        // echo $result;
        if ($result) {
            echo "A empresa foi deletada com sucesso!";
        } else {
            echo "Erro ao deletar a empresa!";
        }
    }
}
new DeleteCompanyController();