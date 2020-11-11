<?php
namespace App\ViewModels\Texts;

class NotesPageViewModel extends \App\ViewModels\BasePageViewModel {


    public function __construct()
    {
        $this->setTitle("Notes - Just Type");
        $this->setDescription("A simple page where you can type. On Notes you can type anything in a simple box. No formatting
            or other things that can make it complex. Just a simple text box!
        ");
        $this->setKeywords([
            "textbox","notepad","simple place for typing","type quickly","brainstorm","writer",
            "writer box","typewriter","simple typing","keyboard","ideas"]);
        $this->setTagline("Type anything below. When you close the page, the text will be lost.");
    }


}
