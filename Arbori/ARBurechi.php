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
$tree->root = new Node("Ai probleme cu urechile?");
$tree->root->left = new Node("Ai durere în urechi?");
$tree->root->right = new Node("Ai dificultăți de auz sau zgomote în urechi?");

// Extindem ramura "Da" pentru durere în urechi
$tree->root->left->left = new Node("Durerea este însoțită de secreții?");
$tree->root->left->right = new Node("Durerea este asociată cu o presiune internă?");

$tree->root->left->left->left = new Node("Secrețiile sunt purulente sau mirositoare?");
$tree->root->left->left->right = new Node("Ai febră sau simptome de răceală?");

$tree->root->left->right->left = new Node("Ai simțit recent schimbări de altitudine sau ai călătorit cu avionul?");
$tree->root->left->right->right = new Node("Durerea este intermitentă și se intensifică la mestecat?");

// Diagnostice adiționale și detaliate pentru ramura "Da"
$tree->root->left->left->left->left = new Node("", "Otita medie supurativă");
$tree->root->left->left->left->right = new Node("", "Otita externă");
$tree->root->left->left->right->left = new Node("", "Infecție respiratorie superioară");
$tree->root->left->left->right->right = new Node("", "Sinuzită");

$tree->root->left->right->left->left = new Node("", "Barotraumă");
$tree->root->left->right->left->right = new Node("", "Disfuncție a tubului Eustachian");
$tree->root->left->right->right->left = new Node("", "Disfuncție temporomandibulară");
$tree->root->left->right->right->right = new Node("", "Neuralgie trigeminală");

// Extindem ramura "Da" pentru dificultăți de auz sau zgomote în urechi
$tree->root->right->left = new Node("Auzul tău a scăzut brusc?");
$tree->root->right->right = new Node("Auzi zgomote constante sau intermitente, cum ar fi țipături sau vâjâituri?");

$tree->root->right->left->left = new Node("Este pierderea auzului asociată cu durere?");
$tree->root->right->left->right = new Node("Ai fost expus la zgomote foarte puternice recent?");

$tree->root->right->right->left = new Node("Zgomotele sunt într-un singur ureche sau în ambele?");
$tree->root->right->right->right = new Node("Simți că zgomotele sunt pulsatile?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Otita medie acută");
$tree->root->right->left->left->right = new Node("", "Traumă acustică");
$tree->root->right->left->right->left = new Node("", "Expunere prelungită la zgomot");
$tree->root->right->left->right->right = new Node("", "Perforație a timpanului");

$tree->root->right->right->left->left = new Node("", "Acufene subiective");
$tree->root->right->right->left->right = new Node("", "Acufene bilaterale");
$tree->root->right->right->right->left = new Node("", "Glomus tumoral");
$tree->root->right->right->right->right = new Node("", "Hipertensiune arterială");

// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
