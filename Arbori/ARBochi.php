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
$tree->root = new Node("Ai demult probleme cu ochii?");
$tree->root->left = new Node("Ai durere sau iritație la nivelul ochilor?");
$tree->root->right = new Node("Ai observat modificări în vederea ta?");

// Extindem ramura "Da" pentru durere sau iritație
$tree->root->left->left = new Node("Durerea este asociată cu roșeață?");
$tree->root->left->right = new Node("Simți o senzație de corp străin în ochi?");

$tree->root->left->left->left = new Node("Ai fost expus recent la lumină puternică sau la soare?");
$tree->root->left->left->right = new Node("Simți durere când clipești sau miști ochii?");

$tree->root->left->right->left = new Node("Durerea se ameliorează cu lacrimi artificiale sau spălare?");
$tree->root->left->right->right = new Node("Ai văzut pete sau puncte plutitoare?");

// Diagnostice adiționale și detaliate pentru ramura "Da"
$tree->root->left->left->left->left = new Node("", "Fotokeratită");
$tree->root->left->left->left->right = new Node("", "Conjunctivită");
$tree->root->left->left->right->left = new Node("", "Uveită");
$tree->root->left->left->right->right = new Node("", "Glaucom acut");

$tree->root->left->right->left->left = new Node("", "Sindromul ochiului uscat");
$tree->root->left->right->left->right = new Node("", "Corpi străini în ochi");
$tree->root->left->right->right->left = new Node("", "Desprindere de retină");
$tree->root->left->right->right->right = new Node("", "Miopie temporală");

// Extindem ramura "Da" pentru modificări în vederea
$tree->root->right->left = new Node("Ai dificultăți de a vedea detaliile?");
$tree->root->right->right = new Node("Ai vederea încețoșată sau dublă?");

$tree->root->right->left->left = new Node("Problema de vedere este în un singur ochi sau ambii ochi?");
$tree->root->right->left->right = new Node("Ai dificultăți de vedere la distanțe mari sau aproape?");

$tree->root->right->right->left = new Node("Vederea încețoșată vine și pleacă sau este constantă?");
$tree->root->right->right->right = new Node("Ai avut recent dureri de cap sau probleme de echilibru?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Cataractă");
$tree->root->right->left->left->right = new Node("", "Ambliopie");
$tree->root->right->left->right->left = new Node("", "Presbiopie");
$tree->root->right->left->right->right = new Node("", "Astigmatism");

$tree->root->right->right->left->left = new Node("", "Migrenă oculară");
$tree->root->right->right->left->right = new Node("", "Retinopatie diabetică");
$tree->root->right->right->right->left = new Node("", "Tumori cerebrale");
$tree->root->right->right->right->right = new Node("", "Vertij asociat cu probleme vizuale");


// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
