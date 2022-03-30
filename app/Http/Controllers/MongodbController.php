<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MongoDB\Client;

class MongodbController extends Controller
{
    //

    public function mongo(Request $request)
    {
        //  $client = new \MongoDB\Client(
        //  'mongodb+srv://juanvalencia:Twym8XpdMzFBR9IF@cluster0.omzyq.mongodb.net/test?retryWrites=true&w=majority');
        //  $db =$client->test;

        // $collection = $db->test;
        // $collection->insertOne(['name'=>'Tom', 'email'=>'tom@tester.com']);
        // $filtrar = array();
        // $options = array();
        // $db = $client->listDatabaseNames();


        // DB::connection('mongodb')->collection('Clientes')->insert(['name'=>'Tom', 'edad'=>34]);

        DB::connection('mongodb')->collection('Clientes')->where(['name'=>'Tom'])->update(['edad'=>42]);

        // DB::connection('mongodb')->collection('Clientes')->where(['name'=>'Tom'])->delete();

        $clientes = DB::connection('mongodb')->collection('Clientes')->get();
        // dd($clientes);
        return $clientes;
    }
}
