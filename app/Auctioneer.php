<?php

namespace App;

use App\Traits\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

class Auctioneer extends Model
{
    use SpatialTrait;

    const AUCTIONEER = 1;
    const AUCTIONEER_GALLERY = 2;

    protected $spatial = ['coordinates'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
