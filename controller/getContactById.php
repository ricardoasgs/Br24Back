<?php
require_once "../model/company.php";
class GetContactByIdController
{
    private $company;

    public function __construct()
    {
        $this->company = new Company();
        $result = $this->company->getContactById($_GET['id']);
        echo $result;
    }
}
new GetContactByIdController();
