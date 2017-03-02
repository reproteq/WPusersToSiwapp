<?
///////////////////////////////////////////// coge un id de usuario de la tabla wp _UPDATED_CLIENTES y lo inserta o actualiza en siwapp
////////////////////////////////////////////////este id lo deve enviar el formuralio de registro o de update info user
/////////////////////////////////////////////////////////////////////////////////////////////////////conexion db
//conexion wp
$host_wp =" ";
$host_wp_db = " ";
$host_wp_user = " ";
$host_wp_pw = " ";

// Establecemos la conexion a MySQL

$link_wp = mysql_connect($host_wp, $host_wp_user, $host_wp_pw) or DIE(mysql_error());
@mysql_select_db($host_wp_db, $link_wp);


$host_siwapp =" ";
$host_siwapp_db = " ";
$host_siwapp_user = " ";
$host_siwapp_pw = " ";

$link_siwapp = mysql_connect($host_siwapp, $host_siwapp_user, $host_siwapp_pw) or DIE(mysql_error());
@mysql_select_db($host_siwapp_db, $link_siwapp);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////// funcion slug

function slugify($string)
{
     //$string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
     $string = strtolower($string);
    // $string = preg_replace('/[^a-z0-9]+/i', ' ', $string);
     
    $string = trim($string);
    
    
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );

    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );

    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );

    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );

    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );

    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );

    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace(
        array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "`", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),
        '', $string );


    return $string;
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$wpuserid =  1;
 
$querytip="SELECT
wp_usermeta.user_id,
wp_usermeta.meta_key,
wp_usermeta.meta_value,
wp_users.ID,
wp_users.user_login
FROM
wp_usermeta
INNER JOIN wp_users ON wp_users.ID = wp_usermeta.user_id
WHERE
wp_usermeta.user_id = $wpuserid AND
wp_usermeta.meta_key = 'tipocliente'";   
   
      $petip = mysql_query($querytip); 
   
      while($otip=mysql_fetch_object($petip)){ 
	                  echo'Id:'.$otip->user_id.'';
                          echo'<br>Tipo Cliente: '.$otip->meta_value.'<br>';                       
                                       }



$querycif="SELECT
wp_usermeta.user_id,
wp_usermeta.meta_key,
wp_usermeta.meta_value,
wp_users.ID,
wp_users.user_login
FROM
wp_usermeta
INNER JOIN wp_users ON wp_users.ID = wp_usermeta.user_id
WHERE
wp_usermeta.user_id = $wpuserid AND
wp_usermeta.meta_key = 'dnicif'";   
   
      $petcif = mysql_query($querycif); 
   
      while($ocif=mysql_fetch_object($petcif)){ 
	                  echo'<br>DNI / CIF : '.$ocif->meta_value.'<br>';                       
                                       }


        $querytl="SELECT
wp_usermeta.user_id,
wp_usermeta.meta_key,
wp_usermeta.meta_value,
wp_users.ID,
wp_users.user_login
FROM
wp_usermeta
INNER JOIN wp_users ON wp_users.ID = wp_usermeta.user_id
WHERE
wp_usermeta.user_id = $wpuserid AND
wp_usermeta.meta_key = 'telefono'";   
   
      $petl = mysql_query($querytl); 
   
      while($otl=mysql_fetch_object($petl)){ 
	                  echo'<br>Tlf'.$otl->meta_value.'<br>';                       
                                       }




$q="SELECT
wp_usermeta.user_id,
wp_usermeta.meta_key,
wp_usermeta.meta_value,
wp_users.ID,
wp_users.user_email,
wp_users.user_login,
wp_users.user_registered,
wp_users.user_nicename
FROM
wp_usermeta
INNER JOIN wp_users ON wp_users.ID = wp_usermeta.user_id
WHERE
wp_usermeta.user_id = $wpuserid AND
wp_usermeta.meta_key = 'first_name'";

 $pet = mysql_query($q); 
  
      while($obj=mysql_fetch_object($pet)){ 
	                  echo'Email:'.$obj->user_email.'
                           <br>Login:'.$obj->user_login.'
                           <br>Nick:'.$obj->user_nicename.'
                           <br>Fecha:'.$obj->user_registered.'
                           <br>Nom / Emp:'.$obj->meta_value.'<br>';
}
              


                   
$queryuser="SELECT
wp_usermeta.user_id,
wp_usermeta.meta_key,
wp_usermeta.meta_value,
wp_users.ID,
wp_users.user_login
FROM
wp_usermeta
INNER JOIN wp_users ON wp_users.ID = wp_usermeta.user_id
WHERE
wp_usermeta.user_id = $wpuserid AND
wp_usermeta.meta_key = 'direccion'";   
   
      $petuser = mysql_query($queryuser); 
   
      while($objuser=mysql_fetch_object($petuser)){ 
	                  echo'Direc:'.$objuser->meta_value.'<br>';
                              }

  $queryloc="SELECT
