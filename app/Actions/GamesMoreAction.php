<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class GamesMoreAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Tickest';
    }

    public function getIcon()
    {
        return 'voyager-ticket';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-default pull-right',
            'style' => $this->data->status == 'impresión' ? 'display: block' : 'display: none'
        ];
    }

    public function getDefaultRoute()
    {
        return route('games.tickets.index', $this->data->id);
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'games';
    }
}