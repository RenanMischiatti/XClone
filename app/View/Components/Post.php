<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Post extends Component
{
    public $post;
    public $reply;

    public function __construct($post = null, $reply = false)
    {
        $this->post = $post;
        $this->reply = $reply;
    }

    public function render(): View|Closure|string
    {
        if ($this->reply) {
            return view('components.post-reply');
        }
        
        return view('components.post');
    }
}
