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
$tree->root = new Node("Ai des durere în mâini?");
$tree->root->left = new Node("Durerea este constantă sau apare la efort?");
$tree->root->right = new Node("Simți umflături sau inflamații în mâini?");

// Extindem ramura "Nu" pentru durere la efort
$tree->root->left->left = new Node("Durerea se localizează într-un anumit punct?");
$tree->root->left->right = new Node("Durerea se ameliorează cu repaus?");

$tree->root->left->left->left = new Node("Ai simțit un 'pop' sau zgomot la debutul durerii?");
$tree->root->left->left->right = new Node("Durerea este însoțită de roșeață sau căldură locală?");

$tree->root->left->right->left = new Node("Durerea este mai rău dimineața?");
$tree->root->left->right->right = new Node("Durerea este agravată de anumite mișcări?");

// Diagnostice adiționale și detaliate pentru ramura "Nu"
$tree->root->left->left->left->left = new Node("", "Ruptură de tendon");
$tree->root->left->left->left->right = new Node("", "Fractură de stres");
$tree->root->left->left->right->left = new Node("", "Infecție locală");
$tree->root->left->left->right->right = new Node("", "Gută sau artrită inflamatorie");

$tree->root->left->right->left->left = new Node("", "Artrită reumatoidă");
$tree->root->left->right->left->right = new Node("", "Tendinită");
$tree->root->left->right->right->left = new Node("", "Bursită");
$tree->root->left->right->right->right = new Node("", "Sindromul de tunel carpian");

// Extindem ramura "Da" pentru umflături sau inflamații
$tree->root->right->left = new Node("Umflăturile sunt calde sau dureroase la atingere?");
$tree->root->right->right = new Node("Există modificări de culoare sau temperatura pielii?");

$tree->root->right->left->left = new Node("Există istoric de călătorii recente sau imobilitate prelungită?");
$tree->root->right->left->right = new Node("Umflăturile apar și dispar sau sunt constante?");

$tree->root->right->right->left = new Node("Simți amorțeală sau furnicături în mâini?");
$tree->root->right->right->right = new Node("Ai dificultăți de circulație în istoricul medical?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Tromboză venoasă superficială");
$tree->root->right->left->left->right = new Node("", "Celulită");
$tree->root->right->left->right->left = new Node("", "Edem idiopatic");
$tree->root->right->left->right->right = new Node("", "Lipedem");

$tree->root->right->right->left->left = new Node("", "Neuropatie diabetică");
$tree->root->right->right->left->right = new Node("", "Sindrom Raynaud");
$tree->root->right->right->right->left = new Node("", "Artrită psoriazică");
$tree->root->right->right->right->right = new Node("", "Boala Buerger");



// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
