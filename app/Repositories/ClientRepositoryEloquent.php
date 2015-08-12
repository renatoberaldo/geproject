<?php
/**
 * Created by PhpStorm.
 * User: motamonteiro
 * Date: 22/07/15
 * Time: 23:44
 */

namespace GeProj\Repositories;


use GeProj\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    public function model()
    {
        return Client::class;
    }

}