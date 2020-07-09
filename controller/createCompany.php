<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");
require_once "../model/company.php";
class CreateCompanyController
{

    public $company;

    public function __construct()
    {
        $this->company = new Company();
        $this->createNewCompany();
    }

    public function checkForCnpjDuplicate()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $searchCnpj = $this->company->checkCnpj($data["cnpj"]);
        $transformCnpj = json_decode($searchCnpj);
        $cnpjResult = $transformCnpj->total;
        if ($cnpjResult) {
            return $transformCnpj->result[0]->ID;
        } else {
            return 0;
        }
    }

    public function createNewCompany()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($this->checkForCnpjDuplicate()) {
            $data["id"] = $this->checkForCnpjDuplicate();
            $result = $this->company->updateCompany($data);
            if ($result) {
                echo "A empresa atualizada com sucesso!";
            } else {
                echo "Erro ao atualizar empresa!";
            }
        } else {
            $result = $this->company->createCompany($data);
            if ($result) {
                echo "A empresa criada com sucesso!";
            } else {
                echo "Erro ao gravar empresa!";
            }

        }

    }

}
new CreateCompanyController();
