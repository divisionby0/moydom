<?php
$yamaps_page = 'yamaps-options.php'; // это часть URL страницы, рекомендую использовать строковое значение, т.к. в данном случае не будет зависимости от того, в какой файл вы всё это вставите
 

/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */
function yamaps_options() {
	global $yamaps_page;
	add_options_page( 'YaMaps', 'YaMaps', 'manage_options', $yamaps_page, 'yamaps_option_page');  
}
add_action('admin_menu', 'yamaps_options');
 
/**
 * Возвратная функция (Callback)
 */ 
function yamaps_option_page(){
	global $yamaps_page, $yamaps_defaults;

	?><div class="wrap">

		<h2><?php echo __( 'YaMaps default options', 'yamaps' ); ?></h2>
		<form method="post" id="YaMapsOptions" enctype="multipart/form-data" action="options.php">
		<?php echo'<script src="https://api-maps.yandex.ru/2.1/?lang='.get_locale().'" type="text/javascript"></script>'; ?>
			<script type="text/javascript">
						//Округляем координаты до 4 знаков после запятой
						function coordaprox(fullcoord) {
						        if (fullcoord.length!==2) {
						            fullcoord=fullcoord.split(',');
						            if (fullcoord.length!==2) { 
						                fullcoord=[0,0];
						            }
						        }
						        return [parseFloat(fullcoord[0]).toFixed(4), parseFloat(fullcoord[1]).toFixed(4)];
						}

                        ymaps.ready(init); 


                 		//Инициализируем карту для страницы настроек
                        function init () {
                        	var testvar=document.getElementById('center_map_option').value;
                            var myMap0 = new ymaps.Map("yamap", {
                                    center: [<?php echo $yamaps_defaults["center_map_option"]; ?>],
                                    zoom: <?php echo $yamaps_defaults["zoom_map_option"]; ?>,
                                    type: '<?php echo $yamaps_defaults["type_map_option"]; ?>',
                                    controls: ["typeSelector", "zoomControl", "searchControl"] 
                                });   

							//Добавляем пример метки
							placemark1 = new ymaps.Placemark([<?php echo $yamaps_defaults["center_map_option"]; ?>], {
                                hintContent: "Placemark",
                                iconContent: "",

                              
                            }, {
                            	preset: '<?php echo $yamaps_defaults["type_icon_option"]; ?>', 
                            	iconColor: '<?php echo $yamaps_defaults["color_icon_option"]; ?>'
                            });  
	myMap0.geoObjects.add(placemark1);

							//Событие перемещения карты
							myMap0.events.add('boundschange', function (event) {
										//Если изменили масштаб
				                        if (event.get('newZoom') != event.get('oldZoom')) {     
				                            document.getElementById('zoom_map_option').value = event.get('newZoom');				                            
				                        }
				                        //Если переместили центр
				                          if (event.get('newCenter') != event.get('oldCenter')) {
				                            document.getElementById('center_map_option').value = coordaprox(event.get('newCenter'));   
				                        }
				                        //Помещаем метку в новый центр
				                        placemark1.geometry.setCoordinates(event.get('newCenter'));			                        
			                });
			                //Событие смены иконки
			                myMap0.events.add('typechange', function (event) {
			                            document.getElementById('type_map_option').value = myMap0.getType();
		                    });
		                    //Cобытие поиска, скрываем метку результата
                        	var searchControl = myMap0.controls.get('searchControl');                        
                        	searchControl.events.add("resultshow", function (e) {
                            	searchControl.hideResult();
                        	});
                        	//Функция добавления элементов управления картой в поле настроек
                        	var controlElems = document.querySelectorAll('#addcontrol a');
                        	for (var i = 0; i < controlElems.length; i++) {
                        		controlElems[i].addEventListener('click', function() {                        		
		                        if (document.getElementById('controls_map_option').value.trim()!="") {
		                               document.getElementById('controls_map_option').value = document.getElementById('controls_map_option').value + ';'; 
		                        }
		                        document.getElementById('controls_map_option').value = document.getElementById('controls_map_option').value + this.getAttribute("data-control");
	                        });
								
							}

                        }
                        
            </script>
                    
    		<div id="yamap"  style="position: relative; min-height: 15rem; margin-bottom: 1rem;"></div><br />
			<?php 
			settings_fields('yamaps_options'); // Идентификатор настроек плагина
			do_settings_sections($yamaps_page);
			?>
			<p class="submit">  
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
			</p>
		</form>
	</div><?php
}
 
