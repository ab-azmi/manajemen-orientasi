<?php

use App\Models\Tugas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach(DB::table('tugas')->oldest('id')->cursor() as $tugas){
            DB::table('rich_texts')->insert([
                'field' => 'deskripsi',
                'body' => "<div> {$tugas->deskripsi} </div>",
                'record_type' => (new Tugas)->getMorphClass(),
                'record_id' => $tugas->id,
                'created_at' => $tugas->created_at,
                'updated_at' => $tugas->updated_at
            ]);
        }

        Schema::table('tugas', function(Blueprint $table){
            $table->dropColumn('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
