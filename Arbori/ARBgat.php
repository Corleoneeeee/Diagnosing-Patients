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
$tree->root = new Node("Ai des probleme cu gâtul?");
$tree->root->left = new Node("Ai durere în gât?");
$tree->root->right = new Node("Simți o umflătură sau o presiune în gât?");

// Extindem ramura "Da" pentru durere în gât
$tree->root->left->left = new Node("Durerea este însoțită de dificultăți la înghițire?");
$tree->root->left->right = new Node("Durerea este însoțită de febră sau ganglioni limfatici umflați?");

$tree->root->left->left->left = new Node("Ai simptome de răceală sau gripă?");
$tree->root->left->left->right = new Node("Simți durerea doar pe o parte a gâtului?");

$tree->root->left->right->left = new Node("Ai pete albe pe amigdale sau în gât?");
$tree->root->left->right->right = new Node("Durerea de gât este persistentă și se agravează?");

// Diagnostice adiționale și detaliate pentru ramura "Da"
$tree->root->left->left->left->left = new Node("", "Faringită virală");
$tree->root->left->left->left->right = new Node("", "Faringită bacteriană");
$tree->root->left->left->right->left = new Node("", "Infecție mononucleoză");
$tree->root->left->left->right->right = new Node("", "Absces peritonsilar");

$tree->root->left->right->left->left = new Node("", "Amigdalită streptococică");
$tree->root->left->right->left->right = new Node("", "Candidoză orală");
$tree->root->left->right->right->left = new Node("", "Laringită cronică");
$tree->root->left->right->right->right = new Node("", "Cancer de gât");

// Extindem ramura "Da" pentru umflătură sau presiune în gât
$tree->root->right->left = new Node("Umflătura este dureroasă la atingere?");
$tree->root->right->right = new Node("Ai dificultăți de respirație sau un sentiment de sufocare?");

$tree->root->right->left->left = new Node("Umflătura s-a dezvoltat rapid?");
$tree->root->right->left->right = new Node("Umflătura este moale și se mișcă la atingere?");

$tree->root->right->right->left = new Node("Ai pierdut în greutate neintenționat recent?");
$tree->root->right->right->right = new Node("Simți că vocea ta a devenit răgușită?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Infecție a glandelor salivare");
$tree->root->right->left->left->right = new Node("", "Absces submandibular");
$tree->root->right->left->right->left = new Node("", "Chist tiroidian");
$tree->root->right->left->right->right = new Node("", "Chist sebaceu");

$tree->root->right->right->left->left = new Node("", "Cancer tiroidian");
$tree->root->right->right->left->right = new Node("", "Limfom");
$tree->root->right->right->right->left = new Node("", "Paralizie a corzilor vocale");
$tree->root->right->right->right->right = new Node("", "Tumori laringiene");


// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
