<?php

namespace App\Pagination;

use Illuminate\Pagination\BootstrapThreePresenter;

class PaginationPresenter extends BootstrapThreePresenter
{
    /**
     * Convert the URL window into Bootstrap HTML.
     *
     * @return string
     */
    public function render()
    {
        if ($this->hasPages()) {
            return sprintf(
                '<div class="pagination"><ol class="list">%s %s %s</ul></div>',
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
            );
        }

        return '';
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
        return '<li class="is-selected"><a href="#">'.$text.'</a></li>';
    }

    /**
     * Get HTML wrapper for disabled text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getDisabledTextWrapper($text)
    {
        return '<li class="is-disabled"><a href="#">'.$text.'</a></li>';
    }
}
