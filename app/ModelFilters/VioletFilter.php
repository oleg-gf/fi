<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class VioletFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function selectioner($id)
    {
        if($id){
            return $this->where('selectioner_id', $id);
        }
        return $this;
    }
}
