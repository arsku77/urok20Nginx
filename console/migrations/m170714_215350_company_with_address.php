<?php

use yii\db\Migration;

/**
 * Handles the creation of structures tables:
 * parent_company,
 * branch_of_company,
 * address_of_company,
 * address_type
 * and for relate:
 * company_to_address.
 */
class m170714_215350_company_with_address extends Migration
{

    public function up()
    {
        $this->createCompany();
        $this->createAddresses();
        $this->createAddressType();
        $this->createCompanyToAddress();
        $this->createBranch();
    }

    public function down()
    {
        $this->dropTable('parent_company');
        $this->dropTable('address_of_company');
        $this->dropTable('company_to_address');
        $this->dropTable('branch_of_company');
        $this->dropTable('address_of_company_type');
    }

    private function createCompany()
    {
        $this->createTable('parent_company', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'id_code' => $this->string(30),
            'vat_code' => $this->string(30),
            'isbn' => $this->string(30),
            'date_foundation' => $this->date(),
        ]);

        $this->insert('parent_company', [
            'id' => 1,
            'name' => 'ARVIDIJA UAB',
            'id_code' => '165740558',
            'vat_code' => 'LT65740558',
            'isbn' => '1234567891011',
            'date_foundation' => '1994-05-10',
        ]);
    }

    private function createBranch()
    {
        $this->createTable('branch_of_company', [
            'id' => $this->primaryKey(),
            'parent_company_id' => $this->integer()->defaultValue(1),
            'name' => $this->string(),
            'email' => $this->string(),
            'isbn' => $this->string(30),
            'date_foundation' => $this->date(),
            'alias' => $this->string(55),
            'sort' => $this->integer(),
        ]);

        $this->insert('branch_of_company', [
            'id' => 1,
            'parent_company_id' => 1,
            'name' => 'parent office',
            'email' => 'arunas@arvidija.lt',
            'isbn' => '12345678911',
            'date_foundation' => '1994-05-12',
            'alias' => 'office',
            'sort' => 1,
        ]);

        $this->insert('branch_of_company', [
            'id' => 2,
            'parent_company_id' => 1,
            'name' => 'market place 1',
            'email' => 'arunas@arvidija1.lt',
            'isbn' => '12345678911',
            'date_foundation' => '2004-10-12',
            'alias' => 'market1',
            'sort' => 2,
        ]);

        $this->insert('branch_of_company', [
            'id' => 3,
            'parent_company_id' => 1,
            'name' => 'market place nr 2',
            'email' => 'arunas@arvidija2.lt',
            'isbn' => '12335678911',
            'date_foundation' => '2005-08-12',
            'alias' => 'market2',
            'sort' => 3,
        ]);

        $this->insert('branch_of_company', [
            'id' => 4,
            'parent_company_id' => 1,
            'name' => 'factory nr 1',
            'email' => 'arunas@arvidija3.lt',
            'isbn' => '1245678911',
            'date_foundation' => '2010-05-12',
            'alias' => 'factory1',
            'sort' => 4,
        ]);

    }

    private function createAddresses()
    {
        $this->createTable('address_of_company', [
            'id' => $this->primaryKey(),
            'address_type_id' => $this->integer()->defaultValue(1),
            'post_code' => $this->string(30),
            'street_or_village' => $this->text(),
            'city_or_area' => $this->string(),
            'region' => $this->string(),
            'country' => $this->string(),
            'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'TIMESTAMP NULL',
            'active' => $this->boolean()->defaultValue(true),
            'archive' => $this->boolean()->defaultValue(false),
            'date_of_archiving' => 'TIMESTAMP NULL',
        ]);

        $this->insert('address_of_company', [
            'id' => 1,
            'address_type_id' => 1,
            'post_code' => '45482',
            'street_or_village' => 'Stoties 49',
            'city_or_area' => 'Marijampole',
            'region' => 'Marijampole',
            'country' => 'Lithuania',
        ]);

        $this->insert('address_of_company', [
            'id' => 2,
            'address_type_id' => 2,
            'post_code' => '45483',
            'street_or_village' => 'Stoties 50',
            'city_or_area' => 'Kaunas',
            'region' => 'Kaunas',
            'country' => 'Lithuania',
        ]);

        $this->insert('address_of_company', [
            'id' => 3,
            'address_type_id' => 1,
            'post_code' => '45584',
            'street_or_village' => 'Stoties 51',
            'city_or_area' => 'Kalvarija',
            'region' => 'Alytus',
            'country' => 'Lithuania',
        ]);

        $this->insert('address_of_company', [
            'id' => 4,
            'address_type_id' => 1,
            'post_code' => '45585',
            'street_or_village' => 'Stoties 52',
            'city_or_area' => 'Kalvarijos rajonas',
            'region' => 'Alytus',
            'country' => 'Lithuania',
        ]);

        $this->insert('address_of_company', [
            'id' => 5,
            'address_type_id' => 2,
            'post_code' => '45586',
            'street_or_village' => 'Stoties 51',
            'city_or_area' => 'Kalvarija1',
            'region' => 'Alytus1',
            'country' => 'Lithuania',
        ]);

        $this->insert('address_of_company', [
            'id' => 6,
            'address_type_id' => 1,
            'post_code' => '45586',
            'street_or_village' => 'Stoties 52',
            'city_or_area' => 'Kalvarija2',
            'region' => 'Alytus2',
            'country' => 'Lithuania',
        ]);

        $this->insert('address_of_company', [
            'id' => 7,
            'address_type_id' => 1,
            'post_code' => '45587',
            'street_or_village' => 'Stoties 53',
            'city_or_area' => 'Kalvarija3',
            'region' => 'Alytus3',
            'country' => 'Lithuania',
        ]);

        $this->insert('address_of_company', [
            'id' => 8,
            'address_type_id' => 3,
            'post_code' => '45588',
            'street_or_village' => 'Stoties 54',
            'city_or_area' => 'Kalvarija4',
            'region' => 'Alytus4',
            'country' => 'Lithuania',
        ]);

        $this->insert('address_of_company', [
            'id' => 9,
            'address_type_id' => 3,
            'post_code' => '45589',
            'street_or_village' => 'Stoties 55',
            'city_or_area' => 'Kalvarij5a',
            'region' => 'Alytus5',
            'country' => 'Lithuania',
        ]);

        $this->insert('address_of_company', [
            'id' => 10,
            'address_type_id' => 1,
            'post_code' => '45590',
            'street_or_village' => 'Stoties 56',
            'city_or_area' => 'Kalvarija6',
            'region' => 'Alytus6',
            'country' => 'Lithuania',
        ]);

    }

    private function createAddressType()
    {
        $this->createTable('address_of_company_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this -> boolean()->defaultValue(true),

        ]);

        $this->insert('address_of_company_type', [
            'id' => 1,
            'name' => 'Home',
        ]);

        $this->insert('address_of_company_type', [
            'id' => 2,
            'name' => 'Registration',
        ]);

        $this->insert('address_of_company_type', [
            'id' => 3,
            'name' => 'Correspondence',
        ]);

        $this->insert('address_of_company_type', [
            'id' => 4,
            'name' => 'Production',
        ]);

        $this->insert('address_of_company_type', [
            'id' => 5,
            'name' => 'Logistic',
        ]);

        $this->insert('address_of_company_type', [
            'id' => 6,
            'name' => 'Shipping',
        ]);

        $this->insert('address_of_company_type', [
            'id' => 7,
            'name' => 'Receipt',
        ]);

    }

    private function createCompanyToAddress()
    {
        $this->createTable('company_to_address', [
            'id' => $this->primaryKey(),
            'parent_company_id' => $this->integer()->defaultValue(1),
            'branch_of_company_id' => $this->integer()->defaultValue(1),
            'address_of_company_id' => $this->integer()->defaultValue(1),
            'sort' => $this->integer(),
            'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'TIMESTAMP NULL',
            'active' => $this->boolean()->defaultValue(true),
            'archive' => $this->boolean()->defaultValue(false),
            'date_of_archiving' => 'TIMESTAMP NULL',
        ]);

        $this->insert('company_to_address', [
            'id' => 1,
            'parent_company_id' => 1,
            'branch_of_company_id' => 1,
            'address_of_company_id' => 1,
            'sort' => 1,
        ]);

        $this->insert('company_to_address', [
            'id' => 2,
            'parent_company_id' => 1,
            'branch_of_company_id' => 2,
            'address_of_company_id' => 2,
            'sort' => 2,
        ]);

        $this->insert('company_to_address', [
            'id' => 3,
            'parent_company_id' => 1,
            'branch_of_company_id' => 2,
            'address_of_company_id' => 4,
            'sort' => 3,
        ]);

        $this->insert('company_to_address', [
            'id' => 4,
            'parent_company_id' => 1,
            'branch_of_company_id' => 3,
            'address_of_company_id' => 4,
            'sort' => 4,
        ]);

        $this->insert('company_to_address', [
            'id' => 5,
            'parent_company_id' => 1,
            'branch_of_company_id' => 1,
            'address_of_company_id' => 5,
            'sort' => 5,
        ]);

        $this->insert('company_to_address', [
            'id' => 6,
            'parent_company_id' => 1,
            'branch_of_company_id' => 2,
            'address_of_company_id' => 6,
            'sort' => 6,
        ]);

        $this->insert('company_to_address', [
            'id' => 7,
            'parent_company_id' => 1,
            'branch_of_company_id' => 3,
            'address_of_company_id' => 8,
            'sort' => 7,
        ]);

        $this->insert('company_to_address', [
            'id' => 8,
            'parent_company_id' => 1,
            'branch_of_company_id' => 5,
            'address_of_company_id' => 7,
            'sort' => 8,
        ]);

        $this->insert('company_to_address', [
            'id' => 9,
            'parent_company_id' => 1,
            'branch_of_company_id' => 4,
            'address_of_company_id' => 8,
            'sort' => 9,
        ]);

        $this->insert('company_to_address', [
            'id' => 10,
            'parent_company_id' => 1,
            'branch_of_company_id' => 3,
            'address_of_company_id' => 5,
            'sort' => 10,
        ]);

        $this->insert('company_to_address', [
            'id' => 11,
            'parent_company_id' => 1,
            'branch_of_company_id' => 7,
            'address_of_company_id' => 9,
            'sort' => 11,
        ]);
    }
}
