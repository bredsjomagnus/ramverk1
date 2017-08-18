<?php

namespace Anax\App;

/**
 * An App class to wrap the resources of the framework.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class App
{
    public function redirect($url)
    {
        $this->response->redirect($this->url->create($url));
        exit;
    }



    /**
     * Render a standard web page using a specific layout.
     */
    public function renderPage($data, $path, $status = 200)
    {
        $data["stylesheets"] = ["css/style.css"];

        // Add common header, navbar and footer
        //$this->view->add("default1/header", [], "header");
        //$this->view->add("default1/navbar", [], "navbar");
        //$this->view->add("default1/footer", [], "footer");

        $this->view->add("incl/header", [], "header");
        $this->view->add("incl/navbar", ["active" => $path, "navbar" => "navbar-main"], "navbar");

        // Add layout, render it, add to response and send.
        $this->view->add("default1/layout", $data, "layout");
        $this->view->add("incl/footer");

        $body = $this->view->renderBuffered("layout");
        $this->response->setBody($body)
                       ->send($status);
        exit;
    }
}
