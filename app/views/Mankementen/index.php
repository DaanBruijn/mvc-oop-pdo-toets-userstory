<h3><?= $data['title'] ?></h3>

<h4>Naam:</h4>
<h4>Emailadres:</h4>
<h4>Kenteken Auto:</h4>


<table border='1'>
    <thead>
        <th>Datum</th>
        <th>Mankement</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>
<!-- <a href="<?= URLROOT; ?>/Mankementen/addMankement/<?= $data['MankementId']; ?>">
    <input type="button" value="Mankement Toevoegen"> -->