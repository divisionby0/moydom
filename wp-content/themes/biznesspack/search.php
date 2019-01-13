<?php
/**
 * The template for displaying search results pages
 * @package Biznesspack
 * @version 1.5.1
 */

get_header(); ?>
	<div id="content" class="site-content">
		<div class="container">
            <main id="main" class="site-main" role="main">
                <?php
                get_search_form();
                $searchValue = $_GET['s'];

                $results = json_decode(DataBase::search($searchValue));
                if(sizeof($results)==0){
                    echo "По Вашему запросу ни среди адресов объектов ни среди их ID ничего не найдено, пожалуйста, поищите другими словами.";
                }
                else{
                    echo "<div class='container'><div class='row'>";
                    for($i=0; $i<sizeof($results);$i++){
                        $estateData = $results[$i];
                        new BaseItemRenderer($estateData);
                    }
                    echo "</div></div>";
                }
                ?>
            </main>
        </div>

<?php get_footer();
