<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
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
