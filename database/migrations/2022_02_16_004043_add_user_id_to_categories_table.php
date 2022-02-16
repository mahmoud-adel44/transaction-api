<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->nullable()->constrained();
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
}
