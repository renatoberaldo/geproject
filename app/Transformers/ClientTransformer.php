<?php
/**
 * Created by PhpStorm.
 * User: motamonteiro
 * Date: 05/08/15
 * Time: 23:22
 */

namespace GeProj\Transformers;

use GeProj\Entities\Client;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{

    public function transform(Client $client)
    {
        return[
            'client_id' => $client->id,
            'name' => $client->name,
            'responsible' => $client->responsible,
            'email' => $client->email,
            'phone' => $client->phone,
            'address' => $client->address,
            'obs' => $client->obs,
        ];
    }

}