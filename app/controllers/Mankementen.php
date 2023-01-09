<?php

class Mankementen extends Controller
{

    public function __construct()
    {
        $this->MankementModel = $this->model('Mankement');
    }

    public function index()
    {
        $result = $this->MankementModel->getMankementen();

        // var_dump($result);
        // exit();
        $rows = '';
        foreach ($result as $info) {
            $rows .= "<tr>
                        <td>$info->Datum</td>
                        <td>$info->Mankement</td>
                    </tr>";
        }

        $data = [
            'title' => "Overzicht Mankementen",
            'id' => "$info->Id",
            'naam' => $info->Naam,
            'email' => $info->Email,
            'kenteken' => $info->Kenteken,
            'type' => $info->Type,
            'rows' => $rows
        ];
        $this->view('Mankementen/index', $data);
    }

    function addMankement($MankementId = NULL)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->MankementModel->addMankement($_POST);

            if ($result) {
                echo "<p>Het nieuwe onderwerp is succesvol toegevoegd</p>";
            } else {
                echo "<p>Het nieuwe onderwerp is niet toegevoegd</p>";
            }
            header('Refresh:3; url=' . URLROOT . '/Mankementen/index');
        }

        $data = [
            'title' => 'Mankement Toevoegen',
            'MankementId' => $MankementId
        ];
        $this->view('Mankementen/addMankementen', $data);AAAAA
    }
}
