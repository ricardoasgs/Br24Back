<?php
header("Access-Control-Allow-Origin: *");
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
