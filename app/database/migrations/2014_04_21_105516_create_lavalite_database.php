<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLavaliteDatabase extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
         public function up()
         {
            
             /**
             * Table: files
             */
            Schema::create('files', function($table) {
                $table->increments('id')->unsigned();
                $table->integer('of_id');
                $table->string('of_type', 250);
                $table->string('name', 255);
                $table->string('description', 1000);
                $table->string('category', 50)->nullable();
                $table->string('file', 100);
                $table->string('path', 255);
                $table->integer('size');
                $table->string('extension', 255);
                $table->string('mimetype', 255);
                $table->integer('user_id')->unsigned();
                $table->timestamp('deleted_at')->nullable();
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
            });


             /**
             * Table: groups
             */
            Schema::create('groups', function($table) {
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->text('permissions')->nullable();
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
            });


             /**
             * Table: menu_langs
             */
            Schema::create('menu_langs', function($table) {
                $table->increments('id');
                $table->integer('menu_id');
                $table->string('name', 250);
                $table->text('description');
                $table->string('lang', 5)->default("en");
            });


             /**
             * Table: menus
             */
            Schema::create('menus', function($table) {
                $table->increments('id');
                $table->integer('parent_id');
                $table->string('key', 100);
                $table->string('url', 100);
                $table->string('icon', 50)->nullable();
                $table->enum('open', array('New','Same'))->default("Same");
                $table->boolean('has_sub')->nullable();
                $table->integer('order');
                $table->boolean('status')->default("1");
                $table->timestamp('deleted_at')->nullable();
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
            });


             /**
             * Table: page_langs
             */
            Schema::create('page_langs', function($table) {
                $table->increments('id');
                $table->integer('page_id');
                $table->string('heading', 100);
                $table->text('content');
                $table->string('title', 200);
                $table->string('keyword', 200);
                $table->string('description', 200);
                $table->string('image', 50)->nullable();
                $table->text('abstract');
                $table->string('lang', 3)->default("en");
            });


             /**
             * Table: pages
             */
            Schema::create('pages', function($table) {
                $table->increments('id');
                $table->string('name', 50);
                $table->string('slug', 50);
                $table->integer('order');
                $table->string('banner', 100);
                $table->boolean('status')->default("1");
                $table->timestamp('deleted_at')->nullable();
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
            });


             /**
             * Table: revisions
             */
            Schema::create('revisions', function($table) {
                $table->increments('id')->unsigned();
                $table->string('revisionable_type', 255);
                $table->integer('revisionable_id');
                $table->integer('user_id')->nullable();
                $table->string('key', 255);
                $table->text('old_value')->nullable();
                $table->text('new_value')->nullable();
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
            });


             /**
             * Table: tagging_tagged
             */
            Schema::create('tagging_tagged', function($table) {
                $table->increments('id')->unsigned();
                $table->integer('taggable_id')->unsigned();
                $table->string('taggable_type', 255);
                $table->string('tag_name', 60);
                $table->string('tag_slug', 60);
            });


             /**
             * Table: tagging_tags
             */
            Schema::create('tagging_tags', function($table) {
                $table->increments('id')->unsigned();
                $table->string('slug', 60);
                $table->string('name', 60);
                $table->boolean('suggest');
                $table->integer('count')->unsigned();
            });


             /**
             * Table: throttle
             */
            Schema::create('throttle', function($table) {
                $table->increments('id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->string('ip_address', 255)->nullable();
                $table->integer('attempts');
                $table->boolean('suspended');
                $table->boolean('banned');
                $table->timestamp('last_attempt_at')->nullable();
                $table->timestamp('suspended_at')->nullable();
                $table->timestamp('banned_at')->nullable();
            });


             /**
             * Table: users
             */
            Schema::create('users', function($table) {
                $table->increments('id')->unsigned();
                $table->string('email', 255);
                $table->string('password', 255);
                $table->text('permissions')->nullable();
                $table->boolean('activated');
                $table->string('activation_code', 255)->nullable();
                $table->timestamp('activated_at')->nullable();
                $table->timestamp('last_login')->nullable();
                $table->string('persist_code', 255)->nullable();
                $table->string('reset_password_code', 255)->nullable();
                $table->string('first_name', 255)->nullable();
                $table->string('last_name', 255)->nullable();
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
            });


             /**
             * Table: users_groups
             */
            Schema::create('users_groups', function($table) {
                $table->integer('user_id')->unsigned();
                $table->integer('group_id')->unsigned();
            });


         }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
         public function down()
         {
            
            Schema::drop('files');
            Schema::drop('groups');
            Schema::drop('menu_langs');
            Schema::drop('menus');
            Schema::drop('page_langs');
            Schema::drop('pages');
            Schema::drop('revisions');
            Schema::drop('tagging_tagged');
            Schema::drop('tagging_tags');
            Schema::drop('throttle');
            Schema::drop('users');
            Schema::drop('users_groups');
         }

}