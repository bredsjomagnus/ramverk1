<?php
namespace Maaa16\Block;

use \Maaa16\Content\Content;

class Block
{
    /**
    * Get correctly filterad content for a content 'block'
    *
    * @param string $blockslug the slug for that content 'block'
    *
    * @return string $filteredblockdata
    */
    public function getBlock($blockslug)
    {
        $blockdata = "";
        $filteredblockdata = "";
        $textfilter = new \Maaa16\Textfilter\Textfilter();
        if ($blockslug != '') {
            $this->app->database->connect();
            $sql = "SELECT data, filter FROM RV1content WHERE status = ? AND type = ? AND slug = ?";
            if ($res = $this->app->database->executeFetchAll($sql, ['Published', 'block', $blockslug])) {
                foreach ($res as $row) {
                    $blockdata = $row->data;
                    $blockfilter = $row->filter;
                }
                $filteredblockdata =  $textfilter->doFilter($blockdata, $blockfilter);
            }
        }
        return $filteredblockdata;
    }

    /**
     * Set the app object to inject into view rendering phase.
     *
     * @param object $app with framework resources.
     *
     * @return $this
     */
    public function setApp($app)
    {
        $this->app = $app;
        return $this;
    }
}
