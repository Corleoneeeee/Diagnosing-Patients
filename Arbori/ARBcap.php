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
$tree->root = new Node("Ai des dureri de cap?");
$tree->root->left = new Node("Durerea de cap este severă și bruscă?");
$tree->root->right = new Node("Ai simțit o presiune sau durere în jurul ochilor?");

// Extindem ramura "Nu" pentru durere de cap severă și bruscă
$tree->root->left->left = new Node("Durerea de cap este însoțită de greață sau vărsături?");
$tree->root->left->right = new Node("Durerea de cap este pulsatilă?");

$tree->root->left->left->left = new Node("Ai avut recent un traumatism cranian?");
$tree->root->left->left->right = new Node("Ai probleme de coordonare sau slăbiciune musculară?");

$tree->root->left->right->left = new Node("Ai sensibilitate la lumină sau zgomote?");
$tree->root->left->right->right = new Node("Durerea se reduce după odihnă sau medicamente pentru durere?");

// Diagnostice adiționale și detaliate pentru ramura "Nu"
$tree->root->left->left->left->left = new Node("", "Hemoragie intracraniană");
$tree->root->left->left->left->right = new Node("", "Meningită sau encefalită");
$tree->root->left->left->right->left = new Node("", "Accident vascular cerebral");
$tree->root->left->left->right->right = new Node("", "Tumoră cerebrală");

$tree->root->left->right->left->left = new Node("", "Migrenă");
$tree->root->left->right->left->right = new Node("", "Cefalee de tensiune");
$tree->root->left->right->right->left = new Node("", "Cluster headache");
$tree->root->left->right->right->right = new Node("", "Cefalee cauzată de sinusită");

// Extindem ramura "Da" pentru presiune sau durere în jurul ochilor
$tree->root->right->left = new Node("Durerea se agravează cu mișcarea ochilor?");
$tree->root->right->right = new Node("Ai simptome de rinită sau congestie nazală?");

$tree->root->right->left->left = new Node("Ai avut recent o infecție respiratorie?");
$tree->root->right->left->right = new Node("Ai probleme cu vederea?");

$tree->root->right->right->left = new Node("Durerea este localizată mai mult într-o parte a capului?");
$tree->root->right->right->right = new Node("Ai secreții nazale clare sau purulente?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Neurită optică");
$tree->root->right->left->left->right = new Node("", "Glaucom acut cu unghi închis");
$tree->root->right->left->right->left = new Node("", "Sinuzită acută");
$tree->root->right->left->right->right = new Node("", "Degenerescență maculară");

$tree->root->right->right->left->left = new Node("", "Cefalee de tip cluster");
$tree->root->right->right->left->right = new Node("", "Migrenă cu aura");
$tree->root->right->right->right->left = new Node("", "Sinuzită cronică");
$tree->root->right->right->right->right = new Node("", "Polipoză nazală");


// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
