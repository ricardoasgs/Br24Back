<?php
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
//             if ($result) {
//                 echo "A empresa atualizada com sucesso!";
//             } else {
//                 echo "Erro ao atualizar empresa!";
//             }
            echo $result;
        } else {
            $result = $this->company->createCompany($data);
//             if ($result) {
//                 echo "A empresa criada com sucesso!";
//             } else {
//                 echo "Erro ao gravar empresa!";
//             }
            echo $result;
        }

    }

}
new CreateCompanyController();
