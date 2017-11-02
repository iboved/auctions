<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;

class Auctioneer extends Model
{
    use Spatial, Sluggable;

    const AUCTIONEER = 1;
    const AUCTION_GALLERY = 2;

    protected $spatial = ['coordinates'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'is_enabled'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Return the formatted address.
     *
     * @return string
     */
    public function getFormattedAddress(): string
    {
        $address[] = $this->street;
        $address[] = $this->city;

        if (!empty($this->state) || !empty($this->zip_code)) {
            $address[] = trim($this->state . ' ' . $this->zip_code);
        }

        return implode(', ', $address);
    }
}
