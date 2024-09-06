<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         'id' => 1,
         'nome' => 'Like Admin',
         'email' => 'dev@likepublicidade.com',
         'password' => bcrypt('admin'),
         'nivel' => 1,
       ]);
        DB::table('empresa')->insert([
         'id' => 1,
         'nomefantasia' => 'Hotel Presidente',
         'telefone' => '(99) 3017-9200',
         'email' => 'hotelpresidente@email.com',
         'endereco' => 'Rua Coronel Manoel Bandeira 1774',
         'cep' => '65900-000',
         'cidade' => 'Imperatriz',
         'estado' => 'Maranhão',
         'pais' => 'Brasil',
         'facebook' => 'https://www.facebook.com/pages/Hotel-Presidente/185584211478979',
         'nossahistoria' => 'Não existe nada melhor do que se sentir confortável e acolhido mesmo longe de casa, nós sabemos disso e por isso oferecemos uma experiência única aos nossos hóspedes. O Hotel Presidente foi fundado na década de 70 por uma mulher visionária,  Dona Raimundinha - como carinhosamente ficou conhecida.

Sempre dedicada, ela era autodidata e aprendeu na prática administração e gerenciamento de pessoas. Seus valores humanizados são os pilares que norteiam a base do nosso atendimento. O Hotel Presidente é pioneiro na cidade de Imperatriz - ele foi o primeiro empreendimento no ramo hoteleiro na cidade - chegou com uma estrutura pequena mas já revolucionária para os padrões imperatrizenses na época - com dois pavimentos e apartamentos. O nome curioso do empreendimento foi uma homenagem da fundadora ao presidente Juscelino Kubitscheck.

Sempre buscando se expandir, logo ele cresceu e em 1976 sua primeira obra foi concluída. Ao longo dos anos ele foi se fortalecendo na região, conquistando os hóspedes mais exigentes e garantindo uma estadia de nível presidencial para  todos os visitantes.',
       ]);
    }
}
