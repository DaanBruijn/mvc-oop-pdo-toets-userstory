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
        $rows = '';
        foreach ($result as $info) {
            $d = new DateTimeImmutable($info->Datum, new DateTimeZone('Europe/Amsterdam'));
            $rows .= "<tr>
                        <td>{$d->format('d-m-Y')}</td>
                        <td>$info->Mankementen</td>
                    </tr>";
        }

        $data = [
            'title' => "Overzicht Mankementen",
            'rows' => $rows
        ];
        $this->view('Mankementen/index', $data);
    }

    function OverviewMankementen($MankementId)
    {
        $result = $this->MankementModel->getOverviewMankementen($MankementId);

        // var_dump($result);

        $rows = "";
        foreach ($result as $topic) {
            $rows .= "<tr>      
                        <td>$topic->Mankement</td>
                      </tr>";
        }


        $data = [
            'title' => 'Onderwerp mankement',
            'rows'  => $rows,
            'mankementId' => $MankementId
        ];
        $this->view('Mankementen/overviewMankementen', $data);
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
            'title' => 'Onderwerp Toevoegen',
            'mankementId' => $MankementId
        ];
        $this->view('mankement/addMankement', $data);
    }
}
