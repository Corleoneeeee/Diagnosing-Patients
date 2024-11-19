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
$tree->root = new Node("Ai des durere în abdomen?");
$tree->root->left = new Node("Durerea este în partea superioară a abdomenului?");
$tree->root->right = new Node("Durerea este în partea inferioară a abdomenului?");

// Extindem ramura "Da" pentru durere în partea superioară a abdomenului
$tree->root->left->left = new Node("Durerea se agravează după mese?");
$tree->root->left->right = new Node("Simți arsuri stomacale sau reflux acid?");

$tree->root->left->left->left = new Node("Durerea este însoțită de greață sau vărsături?");
$tree->root->left->left->right = new Node("Simți balonare sau eructații frecvente?");

$tree->root->left->right->left = new Node("Durerea se ameliorează când mănânci sau iei antiacide?");
$tree->root->left->right->right = new Node("Ai dificultăți la înghițire sau senzație de aliment blocat?");

// Diagnostice adiționale și detaliate pentru ramura "Da"
$tree->root->left->left->left->left = new Node("", "Ulcere gastrice sau duodenale");
$tree->root->left->left->left->right = new Node("", "Gastrită");
$tree->root->left->left->right->left = new Node("", "Dispepsie funcțională");
$tree->root->left->left->right->right = new Node("", "Infecție cu Helicobacter pylori");

$tree->root->left->right->left->left = new Node("", "Reflux gastroesofagian (GERD)");
$tree->root->left->right->left->right = new Node("", "Hernie hiatală");
$tree->root->left->right->right->left = new Node("", "Esofagită");
$tree->root->left->right->right->right = new Node("", "Stenoză esofagiană");

// Extindem ramura "Da" pentru durere în partea inferioară a abdomenului
$tree->root->right->left = new Node("Durerea este asociată cu urinarea?");
$tree->root->right->right = new Node("Durerea este mai rău în timpul menstruației sau după activitate fizică?");

$tree->root->right->left->left = new Node("Ai observat sânge în urină sau durere când urinezi?");
$tree->root->right->left->right = new Node("Simți nevoia frecventă de a urina sau presiune pelvină?");

$tree->root->right->right->left = new Node("Ai secreții neobișnuite sau sângerare vaginală?");
$tree->root->right->right->right = new Node("Durerea este colicativă și intensă?");

// Diagnostice adiționale pentru ramura "Da"
$tree->root->right->left->left->left = new Node("", "Infecții ale tractului urinar");
$tree->root->right->left->left->right = new Node("", "Pietre la rinichi");
$tree->root->right->left->right->left = new Node("", "Cistită interstițială");
$tree->root->right->left->right->right = new Node("", "Prostatită");

$tree->root->right->right->left->left = new Node("", "Endometrioză");
$tree->root->right->right->left->right = new Node("", "Boala inflamatorie pelvină");
$tree->root->right->right->right->left = new Node("", "Torsiune ovariană");
$tree->root->right->right->right->right = new Node("", "Apendicită acută");

// Output-ul arborelui în format JSON pentru a fi utilizat în frontend
echo json_encode($tree->toJson($tree->root));
