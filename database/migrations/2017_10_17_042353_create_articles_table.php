<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id')->comment('文章表主键');
            $table->unsignedInteger('category_id')->default(0)->comment('分类id');
            $table->char('title', 100)->default('')->comment('标题');
            $table->string('author', 15)->default('')->comment('作者');
            $table->mediumText('content', 16777215)->comment('markdown文章内容');
            $table->mediumText('html', 16777215)->comment('markdown转的html页面');
            $table->char('description')->default('')->comment('描述');
            $table->string('keywords')->default('')->comment('关键词');
            $table->boolean('status')->default(0)->comment('是否发布 1是 0否');
            $table->integer('click')->unsigned()->default(0)->comment('点击数');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
