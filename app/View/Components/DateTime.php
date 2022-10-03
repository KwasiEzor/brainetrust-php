<?php

namespace App\View\Components;


use Carbon\Carbon;

use Illuminate\View\Component;

class DateTime extends Component

{

    public $date;

    public $format;

    public function __construct(Carbon $date, $format = null)
    {
        $this->date = $date->setTimezone($this->timezone());

        $this->format = $format;
    }

    public function render()
    {
        return $this->date->format($this->format());
    }

    protected function format()
    {
        return $this->format ?? 'Y-m-d H:i:s';
    }

    protected function timezone()
    {
        return optional(auth()->user())->timezone ?? 'Europe/Brussels';
    }
}
