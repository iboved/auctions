<?php

namespace App\Widgets;

use App\Auctioneer;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;

class Auctioneers extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Auctioneer::count();
        $string = trans_choice('voyager.dimmer.auctioneer', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-people',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager.dimmer.auctioneer_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.auctioneer_link_text'),
                'link' => route('voyager.auctioneers.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }
}
