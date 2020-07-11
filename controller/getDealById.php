<?php
require_once "../model/company.php";
class GetDealByIdController
{
    private $company;

    public function __construct()
    {
        $this->company = new Company();
        $result = $this->company->getDealById($_GET['id']);
        echo $result;
    }
}
new GetDealByIdController();