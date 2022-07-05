<?php 

namespace App\Filters;

use EloquentFilter\ModelFilter;

class PropertyFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function code($q)
    {
        return $this->where('code', $q);
    }

    public function purpose($q)
    {
        return $this->related('purpose', 'slug', '=', $q);
    }

    public function transaction($q)
    {
        return $this->where('transactions->'.$q.'->status', 'on');
    }

    public function city($q)
    {
        return $this->related('location', 'city_slug', '=', $q);
    }

    public function neighborhood($q)
    {
        return $this->related('location', 'neighborhood_slug', '=', $q);
    }
}
