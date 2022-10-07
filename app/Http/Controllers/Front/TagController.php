<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TagsRepository;

class TagController extends Controller
{
    private $TagRepo;

    public function __construct(TagsRepository $TagRepo)
    {
        $this->TagRepo =  $TagRepo;
    }


    public function show($slug)
    {
        return view(
            'front.pages.tags.tag',
            [
                'tags' => $this->TagRepo->getTag($slug),
            ]
        );
    }
}
