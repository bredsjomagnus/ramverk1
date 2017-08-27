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
        $sql = "INSERT INTO ramverk1comments (username, email, comm) VALUES (?, ?, ?)";
        $params = [$username, $email, $comment];
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
        $sql = "CREATE TABLE IF NOT EXISTS ramverk1comments (id INT AUTO_INCREMENT NOT NULL, created TIMESTAMP DEFAULT CURRENT_TIMESTAMP, username varchar(100) NOT NULL default 'NA', email varchar(200) NOT NULL default 'na@email.com', comm VARCHAR(1000), PRIMARY KEY  (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
        $app->database->execute($sql);
    }

    /**
    * Reset database comments
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
}