wp_usermeta.user_id,
wp_usermeta.meta_key,
wp_usermeta.meta_value,
wp_users.ID,
wp_users.user_login
FROM
wp_usermeta
INNER JOIN wp_users ON wp_users.ID = wp_usermeta.user_id
WHERE
wp_usermeta.user_id = $wpuserid AND
wp_usermeta.meta_key = 'localidad'";   
   
      $petloc = mysql_query($queryloc); 
   
      while($oloc=mysql_fetch_object($petloc)){ 
	                  echo'<br>Localidad: '.$oloc->meta_value.'<br>';                       
                                       }

$querycp="SELECT
wp_usermeta.user_id,
wp_usermeta.meta_key,
wp_usermeta.meta_value,
wp_users.ID,
wp_users.user_login
FROM
wp_usermeta
INNER JOIN wp_users ON wp_users.ID = wp_usermeta.user_id
WHERE
wp_usermeta.user_id = $wpuserid AND
wp_usermeta.meta_key = 'cp'";   
   
      $petcp = mysql_query($querycp); 
   
      while($ocp=mysql_fetch_object($petcp)){ 
	                  echo'CP:'.$ocp->meta_value.'<br>';

                                       }




 

$querypro="SELECT
wp_usermeta.user_id,
wp_usermeta.meta_key,
wp_usermeta.meta_value,
wp_users.ID,
wp_users.user_login
FROM
wp_usermeta
INNER JOIN wp_users ON wp_users.ID = wp_usermeta.user_id
WHERE
wp_usermeta.user_id = $wpuserid AND
wp_usermeta.meta_key = 'provincia'";   
   
      $petpro = mysql_query($querypro); 
   
      while($opro=mysql_fetch_object($petpro)){ 
	                  echo'<br>Prov: '.$opro->meta_value.'<br>';                       
                                       }


$querypais="SELECT
wp_usermeta.user_id,
wp_usermeta.meta_key,
wp_usermeta.meta_value,
wp_users.ID,
wp_users.user_login
FROM
wp_usermeta
INNER JOIN wp_users ON wp_users.ID = wp_usermeta.user_id
WHERE
wp_usermeta.user_id = $wpuserid AND
wp_usermeta.meta_key = 'pais'";   
   
      $petpais = mysql_query($querypais);
   
      while($opais=mysql_fetch_object($petpais)){ 
	                  echo'<br>Pais: '.$opais->meta_value.'<br>';                       
                                       }



                     

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// insert siwapp cliente CUSTOMERS
        
$query = " INSERT INTO `customer` (`id`,`company_id`,`name`, `name_slug`, `identification`, `email`, `contact_person`, `invoicing_address`, `shipping_address`,`phone`,`mobile`
            ,`entity`,`office`,`control_digit`, `account`,`invoicing_postalcode`,`invoicing_city`,`invoicing_state`,`invoicing_country`,`shipping_postalcode`,`shipping_city`,`shipping_state`,`shipping_country`
             ) 
                                     VALUES ('$cliente_vm->virtuemart_user_id','1','$cliente_vm->first_name', '$slugname', '$cliente_vm->company', '$cliente_vm->email', '$cliente_vm->first_name', '$cliente_vm->address_1\n
                                     $cliente_vm->zip $cliente_vm->city', '$cliente_vm->address_1\n$cliente_vm->zip $cliente_vm->city','$cliente_vm->phone_1','$cliente_vm->phone_2',
                                     '$entity','$office','$control_digit','$account',                
                                                        '$cliente_vm->zip','$cliente_vm->city','$pais','$provincia',
                                                        '$cliente_vm->zip','$cliente_vm->city','$pais','$provincia'
                                                        
                                                        )  
                                            
                                     
                                     ON DUPLICATE KEY update identification='$cliente_vm->company',name='$cliente_vm->first_name', name_slug='$slugname',invoicing_address='$cliente_vm->address_1\n
                                     $cliente_vm->zip $cliente_vm->city',shipping_address='$cliente_vm->address_1\n
                                     $cliente_vm->zip $cliente_vm->city', email='$cliente_vm->email',phone='$cliente_vm->phone_1',contact_person='$cliente_vm->first_name',
                                                                        
                                     entity='$entity', office='$office', control_digit='$control_digit', account='$account',
                                     
                                     `invoicing_postalcode`='$cliente_vm->zip',`invoicing_city`='$cliente_vm->city',`invoicing_state`='$provincia',`invoicing_country`='$pais',
                                     `shipping_postalcode`='$cliente_vm->zip',`shipping_city`='$cliente_vm->city',`shipping_state`='$provincia',`shipping_country`='$pais',mobile='$cliente_vm->phone_2'
                                     
                                     
                                       ";
echo $query;

//$exec = mysql_query($query,$link_siwapp);

echo mysql_error($link_siwapp);


?>
