<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MongodbController extends Controller
{
    //

    public function mongo(Request $request)
    {
        // $client = new \MongoDB\Client(
        // 'mongodb+srv://juanvalencia:Twym8XpdMzFBR9IF@cluster0.omzyq.mongodb.net/test?retryWrites=true&w=majority');

        // $filtrar = array();
        // $options = array();
        // $db = $client->listDatabaseNames();

        $clientes = DB::connection('mongodb')->collection('Clientes')->get();
        // dd($clientes);
        return $clientes;
    }
}
