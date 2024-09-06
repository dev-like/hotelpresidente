
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmailToEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


     public function up()
    {
      DB::statement('ALTER TABLE empresa MODIFY email  varchar(150) NULL;');
    }

   public function down()
   {
      DB::statement('ALTER TABLE empresa MODIFY email varchar(150) NULL;');
   }
}
