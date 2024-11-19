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
$tree->root = new Node("Ai des durere de stomac?");
$tree->root->left = new Node("Durerea este ascuțită și constantă?");
$tree->root->right = new Node("Ai arsuri stomacale sau reflux acid?");

// Extindem ramura "Nu" pentru durere ascuțită și constantă
$tree->root->left->left = new Node("Durerea este asociată cu consumul de mâncare?");
$tree->root->left->right = new Node("Simți greață sau vărsături?");

$tree->root->left->left->left = new Node("Ai observat sânge în scaun sau vărsături?");
$tree->root->left->left->right = new Node("Durerea se ameliorează după mâncare?");

$tree->root->left->right->left = new Node("Ai febră sau frisoane?");
$tree->root->left->right->right = new Node("Ai avut contact cu cineva bolnav recent?");




$tree->root->left->left->left->left = new Node("Ai avut senzația de lipsă de aer în timpul episoadelor de durere?");
$tree->root->left->left->left->right = new Node("Ai observat o creștere a balonării în timpul perioadelor de stres?");
$tree->root->left->left->right->left = new Node("Ai avut recent expunere la substanțe iritante din mediu, cum ar fi fumul de tutun sau poluarea?");
$tree->root->left->left->right->right = new Node("Ai observat o creștere a senzației de arsură în gât după mese?");

$tree->root->left->right->left->left = new Node("Ai observat că durerea se agravează în timpul efortului fizic?");
$tree->root->left->right->left->right = new Node("Ai observat că durerea este mai intensă după perioadele de înfometare?");
$tree->root->left->right->right->left = new Node("Ai observat că durerea se ameliorează după odihnă sau somn?");
$tree->root->left->right->right->right = new Node("Ai observat că disconfortul abdominal este asociat cu starea emoțională?");


//------------------------------------------------------

$tree->root->left->left->left->left->left = new Node("Ai avut senzație de arsură în partea superioară a abdomenului?");
$tree->root->left->left->left->right->right = new Node("Ai observat o creștere a durerii în timpul sau după mese?");
$tree->root->left->left->right->left->left = new Node("Ai avut recent episoade de greață sau vărsături?");
$tree->root->left->left->right->right->right = new Node("Ai simțit o senzație de plenitudine sau umflare rapidă la stomac?");

$tree->root->left->right->left->left->left = new Node("Ai observat o scădere a poftei de mâncare în mod constant?");
$tree->root->left->right->left->right->right = new Node("Ai avut recent episoade de regurgitare a alimentelor?");
$tree->root->left->right->right->left->left = new Node("Ai simțit o senzație de arsură în gât sau în piept?");
$tree->root->left->right->right->right->right = new Node("Ai observat că durerea este accentuată la culcare sau noaptea?");







$tree->root->left->left->left->left->left->left = new Node("", "Ulcer gastric sângerând");
$tree->root->left->left->left->left->right = new Node("", "Stenoză esofagiană");
$tree->root->left->left->left->right->left = new Node("", "Cancer gastric");
$tree->root->left->left->left->right->right = new Node("", "Ulcere duodenale:");
$tree->root->left->left->right->left->right = new Node("", "Gastrită");
$tree->root->left->left->right->right->right = new Node("", "Ulcere duodenale");

$tree->root->left->right->left->left->left = new Node("", "Infecție virală sau bacteriană");
$tree->root->left->right->left->left->right = new Node("", "Esofagită de reflux");
$tree->root->left->right->left->right->left = new Node("", "Intoxicație alimentară");
$tree->root->left->right->right->left->right = new Node("", "Gastroenterită severă");
$tree->root->left->right->right->right->right = new Node("", "Apendicită acută");







//=------------------------------------------------------------------------------------------
// Extindem ramura "Da" pentru arsuri stomacale sau reflux acid
$tree->root->right->left = new Node("Simți o presiune sau arsură după mâncare?");
$tree->root->right->right = new Node("Ai dificultăți la înghițire sau durere când înghiți?");

$tree->root->right->left->left = new Node("Arsura este mai rău noaptea?");
$tree->root->right->left->right = new Node("Simptomele sunt ameliorate cu antiacide?");

$tree->root->right->right->left = new Node("Simți durere când înghiți alimente solide?");
$tree->root->right->right->right = new Node("Ai pierdut în greutate recent fără să încerci?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Reflux gastroesofagian nocturn");
$tree->root->right->left->left->right = new Node("", "Esofagită peptica");
$tree->root->right->left->right->left = new Node("", "Dispepsie");
$tree->root->right->left->right->right = new Node("", "Hernie hiatală");

$tree->root->right->right->left->left = new Node("", "Esofagită de reflux");
$tree->root->right->right->left->right = new Node("", "Stenoză esofagiană");
$tree->root->right->right->right->left = new Node("", "Cancer esofagian incipient");
$tree->root->right->right->right->right = new Node("", "Cancer esofagian avansat");

// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
