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
$tree->root = new Node("Ai des durere de genunchi?");
$tree->root->left = new Node("Durerea este constantă sau apare după activitate fizică?");
$tree->root->right = new Node("Simți umflături sau rigiditate în genunchi?");

// Extindem ramura "Da" pentru durere după activitate fizică
$tree->root->left->left = new Node("Durerea se localizează sub genunchi?");
$tree->root->left->right = new Node("Durerea este în jurul genunchiului sau deasupra?");

$tree->root->left->left->left = new Node("Simți durerea când urci sau cobori scările?");
$tree->root->left->left->right = new Node("Durerea este însoțită de un sunet de 'clic' sau 'crac' atunci când miști genunchiul?");

$tree->root->left->right->left = new Node("Durerea este mai intensă dimineața sau după perioade de inactivitate?");
$tree->root->left->right->right = new Node("Durerea se ameliorează cu aplicarea de gheață sau repaus?");

// Diagnostice adiționale și detaliate pentru ramura "Da"
$tree->root->left->left->left->left = new Node("", "Sindromul patelofemural");
$tree->root->left->left->left->right = new Node("", "Tendinită patelară");
$tree->root->left->left->right->left = new Node("", "Menisc lezat");
$tree->root->left->left->right->right = new Node("", "Leziune de ligament încrucișat");

$tree->root->left->right->left->left = new Node("", "Artrită de genunchi");
$tree->root->left->right->left->right = new Node("", "Gonartroză (osteoartrită de genunchi)");
$tree->root->left->right->right->left = new Node("", "Bursită");
$tree->root->left->right->right->right = new Node("", "Leziuni minore la nivelul țesuturilor moi");

// Extindem ramura "Da" pentru umflături sau rigiditate
$tree->root->right->left = new Node("Umflătura este caldă și dureroasă la atingere?");
$tree->root->right->right = new Node("Simți genunchiul instabil sau ca și cum ar putea 'ceda'?");

$tree->root->right->left->left = new Node("Ai avut un traumatism recent la genunchi?");
$tree->root->right->left->right = new Node("Umflătura apare și dispare sau este constantă?");

$tree->root->right->right->left = new Node("Simți blocări ale genunchiului când încerci să îl miști?");
$tree->root->right->right->right = new Node("Durerea și umflătura s-au agravat brusc?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Leziune acută la menisc");
$tree->root->right->left->left->right = new Node("", "Infecție a genunchiului");
$tree->root->right->left->right->left = new Node("", "Efuziune articulară intermitentă");
$tree->root->right->left->right->right = new Node("", "Artrită reactivă");

$tree->root->right->right->left->left = new Node("", "Leziune de cartilaj");
$tree->root->right->right->left->right = new Node("", "Subluxație de rotulă");
$tree->root->right->right->right->left = new Node("", "Fractură de rotulă");
$tree->root->right->right->right->right = new Node("", "Ruptură de ligament încrucișat anterior sau posterior");

// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
