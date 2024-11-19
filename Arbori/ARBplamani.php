<?php

class Node
{
    public $question;
    public $left;
    public $right;
    public $diagnosis;

    public function __construct($question, $diagnosis = null)
    {
        $this->question = $question;
        $this->diagnosis = $diagnosis;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree
{
    public $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function toJson($node)
    {
        if ($node === null) {
            return null;
        }
        return array(
            "question" => $node->question,
            "diagnosis" => $node->diagnosis,
            "right" => $this->toJson($node->left),
            "left" => $this->toJson($node->right)
        );
    }
}

// Crearea arborelui
$tree = new BinaryTree();
$tree->root = new Node("Ai simptome legate de plămâni?");
$tree->root->left = new Node("Ai tuse persistentă sau dificultăți de respirație?");
$tree->root->right = new Node("Simți durere când respiri adânc sau tusești?");

// Extindem ramura "Da" pentru tuse persistentă sau dificultăți de respirație
$tree->root->left->left = new Node("Tusea este uscată sau expectorezi mucus?");
$tree->root->left->right = new Node("Ai simptome de răceală sau gripă care nu se îmbunătățesc?");

$tree->root->left->left->left = new Node("Tusea este însoțită de fluierături sau șuierături?");
$tree->root->left->left->right = new Node("Expectorația este colorată sau cu sânge?");

$tree->root->left->right->left = new Node("Ai febră sau frisoane?");
$tree->root->left->right->right = new Node("Ai pierdut în greutate fără un motiv evident?");

// Diagnostice adiționale și detaliate pentru ramura "Da"
$tree->root->left->left->left->left = new Node("", "Astm bronșic");
$tree->root->left->left->left->right = new Node("", "Bronșită cronică");
$tree->root->left->left->right->left = new Node("", "Bronșiectazie");
$tree->root->left->left->right->right = new Node("", "Cancer pulmonar");

$tree->root->left->right->left->left = new Node("", "Pneumonie");
$tree->root->left->right->left->right = new Node("", "Tuberculoză");
$tree->root->left->right->right->left = new Node("", "Sarcoidoză");
$tree->root->left->right->right->right = new Node("", "Fibroză pulmonară");

// Extindem ramura "Da" pentru durere când respiri adânc sau tusești
$tree->root->right->left = new Node("Durerea este localizată pe o parte a pieptului sau se răspândește?");
$tree->root->right->right = new Node("Ai avut recent o accidentare la piept sau o intervenție chirurgicală?");

$tree->root->right->left->left = new Node("Durerea se intensifică când te miști sau respiri adânc?");
$tree->root->right->left->right = new Node("Simți presiune sau disconfort în piept?");

$tree->root->right->right->left = new Node("Ai simptome de infecție, cum ar fi febră sau tuse productivă?");
$tree->root->right->right->right = new Node("Durerea este asociată cu palpitații sau amețeli?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Pleurită");
$tree->root->right->left->left->right = new Node("", "Pneumotorax");
$tree->root->right->left->right->left = new Node("", "Angină pectorală");
$tree->root->right->left->right->right = new Node("", "Infarct miocardic");

$tree->root->right->right->left->left = new Node("", "Costocondrită");
$tree->root->right->right->left->right = new Node("", "Embolie pulmonară");
$tree->root->right->right->right->left = new Node("", "Pericardită");
$tree->root->right->right->right->right = new Node("", "Disecție aortică");

// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
