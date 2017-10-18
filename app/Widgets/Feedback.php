<?php

namespace App\Widgets;

use App\Feedback as FeedbackModel;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;

class Feedback extends AbstractWidget
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
        $count = FeedbackModel::count();
        $string = trans('voyager.dimmer.feedback');

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-chat',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager.dimmer.feedback_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.feedback_link_text'),
                'link' => route('voyager.feedback.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }
}
