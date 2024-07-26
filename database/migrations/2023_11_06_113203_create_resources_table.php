<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->integer('resource_category_id')->nullable();
            $table->integer('resource_subcategory_id')->nullable();
            $table->string('resource_title')->nullable();
            $table->string('resource_slug')->nullable();
            $table->text('resource_short_desc')->nullable();
            $table->string('resource_keywords')->nullable();
            $table->longText('resource_desc')->nullable();
            $table->text('resource_file')->nullable();
            $table->text('resource_flipbook_url')->nullable();
            $table->text('resource_image')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
};
