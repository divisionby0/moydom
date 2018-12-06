<?php
get_header();

echo "<div style='width: 100%; background-color: #9FD0D5;'>";
if(function_exists('bcn_display')){
    echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
    bcn_display();
    echo "</div>";
}
else{
    echo "<div>no breadcrumbs</div>";
}
echo "</div>";

echo "the content";

get_footer();