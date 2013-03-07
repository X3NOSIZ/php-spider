<?php
/**
 * @author Matthijs van den Bos <matthijs@vandenbos.org>
 * @copyright 2013 Matthijs van den Bos
 */

namespace VDB\Spider;

use VDB\URI\URI;

class StatsHandler
{
    protected $spiderId;

    protected $queued = array();

    protected $filtered = array();

    protected $failed = array();

    public function setSpiderId($spiderId)
    {
        $this->spiderId = $spiderId;
    }

    public function getSpiderId()
    {
        return $this->spiderId;
    }

    public function addToQueued(URI $uri)
    {
        $this->queued[] = $uri;
    }

    public function addToFiltered(Filterable $item)
    {
        $this->filtered[] = $item;
    }

    public function addToFailed($uriString, $reason)
    {
        $this->failed[$uriString] = $reason;
    }

    /**
     * @return URI[]
     */
    public function getQueued()
    {
        return $this->queued;
    }

    /**
     * @return Filterable[]
     */
    public function getFiltered()
    {
        return $this->filtered;
    }

    /**
     * @return array of form array($uriString, $reason)
     */
    public function getFailed()
    {
        return $this->failed;
    }
}
