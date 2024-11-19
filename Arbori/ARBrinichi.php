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
$tree->root = new Node("Ai simptome legate de rinichi?");
$tree->root->left = new Node("Simți durere în flancuri sau în spate, sub coaste?");
$tree->root->right = new Node("Ai observat schimbări în urinare?");

// Extindem ramura "Da" pentru durere în flancuri sau spate
$tree->root->left->left = new Node("Durerea este severă și vine în valuri?");
$tree->root->left->right = new Node("Durerea se răspândește către abdomenul inferior sau inghinal?");

$tree->root->left->left->left = new Node("Ai greață sau vărsături asociate cu durerea?");
$tree->root->left->left->right = new Node("Ai avut recent o infecție urinară?");

$tree->root->left->right->left = new Node("Durerea este constantă și persistă pentru mai multe ore?");
$tree->root->left->right->right = new Node("Simți o senzație de arsură când urinezi?");

// Diagnostice adiționale și detaliate pentru ramura "Da"
$tree->root->left->left->left->left = new Node("", "Colici renale datorate pietrelor la rinichi");
$tree->root->left->left->left->right = new Node("", "Infecție renală acută (pielonefrită)");
$tree->root->left->left->right->left = new Node("", "Urolitiază în tranzit");
$tree->root->left->left->right->right = new Node("", "Hidronefroză");

$tree->root->left->right->left->left = new Node("", "Tumoră renală");
$tree->root->left->right->left->right = new Node("", "Traumă renală");
$tree->root->left->right->right->left = new Node("", "Cistită");
$tree->root->left->right->right->right = new Node("", "Glomerulonefrită");

// Extindem ramura "Da" pentru schimbări în urinare
$tree->root->right->left = new Node("Urina este tulbure sau are un miros neobișnuit de puternic?");
$tree->root->right->right = new Node("Ai observat prezența sângelui în urină sau urinări frecvente și urgente?");

$tree->root->right->left->left = new Node("Simți durere sau disconfort în timpul urinării?");
$tree->root->right->left->right = new Node("Ai o senzație de golire incompletă a vezicii urinare?");

$tree->root->right->right->left = new Node("Ai edeme la nivelul picioarelor sau pleoapelor?");
$tree->root->right->right->right = new Node("Ai tensiune arterială crescută sau alte simptome neobișnuite?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Infecție urinară");
$tree->root->right->left->left->right = new Node("", "Litiază urinară");
$tree->root->right->left->right->left = new Node("", "Prostatită");
$tree->root->right->left->right->right = new Node("", "Retenție urinară acută");

$tree->root->right->right->left->left = new Node("", "Insuficiență renală cu retenție hidrosalină");
$tree->root->right->right->left->right = new Node("", "Nefropatie diabetică");
$tree->root->right->right->right->left = new Node("", "Glomerulonefrită acută");
$tree->root->right->right->right->right = new Node("", "Hipertensiune arterială secundară afecțiunilor renale");

// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
