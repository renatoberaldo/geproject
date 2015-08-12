<?php


namespace GeProj\Transformers;

use GeProj\Entities\Client;
use League\Fractal\TransformerAbstract;

class ProjectClientTransformer extends TransformerAbstract
{
    public function transform(Client $client)
    {
        return[
            'client_id' => $client->id,
            'name' => $client->name,
            'responsible' => $client->responsible,
            'email' => $client->email,
        ];
    }
}