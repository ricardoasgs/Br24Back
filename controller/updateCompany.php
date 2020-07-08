<?php
require_once "../model/company.php";

class UpdateCompanyController
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
        $result = $this->company->updateCompany($data);
        if ($result) {
            echo "A empresa atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar empresa!";
        }
    }
}
new UpdateCompanyController();