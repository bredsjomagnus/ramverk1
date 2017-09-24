<?php

namespace Anax\Book\HTMLForm;

use \Anax\HTMLForm\FormModel;
use \Anax\DI\DIInterface;
use \Anax\Book\Book;

/**
 * Form to delete an item.
 */
class DeleteForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Anax\DI\DIInterface $di a service container
     */
    public function __construct(DIInterface $di)
    {
        parent::__construct($di);
        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Ta bort böcker",
            ],
            [
                "deleting_ids" => [
                    "type"        => "select-multiple",
                    "label"         => "Välj en eller flera böcker att ta bort",
                    "class"         => "form-control",
                    // "description"   => "Here you can place a description.",
                    "size"          => count($this->getAllBooks()),
                    "options"     => $this->getAllBooks(),
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Ta bort valda böcker",
                    "class"     => "btn btn-danger",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }



    /**
     * Get all items as array suitable for display in select option dropdown.
     *
     * @return array with key value of all items.
     */
    protected function getAllBooks()
    {
        $book = new Book();
        $book->setDb($this->di->get("db"));

        $books = [];
        foreach ($book->findAll() as $book) {
            $books[$book->id] = "{$book->title}";
        }

        return $books;
    }



    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return boolean true if okey, false if something went wrong.
     */
    public function callbackSubmit()
    {
        $book = new Book();
        $book->setDb($this->di->get("db"));
        $deleting_ids = $this->form->value("deleting_ids");
        foreach ($deleting_ids as $delete_id) {
            $book->find("id", $delete_id);
            $book->delete();
        }
        $this->di->get("response")->redirect("book/view-all");
    }
}
