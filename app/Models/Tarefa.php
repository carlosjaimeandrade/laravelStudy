<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    //senao for definido aqui a tabela ele irá assumir que é o nome do model no plural Tarefa's'
    /* protected $table ='tarefas'; */
    //senão definir a variavel de chave primaria ele irá definir como 'id' automaticamente
    /* protected $primaryKey = 'id'; */
    // caso não defina para chave primaria, a chave primaria vem como auto incremente, caso deseja desaivar basta colocar false
    /* public $incrementing = false; */
    // caso não defina para chave primaria, a chave primaria sera padrã int
    /* protected $keyType ='string'; */

    // ele ira supor que tem os 2 campos created_at, update_at no banco de dados;
    // você pode desligar 
    public $timestamps = false;

    // caso tenha e esta com outro nome de coluna
/*  CONST CREATED_AT = 'date_created';
    CONST UPDATE_AT = 'date_updated' */


    //usando model

}
