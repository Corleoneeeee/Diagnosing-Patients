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
$tree->root = new Node("Ai demult durere de spate?");
$tree->root->left = new Node("Durerea este localizată în partea de jos a spatelui?");
$tree->root->right = new Node("Durerea radiază către picioare?");

// Extindem ramura "Da" pentru durere în partea de jos a spatelui
$tree->root->left->left = new Node("Durerea se agravează după perioade lungi de ședere sau stat în picioare?");
$tree->root->left->right = new Node("Durerea se ameliorează la repaus?");

$tree->root->left->left->left = new Node("Ai simțit o ameliorare folosind căldură locală sau exerciții ușoare?");
$tree->root->left->left->right = new Node("Durerea este însoțită de amorțeală sau furnicături?");

$tree->root->left->right->left = new Node("Ai antecedente de traume la nivelul spatelui?");
$tree->root->left->right->right = new Node("Ai slăbiciune musculară sau dificultăți la mers?");

// Diagnostice adiționale și detaliate pentru ramura "Da"
$tree->root->left->left->left->left = new Node("", "Dureri mecanice de spate");
$tree->root->left->left->left->right = new Node("", "Hernie de disc lombară");
$tree->root->left->left->right->left = new Node("", "Spondiloză lombară");
$tree->root->left->left->right->right = new Node("", "Stenoză spinală lombară");

$tree->root->left->right->left->left = new Node("", "Entorsă sau distensie musculară");
$tree->root->left->right->left->right = new Node("", "Fractură vertebrală prin compresie");
$tree->root->left->right->right->left = new Node("", "Discopatie degenerativă");
$tree->root->left->right->right->right = new Node("", "Infecție spinală");

// Extindem ramura "Da" pentru durere care radiază către picioare
$tree->root->right->left = new Node("Simți durerea ca un șoc electric care se extinde în jos pe picior?");
$tree->root->right->right = new Node("Durerea este asociată cu pierderea controlului vezicii urinare sau intestinale?");

$tree->root->right->left->left = new Node("Durerea se ameliorează când stai aplecat în față?");
$tree->root->right->left->right = new Node("Durerea persistă chiar și la repaus complet?");

$tree->root->right->right->left = new Node("Ai slăbiciune în picioare sau dificultăți la mers?");
$tree->root->right->right->right = new Node("Ai febră sau alte simptome de infecție?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Sciatică");
$tree->root->right->left->left->right = new Node("", "Hernie de disc cu radiculopatie");
$tree->root->right->left->right->left = new Node("", "Sindromul de coadă de cal");
$tree->root->right->left->right->right = new Node("", "Sindromul piriformis");

$tree->root->right->right->left->left = new Node("", "Neuropatie diabetică");
$tree->root->right->right->left->right = new Node("", "Claudicație neurogenică");
$tree->root->right->right->right->left = new Node("", "Infecție spinală severă");
$tree->root->right->right->right->right = new Node("", "Cancer metastazat la coloana vertebrală");

// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
