<h3><?= $data['title']; ?></h3>

<form action="<?= URLROOT ?>/Mankementen/addMankementen" method="post">
    <label for="topic">Onderwerp</label><br>
    <input type="text" name="topic" id="topic"><br>
    <input type="hidden" name="lesId" value="<?= $data['lesId']; ?>"><br>
    <input type="submit" value="Toevoegen">
</form>