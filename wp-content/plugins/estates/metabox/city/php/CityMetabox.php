<?php

class CityMetabox
{
    private $cities = array("Не выбран");
    private $selectedCity = null;

    public function __construct($selectedCity)
    {
        $this->selectedCity = $selectedCity;
        echo "<input type='text' name='selectedCityEditor' id='selectedCityEditor' value='".$selectedCity."' style='display:none;'>";

        $query = new WP_Query(array(
            'post_type' => 'city',
            'post_status' => 'publish'
        ));

        while ($query->have_posts()) {
            $query->the_post();
            $cityName = get_the_title();
            array_push($this->cities, $cityName);
        }

        wp_reset_query();
        $this->show();
    }

    
    private function show(){
        echo '<div style="width: 100%; height: 60px; display: block;">';

        echo '<div style="float: left;display: block;">Город:</div><div style="float:left; display:block; width: 20px;"></div><select id="citySelect" style="float: left; display: block;">';
        for($i=0; $i<sizeof($this->cities); $i++){
            $currentCity = $this->cities[$i];
            $isSelectedCity = $currentCity === $this->selectedCity;
            if($isSelectedCity){
                echo '<option selected="selected">'.$currentCity.'</option>';
            }
            else{
                echo '<option>'.$currentCity.'</option>';
            }
        }
        echo '</select></div>';
    }
}