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
$tree->root = new Node("Ai des simptome legate de inimă?");
$tree->root->left = new Node("Simți durere sau presiune în piept?");
$tree->root->right = new Node("Ai palpitații sau bătăi neregulate ale inimii?");

// Extindem ramura "Da" pentru durere sau presiune în piept
$tree->root->left->left = new Node("Durerea se agravează la efort și se ameliorează la repaus?");
$tree->root->left->right = new Node("Durerea iradiază către brațul stâng, gât, maxilar sau spate?");

$tree->root->left->left->left = new Node("Simți oboseală sau lipsă de aer când faci efort?");
$tree->root->left->left->right = new Node("Ai simptome de greață, transpirații sau amețeală odată cu durerea?");

$tree->root->left->right->left = new Node("Durerea durează mai mult de câteva minute?");
$tree->root->left->right->right = new Node("Simți durerea chiar și când ești în repaus?");

// Diagnostice adiționale și detaliate pentru ramura "Da"
$tree->root->left->left->left->left = new Node("", "Angină pectorală");
$tree->root->left->left->left->right = new Node("", "Insuficiență cardiacă");
$tree->root->left->left->right->left = new Node("", "Infarct miocardic");
$tree->root->left->left->right->right = new Node("", "Ischemie miocardică");

$tree->root->left->right->left->left = new Node("", "Infarct miocardic acut");
$tree->root->left->right->left->right = new Node("", "Pericardită");
$tree->root->left->right->right->left = new Node("", "Disecție aortică");
$tree->root->left->right->right->right = new Node("", "Spasm esofagian");

// Extindem ramura "Da" pentru palpitații sau bătăi neregulate ale inimii
$tree->root->right->left = new Node("Palpitațiile sunt însoțite de amețeală sau leșin?");
$tree->root->right->right = new Node("Simți palpitațiile frecvent și fără un motiv aparent?");

$tree->root->right->left->left = new Node("Ai antecedente de boli de inimă în familie?");
$tree->root->right->left->right = new Node("Palpitațiile apar brusc și pot dura de la câteva secunde la ore?");

$tree->root->right->right->left = new Node("Simți un ritm cardiac foarte rapid, mai mult de 100 de bătăi pe minut, în repaus?");
$tree->root->right->right->right = new Node("Ai simptome de anxietate sau atacuri de panică odată cu palpitațiile?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Aritmie cardiacă");
$tree->root->right->left->left->right = new Node("", "Cardiomiopatie");
$tree->root->right->left->right->left = new Node("", "Tahicardie supraventriculară");
$tree->root->right->left->right->right = new Node("", "Fibrilație atrială");

$tree->root->right->right->left->left = new Node("", "Tahicardie sinus");
$tree->root->right->right->left->right = new Node("", "Hipertiroidism");
$tree->root->right->right->right->left = new Node("", "Sindromul de panică");
$tree->root->right->right->right->right = new Node("", "Anxietate generalizată");

// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
