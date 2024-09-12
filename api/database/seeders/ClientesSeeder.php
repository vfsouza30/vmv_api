<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Clientes;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'nome_cliente' => 'ADN',
                'email_cliente'=> 'vmv.adnconstrucoes@gmail.com',
                'token_cliente' => '2cf9fd15f1040f6f455d19f626b924dfed05bd15',
                'url_cliente' => 'https://adn.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'ARTHROS',
                'email_cliente'=> 'vmv.arthros@gmail.com',
                'token_cliente' => 'b6c6fafff33d5cd5b7fad4c79a8988d11be8f520',
                'url_cliente' => 'https://arthros.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'CM ENGENHARIA',
                'email_cliente'=> 'vmv.cmengenharia@gmail.com',
                'token_cliente' => 'a12d8b6564fb537665707d3e3fe3301bc04b57a7',
                'url_cliente' => 'https://grupocm.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'CONIE',
                'email_cliente'=> 'vmv.conie@gmail.com',
                'token_cliente' => 'fd52c46663c2d517b62a87c598ebc8b602ec8e7c',
                'url_cliente' => 'https://conie.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'CRESCER',
                'email_cliente'=> 'vmv.crescer@gmail.com',
                'token_cliente' => 'cc7ceaab8340e8cc8e20fd3025b8198203ede064',
                'url_cliente' => 'https://crescer.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'DMC',
                'email_cliente'=> 'vmv.dmcconstrutora@gmail.com',
                'token_cliente' => '757dd32dfd03051308d7a198e16028be090309a9',
                'url_cliente' => 'https://dmc.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'EPH',
                'email_cliente'=> 'vmv.ephincorporadora@gmail.com',
                'token_cliente' => '56b0c56cc7c1979441a41f10c95b62f8d1a3e3bc',
                'url_cliente' => 'https://eph.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'F2',
                'email_cliente'=> 'vmv.f2construtora@gmail.com',
                'token_cliente' => '4cc376d2584409cd6760362ea109bfe658a085f5',
                'url_cliente' => 'https://f2incorporadora.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'HOPPE',
                'email_cliente'=> 'vmv.hoppe@gmail.com',
                'token_cliente' => '04fecb99de8f8e0b488ee34ea6885413df107019',
                'url_cliente' => 'https://hoppe.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'IMPACTO',
                'email_cliente'=> 'vmv.impactoconstrutora@gmail.com',
                'token_cliente' => '7fe30d6f10c51a56b16fd26ad94a80c5c5c642f0',
                'url_cliente' => 'https://impacto.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'MRP',
                'email_cliente'=> 'mrp.vmv@gmail.com',
                'token_cliente' => '967637ca2d112533347a794bf1d173bb00d48af0',
                'url_cliente' => 'https://mrp.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'OTOCH',
                'email_cliente'=> 'vmv.otoch@gmail.com',
                'token_cliente' => 'c1edd73cdd45326e37e859a3be9ac450dcbd358d',
                'url_cliente' => 'https://otoch.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'RECEL',
                'email_cliente'=> 'vmv.recel@gmail.com',
                'token_cliente' => '7045833228f096052e6f53fa9cbef97d7c9fef53',
                'url_cliente' => 'https://amazonia.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'ROCHA',
                'email_cliente'=> 'vmv.rochaconstrutora@gmail.com',
                'token_cliente' => '945f170615de7871238786432c5e1d7351abb2ec',
                'url_cliente' => 'https://rocha.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'SALL',
                'email_cliente'=> 'vmv.sallincorporadora@gmail.com',
                'token_cliente' => '4ad1f84449359c4194a21fc6c6b5eb849939ebb2',
                'url_cliente' => 'https://sall.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'SINDUSCONCE',
                'email_cliente'=> 'mariana@vmv.group',
                'token_cliente' => 'c30bcef991b42b916d3f7f74b4cced067bf5851d',
                'url_cliente' => 'https://sindusconce.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'TENORIO',
                'email_cliente'=> 'vmv.tenoriosimoes@gmail.com',
                'token_cliente' => '2c8bd21c953f5596722d000403fb814cc6436a09',
                'url_cliente' => 'https://tenoriosimoes.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'URBEN',
                'email_cliente'=> 'vmv.urben@gmail.com',
                'token_cliente' => '1dbbab230eb2de4b7db5e77d57128737f7f99916',
                'url_cliente' => 'https://urben.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'VICTA',
                'email_cliente'=> 'vmv.victa@gmail.com',
                'token_cliente' => '84102060b9f66fbf33a6843f1a09e249d35c43495',
                'url_cliente' => 'https://victa.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'VL CONSTRUTORA',
                'email_cliente'=> 'vmv.vlconstrutora@gmail.com',
                'token_cliente' => '7bb4da4ea3a17730c2094aa2818581a4e2546e775',
                'url_cliente' => 'https://vlconstrutora.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'W3',
                'email_cliente'=> 'vmv.w3engenharia@gmail.com',
                'token_cliente' => '0ec1e2cf6720465eb895ced6bf65b6bbcb8d327b',
                'url_cliente' => 'https://w3.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
            [
                'nome_cliente' => 'WANDERLEY',
                'email_cliente'=> 'vmv.wanderleyconstrucoes@gmail.com',
                'token_cliente' => '6ad82a026f10e95ec8170be8c223b532ceaa2a3d',
                'url_cliente' => 'https://wanderley.cvcrm.com.br/',
                'ativo' => 'ativo',
                'created_at'=> '2024-09-11 23:35:00',
                'updated_at'=> '2024-09-11 23:35:00'
            ],
        ]);
    }
}
