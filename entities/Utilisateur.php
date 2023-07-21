<?php

/**
 * Description of Pays (PHP 8)
 */

declare(strict_types=1);

// Class NomDeLaClasse : Pascal case
class Utilisateur
{

    // Attributs, propriétés, variables d’instance : privées et typées
    private int $idUtilisateur;
    private string $nom;
    private string $prenom;
    private string $pseudo;
    private string $ville;
    private string $mail;
    private string $mdp;

    // Constructeur : méthode exécutée automatiquement au moment de l’instanciation d’un objet avec l’opérateur new
    // Paramètres typés et initialisés
    // Les variables d’instances sont initialisées
    public function __construct(int $idUtilisateur = 0, string $nom = "", string $prenom = "", string $pseudo = "", string $ville = "", string $mail = "", string $mdp = "")
    {
        $this->idUtilisateur = $idUtilisateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->pseudo = $pseudo;
        $this->ville = $ville;
        $this->mail = $mail;
        $this->mdp = $mdp;
    }

    // Getter : function-fonction typée sans paramètre avec un return
    public function getIdUtilisateur(): int
    {
        return $this->idUtilisateur;
    }
    public function getNom(): string
    {
        return $this->nom;
    }
    public function getPrenom(): string
    {
        return $this->prenom;
    }
    public function getPseudo(): string
    {
        return $this->pseudo;
    }
    public function getVille(): string
    {
        return $this->ville;
    }
    public function getMail(): string
    {
        return $this->mail;
    }
    public function getMdp(): string
    {
        return $this->mdp;
    }

    // Setter : function-procédure avec un paramètre typé sans return
    public function setIdUtilisateur(int $idUtilisateur): void
    {
        $this->idUtilisateur = $idUtilisateur;
    }
    public function setNom(string $nom): void
    {
        // Valorisation de la variable d’instance avec la valeur du paramètre
        $this->nom = $nom;
    }
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }
    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }
    public function setMdp(string $mdp): void
    {
        $this->mdp = $mdp;
    }
}
?>
