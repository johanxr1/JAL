<?php
/*
ACCION DE REGISTRARSE
---------------------
A)Premisa : El correo NO esta registrado
    *Intenta registrarse con cualquier red social
7      ++Resultado: Me deberia crear un usuario y asociarle la red social

B)Premisa : El correo SI esta registrado
  *Intenta registrarse con MISMA red social
    ++Resultado: Simplemente hacer login

  *Intenta registrarse con OTRA red social
    ++Resultado: decirle que ya esta registrado con otra red social y 
                que agregaremos esta red social para un inicio rapido 



ACCION DE LOGEARME
------------------
A)Premisa: El correo NO esta registrado
  *Intenta logearse con cualquier red social
    ++Resultado: Debo decirle que no esta registrado OJO AUN NO DECIDO

B)Premisa: El correo SI esta registrado
  *Intenta logearse con la red social ya registrada
    ++Resultado: Simplemente hace el login y lleva a home

  *Intenta logearse con otra red social no registrada
    ++Resultado: decirle que ya esta registrado con otra red social y 
                que agregaremos esta red social para un inicio rapido

*/



if ($_SERVER['REQUEST_URI']==='/tesis/views/registro.php') {
	include '../vendor/autoload.php';	
}
if ($_SERVER['REQUEST_URI']==='/tesis/index.php') {
	include 'vendor/autoload.php';	
}


use Hybridauth\Hybridauth; 

	class Auth{
	   	protected static $allow = ['Facebook', 'Twitter', 'Google'];
	     
	   	public static function requestHandler(){
	   		$db = new PDO("mysql:host=localhost;dbname=tesis", "root", "");
	   		if (self::issetRequest()) {     
	   			$service = $_GET['auth'];
	   			$socialUser = self::getUserAuth($service);
	   			$user = self::getExistingUser($service,$socialUser, $db);
	   			if ($user === false) {
	   				self::insertUser($service, $socialUser, $db);
	   				$userData= self::getExistingUser($service,$socialUser, $db);
	   				self::login($userData,$socialUser);
					(strpos($_SERVER['REQUEST_URI'],'registro.php')) ? header('Location:home.php') : header('Location:views/home.php');
	   			}else{
	   				if(self::checkUserSocialService($user, $socialUser, $service, $db)){
	   					self::login($user,$socialUser);
						(strpos($_SERVER['REQUEST_URI'],'registro.php')) ? header('Location:home.php') : header('Location:views/home.php');
	   				}else{
	   					self::insertUserSocial($user, $socialUser, $service, $db);
	   					self::login($user,$socialUser);
	   					(strpos($_SERVER['REQUEST_URI'],'registro.php')) ? header('Location:home.php') : header('Location:views/home.php');
	   					die();
	   				}      		
	   			}		      
	   		}
	   	}

	   	protected static function issetRequest(){
	   		if(isset($_GET['auth'])){
	   			if(in_array($_GET['auth'], self::$allow)){
	   				return true;
	   			}
	   		}
	   		return false;
	   	}

	   	public static function getUserAuth($service){
	   		$hybridAuth = new Hybrid_Auth(__DIR__."/config.php");
	   		$adapter = $hybridAuth->authenticate($service);
	   		$userProfile = $adapter->getUserProfile();     
	   		return $userProfile;
	   	}

	   	protected static function getExistingUser($service,$socialUser, $db){
	   		$ps = $db->prepare("SELECT users.id AS id, users.name AS name, email, imgUrl,tipo,estatus FROM users 
	   							INNER JOIN users_social ON users.id = users_social.users_id 
	   							WHERE email = :email");
	   		$ps->execute([
	   			':email' => $socialUser->email,
	   		]);
	   		$result = $ps->fetchAll(PDO::FETCH_ASSOC);
	   		return $result ? $result[0] : false;
	   	}

	   	protected static function insertUser($service, $socialUser, $db){
	   		$user = array(
	   			'name' => $socialUser->firstName,
	   			'email' => $socialUser->email,
	   			'tipo' => 1,
	   			'estatus' => 1,
	   		);
	   		$ps = $db->prepare("INSERT INTO users (name, email,tipo,estatus) VALUES(:name, :email,:tipo,:estatus)");
	   		$ps->execute($user);
	   		$user['id'] = $db->lastInsertId();
	   		self::insertUserSocial($user, $socialUser, $service, $db);
	   	}

	   	protected static function insertUserSocial($user, $socialUser, $service, $db){
	   		$ps = $db->prepare("INSERT INTO users_social (users_id, social_id, service, imgUrl) VALUES(:users_id, :social_id, :service,:imgUrl)");
	   		$ps->execute([
	   			':users_id' => $user['id'],
	   			':social_id' => $socialUser->identifier,
	   			':service' => $service,
	   			':imgUrl' => $socialUser->photoURL
	   		]);
	   	}


	   	protected static function checkUserSocialService($user, $socialUser, $service, $db){
	   		$ps = $db->prepare("SELECT * FROM users_social WHERE users_id = :users_id AND service = :service AND social_id = :social_id");
	   		$ps->execute([
	   			':users_id' => $user['id'],
	   			':service' => $service,
	   			':social_id' => $socialUser->identifier
	   		]);
	   		return (bool) $ps->fetchAll(PDO::FETCH_ASSOC);
	   	}

	   	protected static function login($userData,$socialUser){
	   		$_SESSION['user_id'] = $userData['id'];
	   		$_SESSION['user_name'] = $userData['name'];
	   		$_SESSION['user_email'] = $userData['email'];
	   		$_SESSION['user_img'] = $socialUser->photoURL;
   			$_SESSION['user_tipo'] = $userData['tipo'];
   			$_SESSION['user_estatus'] = $userData['estatus'];
	   	}
	}
	Auth::requestHandler();
?>
