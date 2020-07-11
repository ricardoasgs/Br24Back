<?php
require_once "../model/company.php";
class CreateDealController
{
    private $company;

    public function __construct()
    {
        $this->company = new Company();
        $this->createNewContact();
    }

    public function createNewContact()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->company->createDeal($data);
        echo $result;
        if ($result) {
            echo "O negocio foi criado com sucesso!";
        } else {
            echo "Erro ao gravar o negocio!";
        }
    }
}
new CreateDealController();