<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTouristInfoToTouristInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('tourist_info', 'tourist_infos');
    }

    public function down()
    {
        Schema::rename('tourist_infos', 'tourist_info');
    }
}