<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class Worker
 * @package App
 * @mixin Builder
 */

class Worker extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'special', 'vts', 'gts', 'kab', 'sort', 'slug', 'otdel_id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 's_name'
            ]
        ];
    }

    public function otdel(){
        return $this->belongsTo(Otdel::class);
    }


}
