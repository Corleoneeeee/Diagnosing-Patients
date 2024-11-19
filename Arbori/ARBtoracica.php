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
$tree->root = new Node("Ai des durere în zona toracică?");
$tree->root->left = new Node("Durerea este bruscă și intensă?");
$tree->root->right = new Node("Simți presiune sau disconfort în piept?");

// Extindem ramura "Nu" pentru durere bruscă și intensă
$tree->root->left->left = new Node("Durerea este asociată cu respirația?");
$tree->root->left->right = new Node("Durerea radiază către alte părți ale corpului?");

$tree->root->left->left->left = new Node("Ai dificultăți la respirație?");
$tree->root->left->left->right = new Node("Durerea se intensifică la tuse sau mișcare?");

$tree->root->left->right->left = new Node("Simți amorțeală sau slăbiciune în membre?");
$tree->root->left->right->right = new Node("Ai simțit palpitații sau bătăi neregulate ale inimii?");

// Diagnostice adiționale și detaliate pentru ramura "Nu"
$tree->root->left->left->left->left = new Node("", "Pneumonie sau bronșită");
$tree->root->left->left->left->right = new Node("", "Pleurită");
$tree->root->left->left->right->left = new Node("", "Costocondrită");
$tree->root->left->left->right->right = new Node("", "Traumă la nivelul pieptului");

$tree->root->left->right->left->left = new Node("", "Infarct miocardic");
$tree->root->left->right->left->right = new Node("", "Accident vascular cerebral");
$tree->root->left->right->right->left = new Node("", "Aritmie cardiacă");
$tree->root->left->right->right->right = new Node("", "Anxietate sau atac de panică");

// Extindem ramura "Da" pentru presiune sau disconfort în piept
$tree->root->right->left = new Node("Durerea apare în timpul efortului fizic?");
$tree->root->right->right = new Node("Durerea este însoțită de oboseală sau epuizare?");

$tree->root->right->left->left = new Node("Durerea se ameliorează cu odihna?");
$tree->root->right->left->right = new Node("Simți greață sau transpirații reci?");

$tree->root->right->right->left = new Node("Ai avut episoade similare în trecut?");
$tree->root->right->right->right = new Node("Simți o presiune persistentă chiar și fără activitate fizică?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Angină pectorală");
$tree->root->right->left->left->right = new Node("", "Boală cardiacă ischemică");
$tree->root->right->left->right->left = new Node("", "Infarct miocardic acut");
$tree->root->right->left->right->right = new Node("", "Pericardită");

$tree->root->right->right->left->left = new Node("", "Gastroesofagiană reflux disease (GERD)");
$tree->root->right->right->left->right = new Node("", "Boală cardiacă cronică");
$tree->root->right->right->right->left = new Node("", "Hernie hiatală");
$tree->root->right->right->right->right = new Node("", "Tumori mediastinale");


// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
