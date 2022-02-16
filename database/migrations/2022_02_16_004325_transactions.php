<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transactions extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->nullable()->constrained();
        });
    }

    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
}
