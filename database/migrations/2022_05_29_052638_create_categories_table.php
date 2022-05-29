<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
			$table->string('category_name');
			$table->string('img_path');
            $table->timestamps();
        });
		
		// Insert some categories
		DB::table('categories')->insert([
			[
				'category_name' => 'Food Stuff',
				'img_path' => 'https://source.unsplash.com/1SPu0KT-Ejg'
			],
			[
				'category_name' => 'Toys',
				'img_path' => 'https://source.unsplash.com/kn-UmDZQDjM'
			],
			[
				'category_name' => 'Furniture',
				'img_path' => 'https://source.unsplash.com/xwM61TPMlYk'
			],
			[
				'category_name' => 'Beauty',
				'img_path' => 'https://source.unsplash.com/xwM61TPMlYk'
			]
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
