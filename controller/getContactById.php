<?php
require_once "../model/company.php";
class GetContactByIdController
{
    private $company;

    public function __construct()
    {
        $this->company = new Company();
        $findOne = $this->company->getContactById($_GET['id']);
        if ($findOne) {
            print_r($findOne);
        }
    }
}
new GetContactByIdController();