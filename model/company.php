<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");
require "../helper/helper.php";
class Company
{
    public function createCompany($data)
    {
        $queryUrl = baseUrl() . '/crm.company.add.json';
        $queryData = http_build_query(array(
            'fields' => array(
                "TITLE" => $data["empresa"],
                "UF_CRM_1594236296415" => $data["proprietario"],
                "UF_CRM_1594236337871" => $data["cnpj"],
                "PHONE" => array(
                    array(
                        "VALUE" => $data["telefone"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
                "EMAIL" => array(
                    array(
                        "VALUE" => $data["email"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
            ),
        ));
        return doRequest($queryUrl, $queryData);

    }

    public function getCompanyById($id)
    {

        $queryUrl = baseUrl() . '/crm.company.get.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));
        return doRequest($queryUrl, $queryData);

    }

    public function getCompany()
    {
        $queryUrl = baseUrl() . '/crm.company.list.json';
        $queryData = http_build_query(array(
            'order' => array("DATE_CREATE" => "ASC"),
            'select' => array("ID", "TITLE", "UF_CRM_1594236296415", "UF_CRM_1594236337871", "PHONE", "EMAIL"),
        )
        );

        return doRequest($queryUrl, $queryData);
    }

    public function deleteCompany($id)
    {
        $queryUrl = baseUrl() . '/crm.company.delete.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));

        return doRequest($queryUrl, $queryData);

    }

    public function updateCompany($data)
    {
        $queryUrl = baseUrl() . '/crm.company.update.json';
        $queryData = http_build_query(array(
            'ID' => $data["id"],
            'fields' => array(
                "TITLE" => $data["empresa"],
                "UF_CRM_1594236296415" => $data["proprietario"],
                "UF_CRM_1594236337871" => $data["cnpj"],
                "PHONE" => array(
                    array(
                        "VALUE" => $data["telefone"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
                "EMAIL" => array(
                    array(
                        "VALUE" => $data["email"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
            ),
        ));

        return doRequest($queryUrl, $queryData);
    }

    public function createContact($data)
    {
        $queryUrl = baseUrl() . '/crm.contact.add.json';
        $queryData = http_build_query(array(
            'fields' => array(
                "NAME" => $data["nome"],
                "PHONE" => array(
                    array(
                        "VALUE" => $data["telefone"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
                "EMAIL" => array(
                    array(
                        "VALUE" => $data["email"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
            ),
        ));
        
        return doRequest($queryUrl, $queryData);

    }
    
    public function getContact()
    {

        $queryUrl = baseUrl() . '/crm.contact.list.json';
        $queryData = http_build_query(array(
            'order' => array("DATE_CREATE" => "ASC")
        ));
        return doRequest($queryUrl, $queryData);

    }

    public function getContactById($id)
    {

        $queryUrl = baseUrl() . '/crm.contact.list.json';
        $queryData = http_build_query(array(
            'filter' => array("COMPANY_ID" => $id),
            'select' => array("ID", "NAME", "PHONE", "EMAIL"),
        ));
        return doRequest($queryUrl, $queryData);

    }

    public function updateContact($data)
    {
        $queryUrl = baseUrl() . '/crm.contact.add.json';
        $queryData = http_build_query(array(
            'fields' => array(
                "NAME" => $data["nome"],
                "PHONE" => array(
                    array(
                        "VALUE" => $data["telefone"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
                "EMAIL" => array(
                    array(
                        "VALUE" => $data["email"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
            ),
        ));
        
        return doRequest($queryUrl, $queryData);

    }

    public function deleteContact($id)
    {

        $queryUrl = baseUrl() . '/crm.contact.delete.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));
        return doRequest($queryUrl, $queryData);

    }

    public function createDeal($data)
    {
        $queryUrl = baseUrl() . '/crm.deal.add.json';
        $queryData = http_build_query(array(
            'fields' => array(
                "TITLE" => $data["titulo"],
                "COMPANY_ID" => $data["idEmpresa"],
                "CURRENCY_ID" => "BRL", 
                "OPPORTUNITY"=> $data["valor"],
                "TYPE_ID" => "GOODS", 
                "STAGE_ID" => "NEW",
                
            ),
        ));
        
        return doRequest($queryUrl, $queryData);

    }

    public function getDealById($id)
    {

        $queryUrl = baseUrl() . '/crm.deal.list.json';
        $queryData = http_build_query(array(
            'filter' => array("COMPANY_ID" => $id),
            'select' => array("ID", "TITLE", "OPPORTUNITY", "CONTACT_ID"),
        ));
        return doRequest($queryUrl, $queryData);

    }

    public function deleteDeal($id)
    {

        $queryUrl = baseUrl() . '/crm.deal.delete.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));
        return doRequest($queryUrl, $queryData);

    }

    public function checkCnpj($cnpj)
    {

        $queryUrl = baseUrl() . '/crm.company.list.json';
        $queryData = http_build_query(array(
            'filter' => array("UF_CRM_1594236337871" => $cnpj),
        ));
        return doRequest($queryUrl, $queryData);

    }

}