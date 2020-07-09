<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");
require_once "../model/company.php";
class GetCompanyController
{

    public function __construct()
    {
        $this->company = new Company();
        $this->getValues();
    }

    public function getValues()
    {
        echo $companies = $this->company->getCompany();

    }
}
new GetCompanyController();
