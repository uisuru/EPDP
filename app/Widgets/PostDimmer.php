<?php

namespace App\Widgets;

use App\User;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class PostDimmer extends AbstractWidget
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
        if (User::isAdmin()) {
            $count = Voyager::model('Post')->count();
            $string = trans_choice('voyager.dimmer.post', $count);

            return view('voyager::dimmer', array_merge($this->config, [
                'icon' => 'voyager-question',
                'title' => "{$count} total Questions",
                'text' => __("Users have asked {$count} Question. Click on button below to view all of them."),
                'button' => [
                    'text' => __('View All Questions'),
                    'link' => route('voyager.questions.index'),
                ],
                'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
            ]));
        } else {
            $count = Voyager::model('Post')::where('author_id', \Auth::id())->count();//Voyager::model('Role')::where('id', \Auth::user()->role_id)->first()
            $string = trans_choice('voyager.dimmer.post', $count);

            return view('voyager::dimmer', array_merge($this->config, [
                'icon' => 'voyager-question',
                'title' => "{$count} total Questions",
                'text' => __("You have asked {$count} Question. Click on button below to view all of them."),
                'button' => [
                    'text' => __('View My Questions'),
                    'link' => route('voyager.questions.index'),
                ],
                'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
            ]));
        }
    }
}
