<?php

namespace App\Widgets;

use App\User;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class PageDimmer extends AbstractWidget
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
        if (User::isAdmin()){
            $count = Voyager::model('Page')->count();
            $string = trans_choice('voyager.dimmer.page', $count);
            return view('voyager::dimmer', array_merge($this->config, [
                'icon'   => 'voyager-file-text',
                'title'  => "{$count} {$string}",
                'text'   => __('voyager.dimmer.page_text', ['count' => $count, 'string' => Str::lower($string)]),
                'button' => [
                    'text' => __('voyager.dimmer.page_link_text'),
                    'link' => route('voyager.pages.index'),
                ],
                'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
            ]));
        }else{
            $count = Voyager::model('Page')->count();//Voyager::model('Role')::where('id', \Auth::user()->role_id)->first()
            $string = trans_choice('voyager.dimmer.page', $count);
            return view('voyager::dimmer', array_merge($this->config, [
                'icon'   => 'voyager-play',
                'title'  => "{$count} {$string}",
                'text'   => __('voyager.dimmer.page_text', ['count' => $count, 'string' => Str::lower($string)]),
                'button' => [
                    'text' => __('voyager.dimmer.page_link_text'),
                    'link' => route('voyager.pages.index'),
                ],
                'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
            ]));
        }
    }
}
