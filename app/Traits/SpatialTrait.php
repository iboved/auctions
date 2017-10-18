<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait SpatialTrait
{
    /**
     * Get location as WKT from Geometry for given field.
     *
     * @param string $column
     *
     * @return string WKT
     */
    public function getLocation($column)
    {
        $model = self::select(DB::Raw('ST_AsText('.$column.') AS '.$column))
            ->where('id', $this->id)
            ->first();

        if (isset($model)) {
            return $model->$column;
        }

        return null;
    }

    /**
     * Format and return array of (lat,lng) pairs of points fetched from the database.
     *
     * @return array $coords
     */
    public function getCoordinates()
    {
        $coords = [];

        if (!empty($this->spatial)) {
            foreach ($this->spatial as $column) {
                $clear = trim(preg_replace('/[a-zA-Z\(\)]/', '', $this->getLocation($column)));
                if (!empty($clear)) {
                    foreach (explode(',', $clear) as $point) {
                        list($lat, $lng) = explode(' ', $point);
                        $coords[] = [
                            'lat' => $lat,
                            'lng' => $lng,
                        ];
                    }
                }
            }
        }

        return $coords;
    }
}