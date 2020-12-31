<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserMoneyCache;
use App\Models\UserMoneyTransaction;
use App\Models\UserRunForMoneyCache;
use App\Models\UserRunForMoneyResult;
use Carbon\Carbon;
use Illuminate\Console\Command;

class EveryMinutesBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:every-minutes-batch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '毎分実行するバッチプログラム';

    /**
     * @var int
     */
    private $includeSeconds = 65000;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Started every minutes batch');
        $this->calcUserMoneyCache();
        $this->calcUserRunForMoneyCache();
        $this->info('Completed every minutes batch');
        return 0;
    }

    public function calcUserMoneyCache(){
        $moneyTransactions = UserMoneyTransaction::where('created_at', '>', Carbon::now()->subSeconds($this->includeSeconds))->get()->all();
        $users = array_values(array_unique(array_map(function(UserMoneyTransaction $transaction){return $transaction->user;}, $moneyTransactions)));
        foreach($users as $user){
            if($existsCache = UserMoneyCache::where('user_id', '=', $user->id)->first()){
                $maxTransactionId = $existsCache->max_transaction_id;
                $transactions = $user->moneyTransactions()->where('id', '>', $maxTransactionId)->orderByDesc('id')->get();
                if(count($transactions) === 0){
                    continue;
                }else{
                    $amount = $existsCache->amount;
                    foreach($transactions as $transaction){
                        $amount += $transaction->amount;
                    }
                    $existsCache->amount = $amount;
                    $existsCache->max_transaction_id = $transactions[0]->id;
                    $existsCache->save();
                }
            }else{
                $amount = 0;
                $transactions = $user->moneyTransactions()->orderByDesc('id')->get();
                foreach($transactions as $transaction){
                    $amount += $transaction->amount;
                }
                UserMoneyCache::create(
                    [
                        'user_id' => $user->id,
                        'amount' => $amount,
                        'max_transaction_id' => $transactions[0]->id,
                    ]
                );
            }
        }
        $this->info('Processed ' . count($users) . ' users');
    }

    public function calcUserRunForMoneyCache(){
        $runForMoneyResults = UserRunForMoneyResult::where('created_at', '>', Carbon::now()->subSeconds($this->includeSeconds))->get()->all();
        $users = array_values(array_unique(array_map(function(UserRunForMoneyResult $result){return $result->user;}, $runForMoneyResults)));
        foreach($users as $user){
            if($existsCache = UserRunForMoneyCache::where('user_id', '=', $user->id)->first()){
                $maxResultId = $existsCache->max_result_id;
                $results = $user->runForMoneyResults()->where('id', '>', $maxResultId)->orderByDesc('id')->get();
                if(count($results) === 0){
                    continue;
                }else{
                    $clear = $existsCache->clear;
                    $death = $existsCache->death;
                    $catch = $existsCache->catch;
                    $surrender = $existsCache->surrender;
                    $revival = $existsCache->revival;
                    foreach($results as $result){
                        $clear += $result->clear;
                        $death += $result->death;
                        $catch += $result->catch;
                        $surrender += $result->surrender;
                        $revival += $result->revival;
                    }
                    $existsCache->clear = $clear;
                    $existsCache->death = $death;
                    $existsCache->catch = $catch;
                    $existsCache->surrender = $surrender;
                    $existsCache->revival = $revival;
                    $existsCache->max_result_id = $results[0]->id;
                    $existsCache->save();
                }
            }else{
                $clear = 0;
                $death = 0;
                $catch = 0;
                $surrender = 0;
                $revival = 0;
                $results = $user->runForMoneyResults()->orderByDesc('id')->get();
                foreach($results as $result){
                    $clear += $result->clear;
                    $death += $result->death;
                    $catch += $result->catch;
                    $surrender += $result->surrender;
                    $revival += $result->revival;
                }
                UserRunForMoneyCache::create(
                    [
                        'user_id' => $user->id,
                        'clear' => $clear,
                        'death' => $death,
                        'catch' => $catch,
                        'surrender' => $surrender,
                        'revival' => $revival,
                        'max_result_id' => $results[0]->id,
                    ]
                );
            }
        }
        $this->info('Processed ' . count($users) . ' users');
    }
}
