<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserToPrimaryDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_to_primary_dashboards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned()->nullable(false)->unique();
            $table->foreign("user_id")->references("id")->on("users")
                ->onUpdate("cascade")->onDelete("cascade");

            $table->bigInteger("dashboard_id")->unsigned()->nullable(false);
            $table->foreign("dashboard_id")->references("id")->on("dashboards")
                ->onUpdate("cascade")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_to_primary_dashboards');
    }
}
