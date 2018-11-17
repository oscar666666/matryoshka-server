<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RepliesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('replies')->insert([

      [
        'user_id' => 1,
        'review_id' => 1,
        'message' => "this is reply 1"
      ],
      [
        'user_id' => 1,
        'review_id' => 2,
        'message' => "this is reply 2"
      ]
    ]);
  }
}
