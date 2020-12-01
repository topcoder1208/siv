<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'brand_create',
            ],
            [
                'id'    => 18,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 19,
                'title' => 'brand_show',
            ],
            [
                'id'    => 20,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 21,
                'title' => 'brand_access',
            ],
            [
                'id'    => 22,
                'title' => 'offerte_create',
            ],
            [
                'id'    => 23,
                'title' => 'offerte_edit',
            ],
            [
                'id'    => 24,
                'title' => 'offerte_show',
            ],
            [
                'id'    => 25,
                'title' => 'offerte_delete',
            ],
            [
                'id'    => 26,
                'title' => 'offerte_access',
            ],
            [
                'id'    => 27,
                'title' => 'anagrafiche_access',
            ],
            [
                'id'    => 28,
                'title' => 'categorie_create',
            ],
            [
                'id'    => 29,
                'title' => 'categorie_edit',
            ],
            [
                'id'    => 30,
                'title' => 'categorie_show',
            ],
            [
                'id'    => 31,
                'title' => 'categorie_delete',
            ],
            [
                'id'    => 32,
                'title' => 'categorie_access',
            ],
            [
                'id'    => 33,
                'title' => 'tecnologium_create',
            ],
            [
                'id'    => 34,
                'title' => 'tecnologium_edit',
            ],
            [
                'id'    => 35,
                'title' => 'tecnologium_show',
            ],
            [
                'id'    => 36,
                'title' => 'tecnologium_delete',
            ],
            [
                'id'    => 37,
                'title' => 'tecnologium_access',
            ],
            [
                'id'    => 38,
                'title' => 'elenchi_access',
            ],
            [
                'id'    => 39,
                'title' => 'regioni_create',
            ],
            [
                'id'    => 40,
                'title' => 'regioni_edit',
            ],
            [
                'id'    => 41,
                'title' => 'regioni_show',
            ],
            [
                'id'    => 42,
                'title' => 'regioni_delete',
            ],
            [
                'id'    => 43,
                'title' => 'regioni_access',
            ],
            [
                'id'    => 44,
                'title' => 'province_create',
            ],
            [
                'id'    => 45,
                'title' => 'province_edit',
            ],
            [
                'id'    => 46,
                'title' => 'province_show',
            ],
            [
                'id'    => 47,
                'title' => 'province_delete',
            ],
            [
                'id'    => 48,
                'title' => 'province_access',
            ],
            [
                'id'    => 49,
                'title' => 'cittum_create',
            ],
            [
                'id'    => 50,
                'title' => 'cittum_edit',
            ],
            [
                'id'    => 51,
                'title' => 'cittum_show',
            ],
            [
                'id'    => 52,
                'title' => 'cittum_delete',
            ],
            [
                'id'    => 53,
                'title' => 'cittum_access',
            ],
            [
                'id'    => 54,
                'title' => 'geografici_access',
            ],
            [
                'id'    => 55,
                'title' => 'gare_access',
            ],
            [
                'id'    => 56,
                'title' => 'notizie_create',
            ],
            [
                'id'    => 57,
                'title' => 'notizie_edit',
            ],
            [
                'id'    => 58,
                'title' => 'notizie_show',
            ],
            [
                'id'    => 59,
                'title' => 'notizie_delete',
            ],
            [
                'id'    => 60,
                'title' => 'notizie_access',
            ],
            [
                'id'    => 61,
                'title' => 'vendite_create',
            ],
            [
                'id'    => 62,
                'title' => 'vendite_edit',
            ],
            [
                'id'    => 63,
                'title' => 'vendite_show',
            ],
            [
                'id'    => 64,
                'title' => 'vendite_delete',
            ],
            [
                'id'    => 65,
                'title' => 'vendite_access',
            ],
            [
                'id'    => 66,
                'title' => 'gare_inserimento_create',
            ],
            [
                'id'    => 67,
                'title' => 'gare_inserimento_edit',
            ],
            [
                'id'    => 68,
                'title' => 'gare_inserimento_show',
            ],
            [
                'id'    => 69,
                'title' => 'gare_inserimento_delete',
            ],
            [
                'id'    => 70,
                'title' => 'gare_inserimento_access',
            ],
            [
                'id'    => 71,
                'title' => 'soggetti_tipologium_create',
            ],
            [
                'id'    => 72,
                'title' => 'soggetti_tipologium_edit',
            ],
            [
                'id'    => 73,
                'title' => 'soggetti_tipologium_show',
            ],
            [
                'id'    => 74,
                'title' => 'soggetti_tipologium_delete',
            ],
            [
                'id'    => 75,
                'title' => 'soggetti_tipologium_access',
            ],
            [
                'id'    => 76,
                'title' => 'gare_inserimento_dettagli_create',
            ],
            [
                'id'    => 77,
                'title' => 'gare_inserimento_dettagli_edit',
            ],
            [
                'id'    => 78,
                'title' => 'gare_inserimento_dettagli_show',
            ],
            [
                'id'    => 79,
                'title' => 'gare_inserimento_dettagli_delete',
            ],
            [
                'id'    => 80,
                'title' => 'gare_inserimento_dettagli_access',
            ],
            [
                'id'    => 81,
                'title' => 'inserimento_gare_soglie_create',
            ],
            [
                'id'    => 82,
                'title' => 'inserimento_gare_soglie_edit',
            ],
            [
                'id'    => 83,
                'title' => 'inserimento_gare_soglie_show',
            ],
            [
                'id'    => 84,
                'title' => 'inserimento_gare_soglie_delete',
            ],
            [
                'id'    => 85,
                'title' => 'inserimento_gare_soglie_access',
            ],
            [
                'id'    => 86,
                'title' => 'inserimento_soglie_range_create',
            ],
            [
                'id'    => 87,
                'title' => 'inserimento_soglie_range_edit',
            ],
            [
                'id'    => 88,
                'title' => 'inserimento_soglie_range_show',
            ],
            [
                'id'    => 89,
                'title' => 'inserimento_soglie_range_delete',
            ],
            [
                'id'    => 90,
                'title' => 'inserimento_soglie_range_access',
            ],
            [
                'id'    => 91,
                'title' => 'soggetti_fatturato_create',
            ],
            [
                'id'    => 92,
                'title' => 'soggetti_fatturato_edit',
            ],
            [
                'id'    => 93,
                'title' => 'soggetti_fatturato_show',
            ],
            [
                'id'    => 94,
                'title' => 'soggetti_fatturato_delete',
            ],
            [
                'id'    => 95,
                'title' => 'soggetti_fatturato_access',
            ],
            [
                'id'    => 96,
                'title' => 'user_parameter_create',
            ],
            [
                'id'    => 97,
                'title' => 'user_parameter_edit',
            ],
            [
                'id'    => 98,
                'title' => 'user_parameter_show',
            ],
            [
                'id'    => 99,
                'title' => 'user_parameter_delete',
            ],
            [
                'id'    => 100,
                'title' => 'user_parameter_access',
            ],
            [
                'id'    => 101,
                'title' => 'soggetti_relationship_create',
            ],
            [
                'id'    => 102,
                'title' => 'soggetti_relationship_edit',
            ],
            [
                'id'    => 103,
                'title' => 'soggetti_relationship_show',
            ],
            [
                'id'    => 104,
                'title' => 'soggetti_relationship_delete',
            ],
            [
                'id'    => 105,
                'title' => 'soggetti_relationship_access',
            ],
            [
                'id'    => 106,
                'title' => 'grab_data_mexal_create',
            ],
            [
                'id'    => 107,
                'title' => 'grab_data_mexal_edit',
            ],
            [
                'id'    => 108,
                'title' => 'grab_data_mexal_show',
            ],
            [
                'id'    => 109,
                'title' => 'grab_data_mexal_delete',
            ],
            [
                'id'    => 110,
                'title' => 'grab_data_mexal_access',
            ],
            [
                'id'    => 111,
                'title' => 'exportlog_create',
            ],
            [
                'id'    => 112,
                'title' => 'exportlog_edit',
            ],
            [
                'id'    => 113,
                'title' => 'exportlog_show',
            ],
            [
                'id'    => 114,
                'title' => 'exportlog_delete',
            ],
            [
                'id'    => 115,
                'title' => 'exportlog_access',
            ],
            [
                'id'    => 116,
                'title' => 'system_table_access',
            ],
            [
                'id'    => 117,
                'title' => 'organizzazione_access',
            ],
            [
                'id'    => 118,
                'title' => 'dealer_create',
            ],
            [
                'id'    => 119,
                'title' => 'dealer_edit',
            ],
            [
                'id'    => 120,
                'title' => 'dealer_show',
            ],
            [
                'id'    => 121,
                'title' => 'dealer_delete',
            ],
            [
                'id'    => 122,
                'title' => 'dealer_access',
            ],
            [
                'id'    => 123,
                'title' => 'dealer_point_create',
            ],
            [
                'id'    => 124,
                'title' => 'dealer_point_edit',
            ],
            [
                'id'    => 125,
                'title' => 'dealer_point_show',
            ],
            [
                'id'    => 126,
                'title' => 'dealer_point_delete',
            ],
            [
                'id'    => 127,
                'title' => 'dealer_point_access',
            ],
            [
                'id'    => 128,
                'title' => 'agenti_create',
            ],
            [
                'id'    => 129,
                'title' => 'agenti_edit',
            ],
            [
                'id'    => 130,
                'title' => 'agenti_show',
            ],
            [
                'id'    => 131,
                'title' => 'agenti_delete',
            ],
            [
                'id'    => 132,
                'title' => 'agenti_access',
            ],
            [
                'id'    => 133,
                'title' => 'dealer_mandati_create',
            ],
            [
                'id'    => 134,
                'title' => 'dealer_mandati_edit',
            ],
            [
                'id'    => 135,
                'title' => 'dealer_mandati_show',
            ],
            [
                'id'    => 136,
                'title' => 'dealer_mandati_delete',
            ],
            [
                'id'    => 137,
                'title' => 'dealer_mandati_access',
            ],
            [
                'id'    => 138,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
