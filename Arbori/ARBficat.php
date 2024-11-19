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
$tree->root = new Node("Ai simptome legate de ficat?");
$tree->root->left = new Node("Simți durere sau disconfort în partea dreaptă sus a abdomenului?");
$tree->root->right = new Node("Ai observat icter sau modificări ale culorii urinei sau scaunului?");

// Extindem ramura "Da" pentru durere sau disconfort
$tree->root->left->left = new Node("Durerea este accentuată după consumul de alimente grase sau alcool?");
$tree->root->left->right = new Node("Simți umflături sau plenitudine în acea zonă?");

$tree->root->left->left->left = new Node("Durerea se iradiază către spate sau umărul drept?");
$tree->root->left->left->right = new Node("Ai greață sau vărsături asociate cu durerea?");

$tree->root->left->right->left = new Node("Simți durere la atingere în zona ficatului?");
$tree->root->left->right->right = new Node("Durerea este constantă indiferent de poziția corpului?");

// Diagnostice adiționale și detaliate pentru ramura "Da"
$tree->root->left->left->left->left = new Node("", "Colecistită");
$tree->root->left->left->left->right = new Node("", "Colici biliare");
$tree->root->left->left->right->left = new Node("", "Pancreatită acută");
$tree->root->left->left->right->right = new Node("", "Hepatită acută");

$tree->root->left->right->left->left = new Node("", "Hepatomegalie");
$tree->root->left->right->left->right = new Node("", "Steatoză hepatică");
$tree->root->left->right->right->left = new Node("", "Fibroză hepatică");
$tree->root->left->right->right->right = new Node("", "Ciroză hepatică");

// Extindem ramura "Da" pentru icter și modificări ale culorii urinei sau scaunului
$tree->root->right->left = new Node("Urina este de culoare închisă și scaunul deschis?");
$tree->root->right->right = new Node("Simți oboseală generală sau mâncărime pe tot corpul?");

$tree->root->right->left->left = new Node("Ai febră sau frisoane?");
$tree->root->right->left->right = new Node("Simți pierderea apetitului sau scăderea în greutate neintenționată?");

$tree->root->right->right->left = new Node("Ai sângerări ușoare sau vânătăi care apar fără un motiv aparent?");
$tree->root->right->right->right = new Node("Simți că te umfli, în special la nivelul picioarelor sau abdomenului?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Hepatită virală");
$tree->root->right->left->left->right = new Node("", "Abces hepatic");
$tree->root->right->left->right->left = new Node("", "Cancer hepatic");
$tree->root->right->left->right->right = new Node("", "Mononucleoză infectioasă");

$tree->root->right->right->left->left = new Node("", "Coagulopatie");
$tree->root->right->right->left->right = new Node("", "Hipertiroidism");
$tree->root->right->right->right->left = new Node("", "Insuficiență cardiacă");
$tree->root->right->right->right->right = new Node("", "Sindromul Budd-Chiari");


// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
