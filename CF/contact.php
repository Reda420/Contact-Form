<?php
/**
 * @package Example_plugin
 * @version 1.0.0
 */
/*
 Plugin Name: My Contact Form
 Plugin URI: https://wordpress.com
 Description: Create Your Contact Form With This Plugin.
 Version: 0.0.1
 Author: Mohamed Reda
 Author URI: https://wordpress.com
 */

function contact_plugin_page(){


    add_menu_page('contact option','Contact','manage_options','contact_plugin','contact_plugin','dashicons-contact',60);
}

add_action('admin_menu','contact_plugin_page');

function contact_plugin(){
    $firstname = "";
    $lastname = "";
    $email = "";
    $address = "";
    $phone="";
    $school="";
    $message="";

    if(get_option('first_name')){
        $firstname = "checked";
    }
    if(get_option('last_name')){
        $lastname = "checked";
    }
    if(get_option('email')){
        $email = "checked";
    }
    if(get_option('address')){
        $address = "checked";
    }
    if(get_option('phone')){
        $phone = "checked";
    }
    if(get_option('school')){
        $school = "checked";
    }
    if(get_option('message')){
        $message = "checked";
    }

    echo '<form method="POST" action="">
                <div style="display:flex; flex-direction: column; align-items: flex-start">
                    <Label><input type="checkbox" name="first_name" '. $firstname .'>First Name</Label>
                    <Label><input type="checkbox" name="last_name" '. $lastname .'>Last Name</Label>
                    <Label><input type="checkbox" name="email" '. $email .'>Email</Label>
                    <Label><input type="checkbox" name="address" '. $address .'>Address</Label>
                    <Label><input type="checkbox" name="phone" '. $phone .'>Phone</Label>
                    <Label><input type="checkbox" name="school" '. $school .'>School</Label>
                    <Label><input type="checkbox" name="message" '. $message.'>Message</Label>
                    <input type="submit" name="submit_btn">
                </div>
        </form>';
}

if(isset($_POST["submit_btn"])){
    $list["first_name"] = 0;
    $list["last_name"] = 0;
    $list["email"] = 0;
    $list["address"] = 0;
    $list["phone"]= 0;
    $list["school"]= 0;
    $message["message"]=0;

    if(isset($_POST["first_name"])){
        $list["first_name"] = 1;

    }
    if(isset($_POST["last_name"])){
        $list["last_name"] = 1;

    }
    if(isset($_POST["email"])){
        $list["email"] = 1;

    }
    if(isset($_POST["address"])){
        $list["address"] = 1;

    }
    if(isset($_POST["phone"])){
        $list["phone"] = 1;

    }
    if(isset($_POST["school"])){
        $list["school"] = 1;

    }
    if(isset($_POST["message"])){
        $list["message"] = 1;

    }

    update_option('first_name', $list["first_name"]);
    update_option('last_name', $list["last_name"]);
    update_option('email', $list["email"]);
    update_option('address', $list["address"]);
    update_option('phone', $list["phone"]);
    update_option('school', $list["school"]);
    update_option('message', $list["message"]);


}


//form

    function add_form(){
    $formAdd=false;
    if (get_option('first_name')){
        echo'<label>First Name <input type="text"></label>';
        $formAdd=true;
    }
    if (get_option('last_name')){
        echo '<label>Last Name <input type="text"></label>';
        $formAdd=true;
    }
        if (get_option('email')){
            echo '<label>Email <input type="email"></label>';
            $formAdd=true;
        }
        if (get_option('address')){
            echo '<label>Address<input type="text"></label>';
            $formAdd=true;
        }
        if (get_option('phone')){
            echo '<label>Phone <input type="number"></label>';
            $formAdd=true;
        }
        if (get_option('school')){
            echo '<label>School <input type="text"></label>';
            $formAdd=true;
        }
        if (get_option('message')){
            echo '<label>Message <textarea type="text"></textarea> </label>';
            $formAdd=true;
        }
        if ($formAdd){
            echo '<input id="btn" type="submit" name="submit_btn">';
        }
}
    add_shortcode('contact_form','add_form');
?>


<style>
    #btn{
        margin-left: 555px;
    }
</style>
