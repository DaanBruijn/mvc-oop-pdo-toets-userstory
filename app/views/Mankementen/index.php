<h3><?= $data['title'] ?></h3>

<h4>Auto van Instructeur: <?= $data['naam'] ?></h4>
<h4>Emailadres: <?= $data['email'] ?></h4>
<h4>Kenteken Auto: <?= $data['kenteken'] ?> <?= $data['type'] ?></h4>

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