/*
 * Регистрируем настройки
 * Мои настройки будут храниться в базе под названием yamaps_options (это также видно в предыдущей функции)
 */
function yamaps_option_settings() {
	global $yamaps_page;
	// Присваиваем функцию валидации ( yamaps_validate_settings() ). Вы найдете её ниже
	register_setting( 'yamaps_options', 'yamaps_options', 'yamaps_validate_settings' ); // yamaps_options
 
	// Область настроек карты
	add_settings_section( 'map_section', __( 'Map options', 'yamaps' ), '', $yamaps_page );
 
	// Поле центра карты
	$yamaps_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'center_map_option',
		'desc'      => __( 'Drag the map to set its default coordinates', 'yamaps' ), 
		'label_for' => 'center_map_option' 
	);
	add_settings_field( 'center_map_option', __( 'Map center', 'yamaps' ), 'yamaps_option_display_settings', $yamaps_page, 'map_section', $yamaps_field_params );

	// Поле масштаба карты
	$yamaps_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'zoom_map_option',
		'desc'      => __( 'Zoom the map to set its default scale', 'yamaps' ), 
		'label_for' => 'zoom_map_option' 
	);
	add_settings_field( 'zoom_map_option', __( 'Map zoom', 'yamaps' ), 'yamaps_option_display_settings', $yamaps_page, 'map_section', $yamaps_field_params );

	// Поле типа карты
	$yamaps_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'type_map_option',
		'desc'      => __( 'Choose default map type: yandex#map, yandex#satellite, yandex#hybrid', 'yamaps' ), 
		'label_for' => 'type_map_option' 
	);
	add_settings_field( 'type_map_option', __( 'Map type', 'yamaps' ), 'yamaps_option_display_settings', $yamaps_page, 'map_section', $yamaps_field_params );

	// Поле высоты карты
	$yamaps_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'height_map_option',
		'desc'      => 'rem, em, px, %', 
		'label_for' => 'height_map_option'
	);
	add_settings_field( 'height_map_option', __( 'Map height', 'yamaps' ), 'yamaps_option_display_settings', $yamaps_page, 'map_section', $yamaps_field_params );

 
	// Поле элементов управления карты
	$yamaps_field_params = array(
		'type'      => 'textarea',
		'id'        => 'controls_map_option',
		'desc'      => '<div id="addcontrol" style="text-align: left;"><a data-control="typeSelector">'.__( 'Map type', 'yamaps' ).'</a>, <a data-control="zoomControl">'.__( 'Zoom', 'yamaps' ).'</a>, <a data-control="searchControl">'.__( 'Search', 'yamaps' ).'</a>, <a data-control="routeButtonControl">'.__( 'Route', 'yamaps' ).'</a>, <a data-control="rulerControl">'.__( 'Ruler', 'yamaps' ).'</a>, <a data-control="trafficControl">'.__( 'Traffic', 'yamaps' ).'</a>, <a data-control="fullscreenControl">'.__( 'Full screen', 'yamaps' ).'</a>, <a data-control="geolocationControl">'.__( 'Geolocation', 'yamaps' ).'</a></div>'
	);
	add_settings_field( 'controls_map_option', __( 'Map controls', 'yamaps' ), 'yamaps_option_display_settings', $yamaps_page, 'map_section', $yamaps_field_params );

	// Чекбокс масштаба колесом
	$yamaps_field_params = array(
		'type'      => 'checkbox',
		'id'        => 'wheelzoom_map_option',
		'desc'      => __( 'The map can be scaled with mouse scroll', 'yamaps' )
	);
	add_settings_field( 'wheelzoom_map_option', __( 'Wheel zoom', 'yamaps' ), 'yamaps_option_display_settings', $yamaps_page, 'map_section', $yamaps_field_params );

	// Чекбокс ссылки на автора
	$yamaps_field_params = array(
		'type'      => 'checkbox',
		'id'        => 'authorlink_map_option',
		'desc'      => __( 'Disable link to plugin page', 'yamaps' )
	);
	add_settings_field( 'authorlink_map_option', __( 'Author link', 'yamaps' ), 'yamaps_option_display_settings', $yamaps_page, 'map_section', $yamaps_field_params );
 
	// Область настроек метки
 
	add_settings_section( 'icon_section', __( 'Marker options', 'yamaps' ), '', $yamaps_page );
 
	// Поле типа метки
	$yamaps_field_params = array(
		'type'      => 'text',
		'id'        => 'type_icon_option',
		'desc'      => '<a href="https://tech.yandex.com/maps/doc/jsapi/2.1/ref/reference/option.presetStorage-docpage/" target="_blank">'.__( 'Other icon types', 'yamaps' ).'</a>'
	);
	add_settings_field( 'type_icon_option', __( 'Icon', 'yamaps' ), 'yamaps_option_display_settings', $yamaps_page, 'icon_section', $yamaps_field_params );

	// Поле цвета метки
	$yamaps_field_params = array(
		'type'      => 'text',
		'id'        => 'color_icon_option',
		'desc'      => __( 'For example:', 'yamaps' ).' #ff3333'
	);
	add_settings_field( 'color_icon_option', __( 'Marker color', 'yamaps' ), 'yamaps_option_display_settings', $yamaps_page, 'icon_section', $yamaps_field_params );
 
}
add_action( 'admin_init', 'yamaps_option_settings' );
 
