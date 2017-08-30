<?php

namespace Maaa16\Commentary;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;

/**
 * REM Server.
 */
class Commentary implements ConfigureInterface
{
    use ConfigureTrait;



    /**
     * @var array $session inject a reference to the session.
     */
    private $session;



    /**
     * @var string $key to use when storing in session.
     */
    const KEY = "commentary";



    /**
     * Inject dependencies.
     *
     * @param array $dependency key/value array with dependencies.
     *
     * @return self
     */
    public function inject($dependency)
    {
        $this->session = $dependency["session"];
        return $this;
    }



    /**
     * Fill the session with default data that are read from files.
     *
     * @return self
     */
    public function init()
    {
        $files = $this->config["dataset"];
        $dataset = [];
        foreach ($files as $file) {
            $content = file_get_contents($file);
            $key = pathinfo($file, PATHINFO_FILENAME);
            $dataset[$key] = json_decode($content, true);
        }

        $this->session->set(self::KEY, $dataset);
        return $this;
    }



    /**
    * Set comment to session
    *
    * @param string $comment
    * @param object $app
    */
    public function addComment($app, $username, $email, $comment)
    {
        $app->database->connect();
        $sql = "INSERT INTO ramverk1comments (username, email, comm, edited) VALUES (?, ?, ?, ?)";
        $params = [$username, $email, $comment, null];
        $app->database->execute($sql, $params);
    }

    /**
    * Get comment from session
    *
    * @param object $app
    */
    public function getComment($app)
    {
        $app->database->connect();
        $sql = "SELECT * FROM ramverk1comments";
        $res = $app->database->executeFetchAll($sql);
        return $res;
    }

    /**
    * Reset database comments
    *
    * @param object $app
    */
    public function resetComment($app)
    {
        $app->database->connect();
        $sql = "DROP TABLE IF EXISTS ramverk1comments";
        $app->database->execute($sql);
        $sql = "CREATE TABLE IF NOT EXISTS ramverk1comments (id INT AUTO_INCREMENT NOT NULL, created TIMESTAMP DEFAULT CURRENT_TIMESTAMP, edited TIMESTAMP NULL, username varchar(100) NOT NULL default 'NA', email varchar(200) NOT NULL default 'na@email.com', comm VARCHAR(1000), likes VARCHAR(1000) DEFAULT '', PRIMARY KEY  (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
        $app->database->execute($sql);
    }

    /**
    * Load comment to edit
    *
    * @param object $app
    */
    public function editCommentLoad($app, $id)
    {
        $app->database->connect();
        $sql = "SELECT * FROM ramverk1comments WHERE id = ?";
        $params = [$id];
        $res = $app->database->executeFetchAll($sql, $params);
        return $res;
    }

    /**
    * Save edited comment
    *
    * @param object $app
    * @param integer $id
    * @param string $comment
    */
    public function editCommentSave($app, $id, $comment)
    {
        $app->database->connect();
        $sql = "UPDATE ramverk1comments SET comm = ?, edited = CURRENT_TIMESTAMP WHERE id = ?";
        $params = [$comment, $id];
        $app->database->execute($sql, $params);
    }

    /**
    * Delete one single comment
    *
    * @param object $app
    * @param integer $id
    */
    public function deleteComment($app, $id)
    {
        $app->database->connect();
        $sql = "DELETE FROM ramverk1comments WHERE id = ?";
        $params = [$id];
        $app->database->execute($sql, $params);
    }

    /**
    * Add like to comment
    *
    * @param object $app
    * @param integer $id
    */
    public function addLike($app, $userid, $commentid)
    {
        $app->database->connect();
        $sql = "SELECT likes FROM ramverk1comments WHERE id = ?";
        $params = [$commentid];
        $res = $app->database->executeFetchAll($sql, $params);
        $commentlikes = $res[0]->likes;

        $commentlikes .= ",".$userid;
        if ($commentlikes[0] == ",") {
            $commentlikes = substr($commentlikes, 1);
        }
        $sql = "UPDATE ramverk1comments SET likes = ? WHERE id = ?";
        $params = [$commentlikes, $commentid];
        $app->database->execute($sql, $params);
    }

    /**
    * Get usernames of those who liked a comment
    *
    * @param object $app
    * @param array $likersid array of idnumbers of users who liked a comment
    *
    * @return string $usernames of names of those who liked a comment. "name1, name2, name3,..."
    */
    public function getLikersUsernames($app, $likersid)
    {
        $usernames = "";
        $app->database->connect();
        foreach ($likersid as $id) {
            if ($id != "") {
                $sql = "SELECT username FROM ramverk1accounts WHERE id = ?";
                $params = [$id];
                $res = $app->database->executeFetchAll($sql, $params);
                $usernames .= ", " . $res[0]->username;
            }

        }
        $usernames = substr($usernames, 2);
        return $usernames;
    }
}
