<?php

namespace App\Providers\Html;

class CardBuilder
{
    protected $type;
    protected $head;
    protected $image;
    protected $body;
    protected $foot;

    public function __construct($type = '', $head = null, $image = null, $body = null, $foot = null)
    {
        $this->type = $type;
        $this->head = $head;
        $this->image = $image;
        $this->body = $body;
        $this->foot = $foot;
    }

    public function __toString() 
    {
        $s = '<div class="card '.$this->type.'">';
        if ($this->head) 
        {
            $s .= '<div class="card-header">'.$this->head.'</div>';
        }
        if($this->image)
        {
            $s = '<img class="card-img-top img-fuild"'.$this->image.'>';
        }
        if ($this->body) 
        {
            $s .= '<div class="card-body">'.$this->body.'</div>';
        }
        if ($this->foot) 
        {
            $s .= '<div class="card-footer bg-transparent border-success">'.$this->foot.'</div>';
        }
        $s .= "</div>";
        return $s;
    }

    public function type($type) 
    {
        $this->type = $type;
        return $this;
    }

    public function head($head) 
    {
        $this->head = $head;
        return $this;
    }

    public function image($image) 
    {
        $this->image = $image;
        return $this;
    }

    public function body($body) 
    {
        $this->body = $body;
        return $this;
    }

    public function footer($foot) 
    {
        $this->foot = $foot;
        return $this;
    }
}