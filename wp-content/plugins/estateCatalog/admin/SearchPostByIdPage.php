<?php


class SearchPostByIdPage
{
    public function __construct()
    {
        echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
           var pluginsUrl = "' . plugins_url() . '";
         </script>';
        echo "<div class='container'>";
        echo "<div class='row'><h1>Поиск объекта по ID</h1></div>";
        echo "<div class='row'><input type='text' id='idInput' name='idInput' placeholder='Впишите ID объекта'><input type='button' id='serachButton' value='Поиск'></div>";
        echo "<div class='row' id='resultContainer'></div>";
        echo "</div>";
    }
}