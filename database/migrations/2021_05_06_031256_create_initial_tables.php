<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('max_users');
            $table->decimal('price');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        DB::table('subscription_plans')->insert(
            array(
                'name' => 'Tiny',
                'description' => 'Up to 10',
                'max_users' => 10,
                'price' => 10,
                'is_active' => true
            )
        );
        DB::table('subscription_plans')->insert(
            array(
                'name' => 'Small',
                'description' => '11 to 25',
                'max_users' => 25,
                'price' => 25,
                'is_active' => true
            )
        );
        DB::table('subscription_plans')->insert(
            array(
                'name' => 'Medium',
                'description' => '26 to 50',
                'max_users' => 75,
                'price' => 50,
                'is_active' => true
            )
        );
        DB::table('subscription_plans')->insert(
            array(
                'name' => 'Large',
                'description' => '51 to 100',
                'max_users' => 100,
                'price' => 100,
                'is_active' => true
            )
        );
        DB::table('subscription_plans')->insert(
            array(
                'name' => 'Extra Large',
                'description' => '101 to 250',
                'max_users' => 250,
                'price' => 250,
                'is_active' => true
            )
        );
        DB::table('subscription_plans')->insert(
            array(
                'name' => 'HUUUGE',
                'description' => '251 to 1000',
                'max_users' => 1000,
                'price' => 500,
                'is_active' => true
            )
        );
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_plan_id')->nullable();
            $table->string('company_name');
            $table->string('slug');
            $table->string('stripe_key')->nullable();
            $table->date('free_trial_end_date')->nullable();
            $table->boolean('is_free_trial')->default(true);
            $table->boolean('is_subscription_setup')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('subscription_plan_id')
                ->references('id')
                ->on('subscription_plans')
                ->onDelete('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->after('password', function ($table) {
                $table->unsignedBigInteger('company_id');
                $table->boolean('is_owner')->default(false);
            });

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');
        });
        Schema::create('league_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_active');
            $table->timestamps();
        });
        DB::table('league_types')->insert(
            array(
                'name' => 'NBA',
                'is_active' => true
            )
        );
        DB::table('league_types')->insert(
            array(
                'name' => 'NFL',
                'is_active' => true
            )
        );
        DB::table('league_types')->insert(
            array(
                'name' => 'MLB',
                'is_active' => true
            )
        );
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('league_type_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('number_of_weeks');
            $table->integer('current_week')->default(1);
            $table->integer('year');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_completed')->default(false);
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');
            
            $table->foreign('league_type_id')
                ->references('id')
                ->on('league_types')
                ->onDelete('cascade');
        });
        Schema::create('league_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('league_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('score')->default(0);
            $table->boolean('is_active')->default(true);
            $table->integer('final_place')->default(0);
            $table->timestamps();

            $table->unique(['league_id', 'user_id']);
            
            $table->foreign('league_id')
                ->references('id')
                ->on('leagues')
                ->onDelete('cascade');
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
        Schema::create('quizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('league_id');
            $table->integer('round');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            
            $table->foreign('league_id')
                ->references('id')
                ->on('leagues')
                ->onDelete('cascade');
        });
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('league_type_id');
            $table->string('name');
            $table->string('city');
            $table->string('logo')->nullable();
            $table->timestamps();
            
            $table->foreign('league_type_id')
                ->references('id')
                ->on('league_types')
                ->onDelete('cascade');
        });
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('league_type_id');
            $table->unsignedBigInteger('home_team_id');
            $table->unsignedBigInteger('away_team_id');
            $table->unsignedBigInteger('winner_id')->nullable();
            $table->integer('home_team_score');
            $table->integer('away_team_score');
            $table->boolean('is_over')->default(false);
            $table->dateTime('tip_off');
            $table->timestamps();
            
            $table->foreign('league_type_id')
                ->references('id')
                ->on('league_types')
                ->onDelete('cascade');
            
            $table->foreign('home_team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
            
            $table->foreign('away_team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
            
            $table->foreign('winner_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
        });
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id');
            $table->unsignedBigInteger('game_id');
            $table->dateTime('due_date');
            $table->timestamps();
            
            $table->unique(['quiz_id', 'game_id']);
            
            $table->foreign('quiz_id')
                ->references('id')
                ->on('quizes')
                ->onDelete('cascade');
            
            $table->foreign('game_id')
                ->references('id')
                ->on('games')
                ->onDelete('cascade');
        });
        Schema::create('quiz_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_question_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('answer_id');
            $table->boolean('is_correct')->default(false);
            $table->timestamps();
            
            $table->unique(['quiz_question_id', 'user_id']);
            
            $table->foreign('quiz_question_id')
                ->references('id')
                ->on('quiz_questions')
                ->onDelete('cascade');
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            
            $table->foreign('answer_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('last_league_id')
                ->references('id')
                ->on('leagues')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}