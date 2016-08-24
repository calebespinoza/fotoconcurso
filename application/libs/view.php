<?php

/**
 * Class View
 *
 * Provides the methods all views will have
 */
class View
{
    /**
     * simply includes (=shows) the view. this is done from the controller. In the controller, you usually say
     * $this->view->render('help/index'); to show (in this example) the view index.php in the folder help.
     * Usually the Class and the method are the same like the view, but sometimes you need to show different views.
     * @param string $filename Path of the to-be-rendered view, usually folder/file(.php)
     * @param boolean $render_without_header_and_footer Optional: Set this to true if you don't want to include header and footer
     */
    public function render($filename, $render_without_header_and_footer = false)
    {
        // page without header and footer, for whatever reason
        if ($render_without_header_and_footer == true) {
            require 'application/views/' . $filename . '.php';
        } else {
            require VIEWS_PATH . '_templates/header.php';
            require VIEWS_PATH . $filename . '.php';
            require VIEWS_PATH . '_templates/footer.php';
        }
    }
}
?>