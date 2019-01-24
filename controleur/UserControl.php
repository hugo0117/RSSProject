<?php

class UserControl {

	function __construct() {
		global $rep,$vues; // nécessaire pour utiliser variables globales

		//debut

		//on initialise un tableau d'erreur
		$dVueEreur = array ();

		try{
			$action=$_REQUEST['action'];

			switch($action) {

				//pas d'action, on affiche les news
				case NULL:

                    $this->Articles();
					break;

                case 'connection':
                	$this->Connection();
                	break;

				case "validationFormulaire":
					$this->ValidationFormulaire($dVueEreur);
					break;

				//mauvaise action
				default:
					$dVueEreur[] =	"Erreur d'appel php";
					require ($rep.$vues['vuephp1']);
					break;
			}

		} catch (PDOException $e)
		{
			//si erreur BD, pas le cas ici
			$dVueEreur[] =	"Erreur inattendue PDO!!! ";
			$dVueEreur[] =	$e->getMessage();
			require ($rep.$vues['erreur']);

		}
		catch (Exception $e2)
			{
			$dVueEreur[] =	"Erreur inattendue!!! ";
			$dVueEreur[] =	$e2->getMessage();
			require ($rep.$vues['erreur']);
			}


		//fin
		exit(0);
	}//fin constructeur


	function Connection(){
		$loginAdmin=filter_var($_POST['loginAdmin'], FILTER_SANITIZE_STRING);
		$password=filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		if(ModelAdmin::connection($loginAdmin, $password)==null){
			echo '<script>alert("Erreur de connexion");</script>';
		}
		$_REQUEST['action']=null;
		new FrontControl(); // Pourquoi

	}

	function Articles(){
	    global $rep, $vues, $base, $login, $mdp;

        $page = (isset($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
        if ($page>ModelNews::getNbPagesNews()){
        	$page=ModelNews::getNbPagesNews();
		}
        if($page<=0){
			$page=1;
		}
        $tabNews=ModelNews::getNewsAtPage($page);
		require ($rep.$vues['userView']);
	}

}//fin class

?>
