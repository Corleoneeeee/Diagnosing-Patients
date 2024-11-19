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
$tree->root = new Node("Ai probleme cu talpile picioarelor?");
$tree->root->left = new Node("Simți durere în talpi?");
$tree->root->right = new Node("Ai mâncărime, roșeață sau umflături?");

// Extindem ramura "Da" pentru durere în talpi
$tree->root->left->left = new Node("Durerea este asociată cu mersul pe jos sau statul în picioare?");
$tree->root->left->right = new Node("Durerea este mai rău dimineața sau după repaus?");

$tree->root->left->left->left = new Node("Durerea se localizează în călcâi?");
$tree->root->left->left->right = new Node("Durerea este în partea din față a tălpii, sub degete?");

$tree->root->left->right->left = new Node("Simți durerea când îți miști degetele de la picioare?");
$tree->root->left->right->right = new Node("Ai senzație de arsură în talpă?");

// Diagnostice adiționale și detaliate pentru ramura "Da"
$tree->root->left->left->left->left = new Node("", "Fasciită plantară");
$tree->root->left->left->left->right = new Node("", "Bursită calcaneană");
$tree->root->left->left->right->left = new Node("", "Metatarsalgie");
$tree->root->left->left->right->right = new Node("", "Neurom Morton");

$tree->root->left->right->left->left = new Node("", "Artrită la degete");
$tree->root->left->right->left->right = new Node("", "Tendinită");
$tree->root->left->right->right->left = new Node("", "Neuropatie diabetică");
$tree->root->left->right->right->right = new Node("", "Infecție fungală");

// Extindem ramura "Da" pentru mâncărime, roșeață sau umflături
$tree->root->right->left = new Node("Mâncărimea este însoțită de piele crăpată sau coji?");
$tree->root->right->right = new Node("Umflăturile sunt dureroase sau se simt calde la atingere?");

$tree->root->right->left->left = new Node("Ai blistere sau erupții pe talpă?");
$tree->root->right->left->right = new Node("Ai observat piele îngroșată sau galbenă sub degete?");

$tree->root->right->right->left = new Node("Ai avut recent o leziune la picior?");
$tree->root->right->right->right = new Node("Ai simptome care indică o infecție, cum ar fi febră sau drenaj?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Dermatită de contact");
$tree->root->right->left->left->right = new Node("", "Herpes zoster");
$tree->root->right->left->right->left = new Node("", "Tinea pedis (piciorul atletului)");
$tree->root->right->left->right->right = new Node("", "Calozități sau bătături");

$tree->root->right->right->left->left = new Node("", "Entorsă sau contuzie");
$tree->root->right->right->left->right = new Node("", "Gută");
$tree->root->right->right->right->left = new Node("", "Celulită");
$tree->root->right->right->right->right = new Node("", "Osteomielită");


// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
