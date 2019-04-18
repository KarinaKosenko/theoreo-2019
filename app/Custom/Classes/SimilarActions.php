<?php

namespace App\Custom\Classes;


use App\Models\Action;

class SimilarActions
{
    protected $id = null;
    protected $tags = [];

    /**
     * Similar constructor.
     * @param \Illuminate\Database\Eloquent\Model|null|object|static $action
     */
    public function __construct($action)
    {
        $this->id = $action->id;
        foreach ($action->tags as $tag) {
            $this->tags[] = $tag->code;
        }
    }

    public function get()
    {
        return Action::where('id', '<>', $this->id)
        ->inDate()
        ->whereHas('tags', function ($query) {
            $query->whereIn('code', $this->tags);
        })
        ->withCount(['tags' => function ($query) {
            $query->whereIn('code', $this->tags);
        }])
            ->orderBy('tags_count', 'desc')
            ->orderBy('created_at', 'desc')
        ->get();
    }
}