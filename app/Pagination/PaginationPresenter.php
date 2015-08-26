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

    /**
     * Get the previous page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getPreviousButton($text = '&laquo;')
    {
        // If the current page is less than or equal to one, it means we can't go any
        // further back in the pages, so we will render a disabled previous button
        // when that is the case. Otherwise, we will give it an active "status".
        if ($this->paginator->currentPage() <= 1) {
            return '<li class="is-disabled"><span class="icon fa fa-chevron-left" aria-hidden="true"></span>Prev</li>';
        }

        $url = $this->paginator->url(
            $this->paginator->currentPage() - 1
        );

        return '<li><a href="'.$url.'"><span class="icon fa fa-chevron-left" aria-hidden="true"></span>Prev</a></li>';
    }

    /**
     * Get the next page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getNextButton($text = '&raquo;')
    {
        // If the current page is greater than or equal to the last page, it means we
        // can't go any further into the pages, as we're already on this last page
        // that is available, so we will make it the "next" link style disabled.
        if (! $this->paginator->hasMorePages()) {
            return '<li class="is-disabled">Next<span class="icon fa fa-chevron-right" aria-hidden="true"></span></li>';
        }

        $url = $this->paginator->url($this->paginator->currentPage() + 1);

        return '<li><a href="'.$url.'">Next<span class="icon fa fa-chevron-right" aria-hidden="true"></span></a></li>';
    }
}
