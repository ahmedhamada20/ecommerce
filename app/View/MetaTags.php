<?php
namespace App\View\Components;

use Illuminate\View\Component;

class MetaTags extends Component
{
    public $seoMetadata;

    public function __construct($seoMetadata)
    {
        $this->seoMetadata = $seoMetadata;
    }

    public function render()
    {
        return view('components.meta-tags');
    }
}
