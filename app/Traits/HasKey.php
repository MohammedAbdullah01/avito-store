<?php

namespace App\Traits;

trait HasKey
{
     /**
     * Set the keys for a select query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSelectQuery($query)
    {
        foreach($this->primarykey as $key){
            $query->where($key , '='  ,$this->attributes[$key]);
        }
        
        return $query;
    }
}