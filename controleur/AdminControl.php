<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 06/12/18
 * Time: 07:33
 */

class AdminControl
{

    function __construct()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales

		//debut

		//on initialise un tableau d'erreur
		$dVueEreur = array ();

		if(!ModelAdmin::isAdmin()){
            $dVueEreur[] =	"Erreur inattendue!!! ";
            $dVueEreur[] =	"Vous n'êtes pas Admin";
            require ($rep.$vues['erreur']);
            return;
        }

		try{
			$action=$_REQUEST['action'];

			switch($action) {

                case "ajout":
                    $this->ajouterFlux();
                    break;

                case "flux":
                    $this->afficherFlux();
                    break;

                case "disconnect":
                    $this->disconnect();
                    break;

                case "ajoutAdmin":
                    $this->ajouterAdmin();
                    break;

                case "delete":
                    $this->deleteFlux();
                    break;

				//mauvaise action
				default:
					$dVueEreur[] =	"Erreur d'appel php";
					require ($rep.$vues['vuephp1']);
					break;
			}

		} catch (PDOException $e) // Pourquoi
		{
			//si erreur BD, pas le cas ici
			$dVueEreur[] =	"Erreur inattendue PDO!!! ";
			$dVueEreur[] =	$e->getMessage();
			require ($rep.$vues['erreur']);

		}
		catch (Exception $e2) // Pourquoi
        {
			$dVueEreur[] =	"Erreur inattendue!!! ";
            $dVueEreur[] =	$e2->getMessage();
			require ($rep.$vues['erreur']);
        }


		//fin
		exit(0);
    }

    function ajouterFlux(){
        global $rep, $vues;
        $urlAAJouter=$_POST['urlToAdd'];
        if (!filter_var($urlAAJouter, FILTER_VALIDATE_URL)){
            $dVueEreur[] = "mauvais URL";
            require ($rep.$vues['erreur']);
            return;
        }
        ModelFlux::addFlux($urlAAJouter);
        $_REQUEST['action']="flux";
        new FrontControl();
    }

    function deleteFlux(){
        global $rep, $vues;
        $urlFlux=$_REQUEST['urlFlux'];
        if(isset($urlFlux)){
            ModelFlux::delFlux($urlFlux);
        }
        $_REQUEST['action']="flux";
        new FrontControl();
    }

    function ajouterAdmin(){
        global $rep, $vues;
        if(!isset($_POST['loginAdmin']) || !isset($_POST['passwordAdmin'])) {
            require($rep . $vues['ajoutAdmin']);
            return;
        }
        ModelAdmin::ajouterAdmin(filter_var($_POST['loginAdmin'], FILTER_SANITIZE_STRING), filter_var($_POST['passwordAdmin'], FILTER_SANITIZE_STRING));
        $_REQUEST['action']="flux";
        new FrontControl();
    }

    function disconnect(){
        ModelAdmin::deconnection();
        $_REQUEST['action']=null;
        new FrontControl();
    }

    function afficherFlux(){
        global $rep, $vues;

		$tabFlux=ModelFlux::getFlux();
		require ($rep.$vues['adminView']);
    }

    function ValidationFormulaire(array $dVueEreur) {
		global $rep,$vues;


		//si exception, ca remonte !!!
		$nom=$_POST['txtNom']; // txtNom = nom du champ texte dans le formulaire
		$age=$_POST['txtAge'];
		Validation::val_form($nom,$age,$dVueEreur);

		$model = new Simplemodel();
		$data=$model->get_data();

		$dVue = array (
			'nom' => $nom,
			'age' => $age,
            'data' => $data,
        );
		require ($rep.$vues['vuephp1']);
	}

}

?>