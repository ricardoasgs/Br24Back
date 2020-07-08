<?php
require_once "../model/company.php";
class GetCompanyByIdController
{
    private $company;

    public function __construct()
    {
        $this->company = new Company();
        $findOne = $this->company->getCompanyById($_GET['id']);
        if ($findOne) {
            print_r($findOne);
        }
    }
}
new GetCompanyByIdController();