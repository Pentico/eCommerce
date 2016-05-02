<?php
/**
 * Created by PhpStorm.
 * User: Alfie
 * Date: 2016/05/02
 * Time: 8:52 PM
 */
function create_form_input($name, $type, $label='',$errors = array(),$options = array()){

    $value = false;
    if(isset($_POST[$name])){
        $value = $_POST[$name];
    }

    if($value && get_magic_quotes_gpc()){
        $value = stripslashes($value);
    }

    echo '<div class="form-group';
    if (array_key_exists($name, $errors)){
        echo 'has-error';
    }
    echo '">';

    if(!empty($label)){

        echo '<label for="' . $name . '" class="control-label">' . $label . '</label>';
    }

    /**
     * Handles the form input for the three types
     */
    if(($type ==='text') || ($type === 'password') || ($type === 'email')){

        echo '<input type="' .$type .'" name="' .$name .'" id="' .$name .'" class="form-control"';

        if($value){
            echo 'value="' .htmlspecialchars($value).'"';
        }

        if(!empty($options) && is_array($options)) {

            foreach ($options as $k => $v) {
                echo "$k=\"$v\""; //TODO ..Learn about regular expressions
            }
        }

        echo '>';

        //Displays the error message
        if(array_key_exists($name, $errors)){

            echo '<span class="help-block">' .$errors[$name]. '</span>';
        }
    }elseif ($type == 'textarea'){

        if(array_key_exists($name, $errors)){

            echo '<span class="help-block">' .$errors[$name]. '</span>';
        }

        echo '<textarea name="'.$name. '"id="'.$name.'"class="form-control"';

        if(!empty($options) && is_array($options)){

            foreach ($options as $k => $v){
                echo "$k=\"$v\"";
            }
        }

        echo '>';

        //The value for textarea is written between opening and closing textarea tags.
        if($value){
            echo $value;
        }

        echo '</textarea>';
    }//End of primary IF-ELSE.
    echo '</div';

} //End of create_from_input() function.