<?php

class Song
{
    private $_title;
    private $_aithor;

    public function __construct($title, $author)
    {
        $this->_title = $title;
        $this->_aithor = $author;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getAuthor()
    {
        return $this->_aithor;
    }
}

class Playlist
{
    private $_collection = [];

    public function addTrack($song)
    {
        $this->_collection[] = $song;
    }

    public function removeTrack($song)
    {
        foreach ($this->_collection as $key => $track) {
            if ($track == $song) {
                unset($this->_collection[$key]);
            }
        }
    }

    public function getSongById($id)
    {
        if (isset($this->_collection[$id])) {
            return $this->_collection[$id];
        }
        return false;
    }
}

class PlaylistItterator
{
    private $_list;
    private $_currentTrack = 0;

    public function __construct($songList)
    {
        $this->_list = $songList;
    }

    public function getNextTrack()
    {
        if ($this->hasNextElement()) {
            return $this->_list->getSongById(++$this->_currentTrack);
        }
        return false;
    }

    public function getCurrentTrack()
    {
        return $this->_list->getSongById($this->_currentTrack);
    }

    public function hasNextElement()
    {
        if ($this->_list->getSongById($this->_currentTrack + 1)) {
            return true;
        }
        return false;
    }
}


$song1 = new Song('title1', 'author1');
$song2 = new Song('title2', 'author2');
$song3 = new Song('title3', 'author3');

$playlist = new Playlist();
$playlist->addTrack($song1);
$playlist->addTrack($song2);
$playlist->addTrack($song3);

$playlistItterator = new PlaylistItterator($playlist);
while ($playlistItterator->hasNextElement()) {
    echo $playlistItterator->getNextTrack()->getTitle() . "<br />";
}