/*
 * Функция отображения полей ввода
 * Здесь задаётся HTML и PHP, выводящий поля
 */
function yamaps_option_display_settings($args) {
	global $yamaps_defaults;
	extract( $args );
 
	$option_name = 'yamaps_options';
	//delete_option($option_name); //удаление настроек для тестов
 	
	if(!get_option( $option_name)){
    	update_option( $option_name, $yamaps_defaults);
	}

	//Нужно перебрать настройки и поставить дефолт в отсутствующие.

	$o = get_option( $option_name );

	if ($id==='center_map_option') { // удалиит

	}

	foreach ($yamaps_defaults as $key => $value) {
		if (!isset($o[$key])) {
			if (($value=='off')or($value=='on')) {
				$o[$key]=$yamaps_defaults[$key];
			}
		}		
	}
	
	switch ( $type ) {  
		case 'text':  
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";  
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
		break;
		case 'textarea':  
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			echo "<textarea class='code large-text' cols='50' rows='2' type='text' id='$id' name='" . $option_name . "[$id]'>$o[$id]</textarea>";  
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
		break;
		case 'checkbox':
			$checked = ($o[$id] == 'on') ? " checked='checked'" :  '';  
			echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";  
			echo ($desc != '') ? $desc : "";
			echo "</label>";  
		break;
		case 'select':
			echo "<select id='$id' name='" . $option_name . "[$id]'>";
			foreach($vals as $v=>$l){
				$selected = ($o[$id] == $v) ? "selected='selected'" : '';  
				echo "<option value='$v' $selected>$l</option>";
			}
			echo ($desc != '') ? $desc : "";
			echo "</select>";  
		break;
		case 'radio':
			echo "<fieldset>";
			foreach($vals as $v=>$l){
				$checked = ($o[$id] == $v) ? "checked='checked'" : '';  
				echo "<label><input type='radio' name='" . $option_name . "[$id]' value='$v' $checked />$l</label><br />";
			}
			echo "</fieldset>";  
		break; 
	}
}
 
/*
 * Функция проверки правильности вводимых полей
 */
function yamaps_validate_settings($input) {
	foreach($input as $k => $v) {
		$valid_input[$k] = trim($v); 
		/* Вы можете включить в эту функцию различные проверки значений, например
		if(! задаем условие ) { // если не выполняется
			$valid_input[$k] = ''; // тогда присваиваем значению пустую строку
		}
		*/
	}
	return $valid_input;
}
?>