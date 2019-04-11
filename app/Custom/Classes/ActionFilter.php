<?php

namespace App\Custom\Classes;


use App\Models\Action;
use Illuminate\Support\Collection;

class ActionFilter
{
    protected $search_text;
    protected $actions;

    /**
     * ActionFilter constructor.
     * @param $search_text
     */
    public function __construct($search_text)
    {
        $this->search_text = $search_text;
        $this->actions = new Collection();
    }

    public function find()
    {

        $filters = [
            ['title', $this->search_text],
            ['title', '%' . $this->search_text . '%'],
            ['text', $this->search_text],
            ['text', '%' . $this->search_text . '%'],
        ];

        foreach ($filters as $filter) {
            $this->actions = $this->actions->merge(self::getAction($filter));
        }

        return $this->actions->unique();
    }

    protected function getAction($filter)
    {
        return Action::with(['tags', 'brand'])
            ->indate()
            ->where($filter[0], 'like', $filter[1])
            ->get();
    }
}